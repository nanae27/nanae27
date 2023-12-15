@extends('layouts.app')
 
@section('content')

<div>

<h1>新規登録</h1>
  <form action="{{ route('mypage') }}" method="post" enctype="multipart/form-data">
  @csrf
 
      <p>タイトル</p>
      <input type="text" name="title" /><br /><br />

      <p>画像</p>
     
      <input type="file" id="imageInput" name="image" accept="image/*" /><br />

      <p>文章</p>
      <textarea name="episode"></textarea><br />
      <br />
      <input type="submit" class="btn btn-info text-white" value="投稿する"/>
    
   </form>
</div>
@endsection