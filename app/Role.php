<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public function permission()
    {
        return $this->hasOne('App\Permission');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
