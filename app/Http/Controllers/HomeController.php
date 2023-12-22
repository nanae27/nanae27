<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

        
    }


    public function indexSearch(Request $request)
    {

        $posts = $request->input('posts');
        $name = $request->input('name');
        $searchQuery = $request->input('search');

       

        $posts = Post::where('title', 'like', "%{$searchQuery}%")
        ->orWhere('episode', 'like', "%{$searchQuery}%")
        ->get();
        $users = User::where('name', 'like', "%{$searchQuery}%")
        ->orWhere('name', 'like', "%{$searchQuery}%")
        ->get();

        return view('layouts/posts/postsearch', compact('posts', 'users', 'searchQuery'));
    }

 
}





