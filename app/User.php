<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
        'name', 'lastname', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function membership()
    {
        return $this->belongsTo('App\Membership');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function estates()
    {
        return $this->belongsToMany('App\Estate');
    }

    public function condos()
    {
        return $this->belongsToMany('App\Condo');
    }

    public function transactions()
    {
        return $this->belongsToMany('App\Transaction');
    }

    public function visitors()
    {
        return $this->hasMany('App\Visitor');
    }

    public function assets()
    {
        return $this->hasMany('App\Asset');
    }

    public function announcements()
    {
        return $this->hasMany('App\Announcement');
    }

    public function resources()
    {
        return $this->hasMany('App\Resource');
    }
}
