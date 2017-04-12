<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'name', 'date_arrival', 'vehicle', 'user_id'
    ];
    
    public function typeOfVisitor()
    {
        return $this->hasOne('App\TypeOfVisitor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
