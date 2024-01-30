@extends('layouts.app')
 
@section('content')

<div class="container">
    <h1>投稿検索</h1>
    <form action="{{ route('posts.search') }}" method="GET">
        <div class="form-group">
            <label for="search" class="post-word mt-4">検索ワード：</label>
            <input type="text" name="search" id="search" class="form-control" value="{{ old('search', $searchQuery) }}" placeholder="検索ワードを入力">
        </div>
        <div class="form-group">
            <label for="search">ユーザー名：</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $name) }}" placeholder="ユーザー名を入力">
        </div>
    <div class="form-group">
        <label for="selected_date">日付:</label>
        <input type="date" name="selected_date" id="selected_date" class="form-control" value="{{ old('selected_date', $selected_date) }}" placeholder="日付を選択">
    </div>


        <button type="submit" class="btn btn-outline-info">検索</button>
    </form>
  
    <div class="container">
        <h1 class="word mt-5">検索結果</h1>

        <!-- Display Post Search Results -->
        <h3 class="word mt-5">[投稿検索結果]</h2>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->episode }}</p>
                </li>
            @endforeach
        </ul>

        <!-- Display User Search Results -->
        <h3 class="word mt-5">[ユーザー検索結果]</h2>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>
</div>


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
    </div>
@endsection