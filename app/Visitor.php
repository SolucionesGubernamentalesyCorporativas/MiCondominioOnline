<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'date_arrival',
        'vehicle',
        'estate_id',
        'type_of_visitor_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'date_arrival'
    ];
    
    public function typeOfVisitor()
    {
        return $this->belongsTo('App\TypeOfVisitor');
    }

    public function estate()
    {
        return $this->belongsTo('App\Estate');
    }
}
