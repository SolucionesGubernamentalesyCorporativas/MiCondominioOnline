<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfResource extends Model
{
    protected $fillable = [
        'name', 'description'
    ];
    
    public function resources()
    {
        return $this->hasMany('App\Resource');
    }
}
