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
        $users = User::with(['comments','posts' => function($query){
            $query->where('del_flg', '<>', 1);
        }])
        ->when($searchQuery, function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
        ->orWhereHas('comments', function ($commentQuery) use ($searchQuery) {
                $commentQuery->where('email', 'like', '%' . $searchQuery . '%');
            });
        })
        
       ->get();
       User::where('del_flg', 0)->update(['del_flg' => 1]);
       $users = $users->each(function ($user) {
    
       $hiddenPostCount = Post::where('user_id', $user->id)->where('del_flg', 1)->count();
    
  
       $user->hiddenPostCount = $hiddenPostCount;
       });
       return view('layouts/userlist')->with('users', $users)->with('searchQuery', $searchQuery);
    }}
        // ->withCount([
        //     'posts AS del_flg' => function ($query) {
        //         foreach ($users as $user) 
        //         User::where('del_flg', 0)->update(['del_flg' => 1]);
        //         $query->select(DB::raw("SUM(del_flg) as del_flg_sum"));
             
             

        //         $hiddenPostCount = Post::where('user_id', $user->id)->where('del_flg', 1)->count();
    
        //         $user->hiddenPostCount = $hiddenPostCount;
    
        //     }        // 非表示投稿の件数で降順にソート
    
        //     // $users = $users->sortByDesc('hiddenPostCount');
        //   ])->orderBy('del_flg', 'desc')
        //   ->get();
