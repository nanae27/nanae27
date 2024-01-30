@extends('layouts.app')
 
@section('content')
<div class="container">
<h1 class="mypage mb-5">マイページ</h1>
@isset($user)
<p>ユーザー名</p> 
<p>[{{$user->name}}]</p>
<p>メールアドレス</p> 
<p>[{{$user->email}}]</p>

@endisset
<a href="{{ route('useredit') }}" class="btn btn-outline-primary">ユーザー情報編集</a>

    <div class="flex-box-wrap mt-5">
    @foreach($post->chunk(2) as $post)
    <div class="flex-item-row">
    @foreach($post as $post)
    <div class="flex-item">
        <a href="{{route('posts.show', $post->id)}}">
            <h2>{{$post->title}}</h2>
            <p>{{$post->episode}}</p>
            <small>投稿者:{{$post->user->name}} 作成日:{{$post->created_at}}</small>
</div>
@endforeach
</div>
@endforeach
</div>
</div>
<style>
    .flex-box-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
    }

    .flex-item-row {
        display: flex;
        width: 100%;
        justify-content: space-between;
    }

    .flex-item {
        width: 48%; 
        padding: 16px;
        border: 1px solid #ccc; 
        box-sizing: border-box;
        margin-bottom: 16px;
    }
    
    h1 {
  color: #010079;
  text-shadow: 0 0 5px white;
  border-left: solid 7px #010079;
  background: -webkit-repeating-linear-gradient(-45deg, #cce7ff, #cce7ff 3px,#e9f4ff 3px, #e9f4ff 7px);
  background: repeating-linear-gradient(-45deg, #cce7ff, #cce7ff 3px,#e9f4ff 3px, #e9f4ff 7px);
}
</style>




@endsection