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
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment_list::class);
    }
}
