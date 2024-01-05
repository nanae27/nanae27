<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdelete extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
