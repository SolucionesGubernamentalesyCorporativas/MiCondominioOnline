<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfMembership extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    public function unlockedFeature()
    {
        return $this->hasOne('App\UnlockedFeature');
    }

    public function memberships()
    {
        return $this->hasMany('App\Membership');
    }
}
