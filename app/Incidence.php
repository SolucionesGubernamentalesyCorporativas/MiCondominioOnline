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
        'description',
        'file1',
        'file2',
        'type_of_incidence_id',
        'estate_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
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
