<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useredit extends Model
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
