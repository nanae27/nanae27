<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Useredit;


class UsereditController extends Controller
{
    public function UserEdit()
    {
      
        $post = Post::all();
       
        return view('layouts/useredit')->with('post', $post);
    }
}
