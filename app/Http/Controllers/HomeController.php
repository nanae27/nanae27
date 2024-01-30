<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        
            $user = Auth::user();
            if ($user) {
            if ($user->role === 'admin') {
                return view('layouts/ownerpage'); 
            } elseif ($user->role === 'user') {
                return redirect(route('posts.index'));
            }
        }
            
    }
   
    public function indexSearch(Request $request)
    {

        $selected_date = $request->input('selected_date'); 
        $name = $request->input('name');
        $searchQuery = $request->input('search');
        $users = collect();
        $posts = collect();   
        if ($request->filled('name')) {             
        $users = User::where('name', 'like', "%{$name}%")->get();
            } 
            elseif ($request->filled('selected_date')) {
        $posts = Post::where('created_at', '>=', $selected_date . ' 00:00:00')->get();
            } 
           
        elseif ($request->filled('search')) {
        $posts = Post::where(function ($query) use ($searchQuery) { 
        $query->where('title', 'like', "%{$searchQuery}%")
                        ->orWhere('episode', 'like', "%{$searchQuery}%");
                })->get();
            }
        
        return view('layouts/posts/postsearch', compact('posts', 'users', 'searchQuery', 'name', 'selected_date'));
        }

}





