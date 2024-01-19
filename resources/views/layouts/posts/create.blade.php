@extends('layouts.app')
 
@section('content')

<div class="container">

<h1>新規登録</h1>
  <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
  @csrf
 
      <p class="post-title mt-5">タイトル</p>
      <input type="text" name="title" /><br /><br />

      <p>画像</p>
     
      <input type="file" id="imageInput" name="image" accept="image/*" /><br />

      <p>文章</p>
      <textarea name="episode"></textarea><br />
      <br />
      <input type="submit" class="btn btn-outline-success" value="投稿する"/>
    
   </form>
   <style>
h1 {
  color: #010079;
  text-shadow: 0 0 5px white;
  border-left: solid 7px #010079;
  background: -webkit-repeating-linear-gradient(-45deg, #cce7ff, #cce7ff 3px,#e9f4ff 3px, #e9f4ff 7px);
  background: repeating-linear-gradient(-45deg, #cce7ff, #cce7ff 3px,#e9f4ff 3px, #e9f4ff 7px);
}
</style>
</div>
@endsection