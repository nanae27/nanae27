<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Ownerpage;
use App\Comment_list;


class OwnerpageController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->get();
        return view('layouts/ownerpage', compact('users'));
        

    }
    public function postList(Request $request)
    {
        $searchQuery = $request->input('search');
        $sortOrder = $request->input('sort', 'asc');
        $posts = Post::with('user', 'violate_lists')
        ->when($searchQuery, function ($query) use ($searchQuery) {
        $query->where('title', 'like', '%' . $searchQuery . '%')
        ->orWhereHas('user', function ($userQuery) use ($searchQuery) {
        $userQuery->where('name', 'like', '%' . $searchQuery . '%');
        });
        })
       ->get();
       $posts = $posts->sortBy(function ($post) {
        return $post->violate_lists->count();
            });
            if ($sortOrder === 'desc') {
                $posts = $posts->reverse();
                    }
        return view('layouts/postlist')->with('posts', $posts)->with('searchQuery', $searchQuery);
        
        }

    public function userList(Request $request)
    {
        $searchQuery = $request->input('search'); 
        $sortOrder = $request->input('sort', 'asc');
        $usersQuery = User::with(['comments','posts' => function($query){
            $query->where('del_flg', '<>', 1);
        }]);
        if ($searchQuery) {
            $usersQuery->where('name', 'like', '%' . $searchQuery . '%')
                       ->orWhereHas('comments', function ($commentQuery) use ($searchQuery) {
                            $commentQuery->where('email', 'like', '%' . $searchQuery . '%');
                        });
        }
    
        $users = $usersQuery->withCount('posts')
        ->orderBy('posts_count', $sortOrder)
        ->get();
    
   
       return view('layouts/userlist')->with('users', $users)->with('searchQuery', $searchQuery);
    
    }
       public function posthidden(Request $request)
       {
           Post::where('id', $request['id'])->where('del_flg', 0)->update(['del_flg' => 1]);
           $user = User::where('id', $request['user_id'])->get();
           $user[0] -> displaystop ++;
           $user[0] -> save();

        return view('layouts/ownerpage');

       }

       public function showuserList()
       {
           $users = User::with(['comments','posts' => function($query){
               $query->where('del_flg', '<>', 1);
           }])
           ->get();
           $searchQuery = null;
          return view('layouts/userlist')->with('users', $users)->with('searchQuery', $searchQuery);
       }
    }  


    