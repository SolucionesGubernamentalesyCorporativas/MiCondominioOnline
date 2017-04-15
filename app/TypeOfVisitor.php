<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfVisitor extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function visitors()
    {
        return $this->hasMany('App\Visitor');
    }
}
