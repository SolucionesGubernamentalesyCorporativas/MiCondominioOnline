<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable =[
        'observations', 'ammount', 'verified', 'type_of_transaction_id'
    ];
    
    public function typeOfTransaction()
    {
        return $this->belongsTo('App\TypeOfTransaction');
    }

    public function receipt()
    {
        return $this->hasOne('App\Receipt');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
