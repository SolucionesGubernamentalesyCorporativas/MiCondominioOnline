<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'verified',
        'transaction_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'date'
    ];
    
    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function receiptImage()
    {
        return $this->hasOne('App\ReceiptImage');
    }
}
