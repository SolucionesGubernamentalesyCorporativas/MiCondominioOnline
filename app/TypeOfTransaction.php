<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfTransaction extends Model
{
    protected $fillable = [
        'name', 'income_outcome', 'transaction_id'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
