<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Estate extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'rented',
        'number_of_parking_lots',
        'notes',
        'type_of_estate_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
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
