<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Ownerpage;


class OwnerpageController extends Controller
{
    public function index()
    {
       
        return view('layouts/ownerpage');
        

    }
    public function postList()
    {
        $posts = Post::all();

        return view('layouts/postlist')->with('posts', $posts);
        
    }
    public function userList()
    {
       
        return view('layouts/userlist');
        

    }
}
