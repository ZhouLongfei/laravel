<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rooms()
    {
        return $this->belongsToMany('App\Room');
    }

    public function friends()
    {
        return $this->belongsToMany('App\User', 'friend_user', 'user_id', 'friend_id');
    }

// Same table, self referencing, but change the key order
    public function theFriends()
    {
        return $this->belongsToMany('App\User', 'friend_user', 'friend_id', 'user_id');
    }
}
