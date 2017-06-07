<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Format extends Model
{
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'type_of_format_id',
        'condo_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    public function typeOfFormat()
    {
        return $this->belongsTo('App\TypeOfFormat');
    }

    public function condo()
    {
        return $this->belongsTo('App\Condo');
    }
}
