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
   
       $comment = new Comment_list();
       $comment->post_comment = $request->post_comment;
       $comment->post_id = $request->post_id;
       $comment->user_id = Auth::user()->id;
       $comment->save();

       $post = Post::find($request->post_id);
       $postComments = Comment_list::where('post_id', $request->post_id)->get();


    return redirect(route('posts.index'));
   
    }
}
