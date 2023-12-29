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
                <div class="px-4 pt-3">
        @if (optional($post->comments)->count())
        <span>
            コメント{{optional($post->comments)->count()}}件
        </span>
        @else
    
        @endif

               </div>
              
            </div>
           
        </div>
        @endforeach
    </div>
    
</div>

<!-- <style>
    .flex-box-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
    }

    .flex-item-row {
        display: flex;
        width: 80%;
        justify-content: space-between;
    }

    .flex-item {
        width: 20%; 
        padding: 16px;
        border: 1px solid #ccc; 
        box-sizing: border-box;
        margin-bottom: 16px;
    }
</style> -->
@endsection

