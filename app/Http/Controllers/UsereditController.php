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
        if(!$user){
            abort(404);
        }

        // $form = $request->all();
        $user->fill($request->except('_token'))->save();
        return redirect()->route('layouts/mypage')->with('success', 'User updated successfully');

        // unset($form['_token']);
        // $auth->fill($form)->save();
        // return redirect('layouts/mypage');
    }
}
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->profile = $request->input('profile');
        // if ($request->filled('password')) {
        // $user->password = bcrypt($request->input('password'));
        //         }

        // $user->save();
        
        // return redirect()->route('layouts/mypage', ['id' => $user->id])->with('user', $user);
 
    


