<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Userdelete;

class UserdeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function UserDeleteform($id)
    {
        $user = User::find($id);
 
        return view('layouts/userdelete')->with('user', $user);

    }
    
    public function UserDelete($id)
    {
        
        $user = User::find($id);
        if (auth()->user()->id != $user->id) {
            return redirect(route('mypage'))->with('error', '許可されていない操作です');
        }
 
        $user->delete();
        return redirect(route('mypage'))->with('success', '投稿記事を削除しました');
    }
}
