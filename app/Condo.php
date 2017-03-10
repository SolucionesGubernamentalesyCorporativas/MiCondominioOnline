<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condo extends Model
{
    public function estates()
    {
        return $this->belongsToMany('App\Estate');
    }
}
