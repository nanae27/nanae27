@extends('layouts.app')

@section('content')

<div class="container">
    <h1>マイページ1</h1>
    @foreach ($posts as $post)
    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
  
    <div class="card">
        <div class="row">
            <div class="col-md-12"><a href="{{route('posts.show', $post->id)}}">
                <p class=title>タイトル</p>
                <h2>{{$post->title}}</h2>
                <p class=episode>投稿</p>
                <h2>{{$post->episode}}</h2>
                <p class=image>写真</p>
                <small>投稿者:{{$post->user->name}} 作成日:{{$post->created_at}}</small>
                </a>
                </div>
                </div>
                </div>
</form>

                
                @endforeach
                </div>
@endsection