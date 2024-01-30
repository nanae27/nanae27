@extends('layouts.app')
 
@section('content')

<div class="container">
    
<h1 class="ownerpage mb-5">管理ユーザー専用画面</h1>

<form action="{{ route('postlist') }}" method="GET">
<div class="form-row">
        <div class="col">
                <label for="search" class="post-word mt-4">検索ワード：</label>
                <input type="text" name="search" id="search" class="form-control" value="{{ old('search', $searchQuery) }}" placeholder="検索ワードを入力">
                </div>

            <div class="col">
            <label for="sort" class="post-word mt-4">違反報告数の並び替え：</label>
            <select name="sort" id="sort" class="form-control">
                <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>少ない</option>
                <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>多い</option>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-outline-info">検索</button>
            </div>
            </div>
</form>

<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">違反報告数</th>
      <th scope="col">ユーザー名</th>
      <th scope="col">文章</th>
      <th scope="col">投稿日時</th>
      <th scope="col">詳細</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
  @foreach($posts as $post)
    <tr>
      @if($post -> del_flg == 0)
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $post->violate_lists->count() }}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->episode}}</td>
        <td>{{$post->created_at}}</td>
        <td><a href="{{route('posts.show', $post->id)}}">投稿詳細へ</a></td>
        <td><a href="{{ route('posthidden', ['id' => $post -> id, 'user_id' => $post -> user_id ]) }}" class="btn btn-outline-danger">表示停止</a></td>
      @endif
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
<div class="button mt-3">
              <input type="reset" value="戻る" class="btn btn-outline-secondary mr-3" onclick='window.history.back(-1);'>
          </div>
</div>
@endsection





