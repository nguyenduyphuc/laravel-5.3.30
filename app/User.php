<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable 
{
    use Notifiable;


    protected $table = 'users';
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

    public function order(){
        return $this->hasMany('App\Order', 'user_id');
    }


    public function isAdmin()
    {
        if (Auth::user()->email == 'priceshaolin@gmail.com') {
            # code...
            return true; // this looks for an admin column in your users table
        }
        return false;
        
    }
}
