<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $posts = request()->validate([
            'post_comment' => 'required|max:255'
        ]);

        $comment = Comment::create([
            'post_comment' => $inputs['post_comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id
        ]);

        return back();
    }
}
