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

    //     $query = Post::query();

    // // 検索ワード
    // if ($request->has('search')) {
    //     $searchTerm = $request->input('search');
    //     $query->where('title', 'LIKE', "%{$searchTerm}%")
    //           ->orWhere('episode', 'LIKE', "%{$searchTerm}%");
    // }

    // // 開始日
    // if ($request->has('start_date')) {
    //     $startDate = $request->input('start_date');
    //     $query->whereDate('created_at', '>=', $startDate);
    // }

    // // ユーザー名
    // if ($request->has('username')) {
    //     $username = $request->input('username');
    //     $query->whereHas('user', function ($userQuery) use ($username) {
    //         $userQuery->where('name', 'LIKE', "%{$username}%");
    //     });
    // }

    // $posts = $query->get();

    // $searchQuery = $request->only(['searchTerm', 'start_date', 'username']);

    // return view('layouts/posts/postsearch', compact('posts', 'searchQuery'));
    // }
}





