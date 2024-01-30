@extends('layouts.app')
 
@section('content')
<div class="container">
    <h1>投稿「{{$post->title}}」の編集</h1>
    <form action="{{route('posts.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title') ?? $post->title}}" placeholder="タイトルを入力してください">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="episode">本文</label>
            <textarea name="episode" id="episode" class="form-control" rows="5" placeholder="本文を入力してください">{{old('episode') ?? $post->episode}}</textarea>
            @error('episode')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="更新" class="btn btn-primary">
        <input type="reset" value="戻る" class="btn btn-secondary" onclick='window.history.back(-1);'>
    </form>
</div>
@endsection