<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment_list;
use App\Post;

class Comment_listController extends Controller
{
    public function storecomment(Request $request)
    {
   
        // $request->validate([
        //     'post_comment' => 'required|string|max:255',
        //     'post_id' => 'required|exists:posts,id',
            
        // ]);
    
        // $post = new Post;
        // $post->user_id = Auth::id(); 
        // $post->post_id = $request->post_id;
        // $post->post_comment = $request->post_comment;
        // $post->save();
    
        // // return redirect()->route('posts.show', ['post' => $request->post_id]);
        // return redirect(route('posts.show'));

       $comment = new Comment_list();
       $comment->post_comment = $request->post_comment;
       $comment->post_id = $request->post_id;
       $comment->user_id = Auth::user()->id;
       $comment->save();

    //    return redirect('/');
    return redirect(route('posts.index'));
   
    }
}
