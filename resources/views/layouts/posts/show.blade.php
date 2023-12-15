@extends('layouts.app')
 
@section('content')
<div class="container">
    <h2>{{$post->title}}</h2>
    <p>{{$post->episode}}</p>
    <p>写真</p>
    <small>投稿者:{{$post->user->name}} 作成日:{{$post->created_at}}</small>
    <hr>

    <div class="d-flex justify-content-around">

    <form action="{{ route('posts.edit', $post->id) }}" method="post">
       @csrf
       @method('patch')
         <div class="btn-group mt-3">
        <input type="hidden" name="id" value="{{ $post->id }}"/>
          @if (!Auth::guest() && Auth::user()->id ==$post->user_id)
         <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-primary">編集</a>
            @endif
    </form>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" >
                              @csrf
                              @method('DELETE')
                              <input type="hidden" name="id" value="{{ $post->id }}"/>
                              <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                              </form>

    <a href="" class="btn btn-primary">違反報告</a>

    <input type="reset" value="戻る" class="btn btn-secondary" onclick='window.history.back(-1);'>
    
</div>
</div>
@endsection