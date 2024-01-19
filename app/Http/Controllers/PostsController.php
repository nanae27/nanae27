<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment_list;
use App\User;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // TOPページ表示
    public function index()
    {
        
        $posts = Post::all();
        return view('layouts/posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 新規投稿作成画面
    public function create()
    {
        $posts = Post::all();
        return view('layouts/posts.create')->with('posts', $posts);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 新規投稿の保存
    public function store(Request $request)
    {
        // dd($request);
        $post = new Post;
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->episode = $request->episode;

        $dir = 'sample';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // sampleディレクトリに画像を保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $post->image = 'storage/' . $dir . '/' . $file_name;
        $post->save();
 
        return redirect(route('posts.index'));
        }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 個別の投稿ページの表示
    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        $comment = new Comment_list();
        $comment->post_comment = $request->post_comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $postComments = $post->comments;
        
        return view('layouts/posts/show')->with('post', $post)->with('postComments', $postComments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 投稿編集画面の表示
    public function edit($id)
    {
        $post = Post::find($id);
 
        if (auth()->user()->id != $post->user_id) {
            return redirect(route('posts.index'))->with('error', '許可されていない操作です');
        }
        return view('layouts/posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 投稿の更新の保存
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'episode' => 'required'
        ]);
 
        $post = Post::find($id);
        if (auth()->user()->id != $post->user_id) {
            return redirect(route('posts.index'))->with('error', '許可されていない操作です');
        }
 
        $post->title = $request->input('title');
        $post->episode = $request->input('episode');
        $post->save();
 
        return redirect(route('posts.index'))->with('success', 'ブログ記事を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 投稿を削除
    public function destroy($id)
    {
        $post = Post::find($id);
        if (auth()->user()->id != $post->user_id) {
            return redirect(route('posts.index'))->with('error', '許可されていない操作です');
        }
 
        $post->delete();
        return redirect(route('posts.index'))->with('success', '投稿記事を削除しました');
    }
}
