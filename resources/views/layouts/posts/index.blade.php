@extends('layouts.app')
 
@section('content')
<div class="container">
<h1 class="ownerpage mb-5">投稿一覧</h1>
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">タイトル</th>
      <th scope="col">投稿</th>
      <th scope="col">写真</th>
      <th scope="col">投稿者</th>
      <th scope="col">作成日</th>
      <th scope="col">投稿詳細へ</th>
    </tr>
  </thead> 

  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->episode}}</td>
      <td><img src="{{ asset($post->image) }}" width="100" height="100"></td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->created_at}}</td>
      <td><a href="{{route('posts.show', $post->id)}}">投稿詳細へ</a></td>

    </tr>
    @endforeach
    </tbody>
  </table>
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

