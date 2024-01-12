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
        return $this->belongsTo('App\Models\User');
    }
    public function comments()
    {
        return $this->belongsTo('App\Models\Comment_list');
    }
}
