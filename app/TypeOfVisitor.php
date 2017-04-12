<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfVisitor extends Model
{
    protected $fillable = [
        'name', 'description', 'visitor_id'
    ];

    public function visitor()
    {
        return $this->belongsTo('App\Visitor');
    }
}
