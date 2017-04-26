<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'capacity',
        'fee',
        'type_of_resource_id',
        'user_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];
    
    public function typeOfResource()
    {
        return $this->belongsTo('App\TypeOfResource');
    }

    public function estate()
    {
        return $this->belongsTo('App\Estate');
    }
}
