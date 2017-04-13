<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'capacity', 'fee', 'type_of_resource_id', 'user_id'
    ];
    
    public function typeOfResource()
    {
        return $this->belongsTo('App\TypeOfResource');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
