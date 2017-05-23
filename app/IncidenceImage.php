<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncidenceImage extends Model
{
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url_of_img',
        'type_of_img'
    ];

    public function incidence()
    {
        return $this->belongsTo('App\Incidence');
    }
}
