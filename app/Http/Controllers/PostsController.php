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
        $query = Post::orderBy('created_at', 'desc');
        // $posts = Post::all();

        $posts = $query->take(5)->get();
        return view('layouts/posts.index')->with('posts', $posts);
    }

    public function ajaxscroll(Request $request)

    {

        $count = $request->count;
        // dd($count);
        $posts = Post::with('user')->skip($count)->take(5)->orderBy('created_at', 'desc')->get();
        return response()->json($posts);

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
        $rules = [
            'title' => 'required|string|max:255',
            'episode' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image upload, if provided
        ];
        $messages = [
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'episode.required' => '文章は必須です。',
            'image.image' => '画像は画像ファイルである必要があります。',
            'image.mimes' => '画像はjpeg, png, jpg, gif形式のいずれかである必要があります。',
            'image.max' => '画像サイズは2MB以内である必要があります。',        ];
        $request->validate($rules, $messages);

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

        $messages = [
            'title.required' => 'タイトルは必須項目です。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'episode.required' => '本文は必須項目です。',
                ];
        $request->validate([
            'title' => 'required|max:255',
            'episode' => 'required'
        ],
        $messages);
 
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
