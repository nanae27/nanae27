@extends('layouts.app')
 
@section('content')
<div class="container">
    <h2>{{$post->title}}</h2>
    <p>{{$post->episode}}</p>
    <p>写真</p>
    <img src="{{ asset($post->image) }}" width="100" height="100">

    <small>投稿者:{{$post->user->name}} 作成日:{{$post->created_at}}</small>

    <hr>
    
    </div>

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

    
         <a href="{{route('posts.violate' , $post->id)}}" class="btn btn-primary">違反報告</a>

    <input type="reset" value="戻る" class="btn btn-secondary" onclick='window.history.back(-1);'>
    

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