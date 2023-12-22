<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        dd($request);
        // ディレクトリ名
        $dir = 'sample';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // sampleディレクトリに画像を保存
        $request->file('image')->store('public/' . $dir, $file_name);

        $post = new Post();
        $post->name = $file_name;
        $post->image = 'storage/' . $dir . '/' . $file_name;
        $post->save();

        return redirect('/');
       
    }
}
