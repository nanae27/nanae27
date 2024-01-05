<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Userdelete;

class UserdeleteController extends Controller
{
    public function UserDelete()
    {
      
        $user = auth()->user();
       
        return view('layouts/userdelete')->with('user', $user);
    }
}
