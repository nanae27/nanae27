<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class MyPageController extends Controller
{
    // public function Mypageshow()
    //   {
    //          $user = Auth::user(); 
    //          return view('layouts/mypage')->with('users', $users);
    //  }


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
        $Mypage = Mypage::user();
        return view('posts.index',[ 'Mypage' => $Mypage]);
    }
}
