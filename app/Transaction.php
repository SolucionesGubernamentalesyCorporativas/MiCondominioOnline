<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'observations',
        'ammount',
        'verified',
        'type_of_transaction_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];
    
    public function typeOfTransaction()
    {
        return $this->belongsTo('App\TypeOfTransaction');
    }

    public function receipt()
    {
        return $this->hasOne('App\Receipt');
    }

    public function estates()
    {
        return $this->belongsToMany('App\Estate');
    }
}
