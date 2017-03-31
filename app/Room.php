<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'name','type','password',
    ];
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}
