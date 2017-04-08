<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfVisitor extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function visitor()
    {
        return $this->belongsTo('App\Visitor');
    }
}
