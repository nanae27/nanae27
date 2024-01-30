<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
    $messages = [
        'title.required' => '違反報告の理由は必須項目です。',
        'title.string' => '違反報告の理由は文字列で入力してください。',
        'title.max' => '違反報告の理由は255文字以内で入力してください。',
        'violate_comment.required' => '記入欄は必須項目です。',  
        'violate_comment.string' => '記入欄は文字列で入力してください。',
            ];

        $request->validate([
        'title' => 'required|string|max:255',
        'violate_comment' => 'required|string',
        ], 
        $messages);
        
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
