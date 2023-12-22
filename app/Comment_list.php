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
        return $this->belongsTo('App\Models\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function comment()
    {
        return $this->belongsTo('App\Models\Comment_list');
    }
}
