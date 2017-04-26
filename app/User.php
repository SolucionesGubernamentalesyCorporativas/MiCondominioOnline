<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'password',
        'membership_id', 
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at','deleted_at'];

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
}
