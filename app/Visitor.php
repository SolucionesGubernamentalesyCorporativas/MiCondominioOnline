<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public function typeOfVisitor()
    {
        return $this->hasOne('App\TypeOfVisitor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
