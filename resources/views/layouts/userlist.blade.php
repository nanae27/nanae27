@extends('layouts.app')
 
@section('content')

<div class="container">
    
<h1 class="ownerpage mb-5">管理ユーザー専用画面</h1>

<form action="{{ route('userlist') }}" method="GET">
<div class="form-row">
        <div class="col">
                <label for="search" class="post-word mt-4">検索ワード：</label>
                <input type="text" name="search" id="search" class="form-control" value="{{ old('search', $searchQuery) }}" placeholder="検索ワードを入力">
                </div>

            <div class="col">
            <label for="sort" class="post-word mt-4">表示停止件数の並び替え：</label>
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
      <th scope="col">ユーザー名</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">表示停止件数</th>
      <th scope="col">ユーザーページへ</th>
    </tr>
  </thead>

  <tbody>
  @foreach($users as $user)
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->displaystop}}</td>
        <td><a href="{{route('mypage', $user->id)}}">ユーザーページへ</a></td>
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