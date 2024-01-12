<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Useredit;


class UsereditController extends Controller
{
    public function UserEdit()
    {
      
        $user = auth()->user();
       
        return view('layouts/useredit')->with('user', $user);
    }

    public function UserUpdate(Request $request, $id)
    {
 
        $user = User::find($id);
        if (auth()->user()->id !== $user->id) {
            return redirect(route('mypage'))->with('error', '許可されていない操作です');
        }
 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // $user->password = $request->input('password');
        $user->profile = $request->input('profile');
        $user->save();
 
        return redirect(route('mypage'))->with('success', 'ブログ記事を更新しました');
    }
}

 
    


