<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use \App\User;
use \App\Room;


class ChatController extends Controller
{
    var $pusher;
    var $user;
    var $chatChannel;

    const DEFAULT_CHAT_CHANNEL = '12';

    public function __construct()
    {
        $this->pusher = App::make('Pusher');
        $this->user = Session::get('user');
        $this->chatChannel = self::DEFAULT_CHAT_CHANNEL;
    }

    public function getIndex(Request $request)
    {
        $user=\Auth::user();  
        $channelName=$request->input('channelName');
        $result=$user->rooms()->where('name',  $channelName)->count();
        if(($result==0)&&($request->input('pub')==0)){
            $url='chatEnter/';
            $url.=$channelName;            
             return redirect($url);
        }
        else{
            return view('chat', ['chatChannel' => $channelName]);
        }
        
    }

    public function checkUser($channelName)
    {
       
        return view('chatEnter',['channelName' => $channelName]);
    }
    public function checkUserPost(Request $request, $channelName)
    {
        $password=\App\Room::where('name',$channelName)->value('password');
        
        if($request->input('password')==$password){
            $user=\Auth::user();
            $id=\App\Room::where('name',$channelName)->value('id');
            $user->rooms()->attach($id);
            return redirect('/');
        }
        else{
            return redirect()->back()->withInput();
        }

    }

    public function getRoom($channelName)
    {
       
        return view('chatEnter',['channelName' => $channelName]);
    }


    public function postMessage(Request $request)
    {
        $message = [
            'text' => e($request->input('chat_text')),
            
            'timestamp' => (time()*1000)
        ];
        $channelName=$request->input('cName');

        $this->pusher->trigger($channelName, 'new-message', $message);
    }
}
