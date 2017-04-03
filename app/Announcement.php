<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title', 'url_of_content'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
