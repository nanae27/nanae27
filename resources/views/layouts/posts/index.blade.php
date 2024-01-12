@extends('layouts.app')
 
@section('content')
<div class="container">
    
    <div class="flex-box-wrap">
    @foreach ($posts as $post)
    
        <div class="flex-item-row">
            <div class="flex-item"><a href="{{route('posts.show', $post->id)}}">
                <p class=title>タイトル</p>
                <h2>{{$post->title}}</h2>
                <p class=episode>投稿</p>
                <h2>{{$post->episode}}</h2>
                <p class=image>写真</p>
                <img src="{{ asset($post->image) }}" width="100" height="100">
                <small>投稿者:{{$post->user->name}} 作成日:{{$post->created_at}}</small>

            </div>
        </div>
        @endforeach
    </div>    
</div>
@endsection

