@extends('layouts.app')
 
@section('content')
<div class="container">
    <h2>{{$post->title}}</h2>
    <p>{{$post->episode}}</p>
    <p>写真</p>
    <img src="{{ asset($post->image) }}" width="100" height="100">

    <small>投稿者:{{$post->user->name}} 作成日:{{$post->created_at}}</small>
   
    @if(isset($postComments) && count($postComments) > 0)
    <div class="card-body">
        @foreach($postComments as $comment)
            <p>[{{ $comment->post_comment }}]</p>
        @endforeach
    </div>
@endif
    <hr>
    
    </div>
    
    <div class="posts d-flex justify-content-around">
    <div class="button d-flex justify-content-around">
    <form action="{{ route('posts.edit', $post->id) }}" method="post">
       @csrf
       @method('patch')
         <div class="button mt-3">
        <input type="hidden" name="id" value="{{ $post->id }}"/>
          @if (!Auth::guest() && Auth::user()->id ==$post->user_id)
         <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-outline-primary mr-3">編集</a>
            @endif
    </form>
    </div>
    <div class="button mt-3">
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $post->id }}"/>
            <input type="submit" value="削除" class="btn btn-outline-danger mr-3" onclick='return confirm("削除しますか？");'>
            </form>
            </div>
            <div class="button mt-3">
    
         <a href="{{route('violations.store' , $post->id)}}" class="btn btn-outline-success mr-3">違反報告</a>
         </div>
         <div class="button mt-3">
              <input type="reset" value="戻る" class="btn btn-outline-secondary mr-3" onclick='window.history.back(-1);'>
          </div>
       </div>
        <div class="card mb-4">

         <form action="{{ route('posts.storecomment') }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name='post_id' value="{{ isset($post) ? $post->id : '' }}">
        <div class="form-group">
            <textarea name="post_comment" class="form-control" id="post_comment" cols="30" rows="5" 
            placeholder="コメントを入力する">{{old('post_comment')}}</textarea>
        </div>
        <div class="form-group mt-4">
        <button class="btn btn-success float-right mb-3 mr-3">コメントする</button>
        </div>
    </form>
</div>  
</div>
@endsection