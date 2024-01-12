<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ownerpage extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
