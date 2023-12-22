<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'image',
        
      ];

      public function getPostImageAttribute($post){
        return asset('storage/'.$post);
     }

    
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->hasMany(Comment_list::class);
    }

}
