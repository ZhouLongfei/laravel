<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Room;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\Auth::user();                //$user->rooms()
        return view('home')->with('rooms',\App\Room::all()->pluck('name')->toArray())->with('publicrooms',\App\Publicroom::all()->pluck('name')->toArray())->with('yourrooms',$user->rooms()->pluck('name')->toArray());
    }

    public function create(Request $request)
    {
        $type=$request->input('type');        
        $user=\Auth::user();
        if($type=='public')
        {
            $publicroom=new \App\Publicroom;
            $publicroom->name=$request->input('name');
            $publicroom->creator=$user->pluck('name')[0];
            $publicroom->save();
        }
        else{
            $room=new \App\Room;
            $name=$user->pluck('name')[0];
            $name.=$request->input('name');
            $room->name=$name;
            $room->type=$type;
            $room->password=$request->input('password');
            $room->save();
            $id=\App\Room::where('name',$name)->value('id');
            $user->rooms()->attach($id);
        }            
        return view('home')->with('rooms',$user->rooms()->pluck('name')->toArray())->with('publicrooms',\App\Publicroom::all()->pluck('name')->toArray());
    }
}
