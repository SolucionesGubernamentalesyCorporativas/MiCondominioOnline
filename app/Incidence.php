<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incidence extends Model
{
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'description',
        'url_of_img',
        'type_of_img',
        'type_of_incidence_id',
        'estate_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
        'deleted_at'
    ];

    public function typeOfIncidence()
    {
        return $this->belongsTo('App\TypeOfIncidence');
    }

    public function estate()
    {
        return $this->belongsTo('App\Estate');
    }
}
