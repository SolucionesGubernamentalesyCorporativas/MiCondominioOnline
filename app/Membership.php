<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
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
    
    public function typeOfMembership()
    {
        return $this->belongsTo('App\TypeOfMembership');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
