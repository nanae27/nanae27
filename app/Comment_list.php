<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_list extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'post_comment'
    ];

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
