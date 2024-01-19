<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Violate_list;


class Violate_listController extends Controller
{
    public function create($postId)
{
    $posts = Post::find($postId);
    return view('layouts/posts/violate', compact('posts', 'postId'));
}

    public function store(Request $request, $postId)
{
        $posts = Post::with('violate_lists')->get();
        $violate_list = new Violate_list;
        $violate_list->user_id = auth()->id();
        $violate_list->post_id = $postId;
        $violate_list->title = $request->input('title');
        $violate_list->violate_comment = $request->input('violate_comment');
        
        $violate_list->save();
    
        return view('layouts/posts.index', compact('violate_list', 'posts'));
}
}
