<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Estate extends Model
{
    protected $fillable = [
        'number', 'rented', 'number_of_parking_lots', 'notes', 'type_of_estate_id'
    ];
    
    public function typeOfEstate()
    {
        return $this->belongsTo('App\TypeOfEstate');
    }

    public function condos()
    {
        return $this->belongsToMany('App\Condo');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
