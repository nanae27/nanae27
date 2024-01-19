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

    public function comments()
    {
        return $this->hasMany(Comment_list::class);
    }

    public function violate_lists()
    {
    
        return $this->hasMany(Violate_list::class, 'post_id');
    }

}
