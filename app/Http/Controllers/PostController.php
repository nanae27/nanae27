<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // TOPページ表示
    public function index()
    {
        $post = Post::all();
        return view('layouts/post.index')->with('post', $post);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 新規投稿作成画面
    public function create()
    {
        $post = Post::all();
        return view('layouts/post.create')->with('post', $post);
        
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
        $post = new Post;
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->episode = $request->episode;
        // $post = $request->file('image')->store('public/image');
        // $post->image = $imagePath;
        $post->save();
        
        $post = Post::all(); 
        return view('layouts/mypage', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 個別の投稿ページの表示
    public function show($id)
    {
        $post = Post::find($id);
        return view('layouts/post.show')->with('post', $post);
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
            return redirect(route('post.index'))->with('error', '許可されていない操作です');
        }
        return view('layouts/post.edit')->with('post', $post);
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
            return redirect(route('post.index'))->with('error', '許可されていない操作です');
        }
 
        $post->title = $request->input('title');
        $post->episode = $request->input('episode');
        $post->save();
 
        return redirect(route('post.index'))->with('success', 'ブログ記事を更新しました');
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
            return redirect(route('post.index'))->with('error', '許可されていない操作です');
        }
 
        $post->delete();
        return redirect(route('post.index'))->with('success', '投稿記事を削除しました');
    }
}
