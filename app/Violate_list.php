<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violate_list extends Model
{
    

  
    protected $fillable = [
        'violate_comment',
        'user_id',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
