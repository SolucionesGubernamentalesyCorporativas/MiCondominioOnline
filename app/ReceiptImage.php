<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceiptImage extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url_of_img',
        'type_of_img'
    ];

    public function receipt()
    {
        return $this->belongsTo('App\Receipt');
    }
}
