@extends('layouts.app')
 
@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="card">
        <div class="row">
            <div class="col-md-12"><a href="{{route('posts.show', $post->id)}}">
                <p class=title>タイトル</p>
                <h2>{{$post->title}}</h2>
                <p class=episode>投稿</p>
                <h2>{{$post->episode}}</h2>
                <p class=image>写真</p>
                <small>投稿者:{{$post->user->name}} 作成日:{{$post->created_at}}</small>
                <div class="px-4 pt-3">
        @if (optional($post->comments)->count())
        <span>
            コメント{{optional($post->comments)->count()}}件
        </span>
        @else
        <span>コメントはまだありません。</span>
        @endif

    </div>
            </div>
        </div>
    </div>



    @endforeach
</div>
@endsection

