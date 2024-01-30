<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                    ], [
            'name.required' => 'ユーザー名は必須です。',
            'name.max' => 'ユーザー名は255文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'email.unique' => 'このメールアドレスは既に使用されています。',
        ]);
        $user = User::find($id);
        if (auth()->user()->id !== $user->id) {
            return redirect(route('mypage'))->with('error', '許可されていない操作です');
        }
 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
 
        return redirect(route('mypage'))->with('success', 'ブログ記事を更新しました');
    }
}

 
    


