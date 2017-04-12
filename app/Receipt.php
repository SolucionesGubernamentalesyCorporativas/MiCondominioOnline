<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'date', 'name_of_img', 'type_of_img', 'transaction_id'
    ];
    
    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
