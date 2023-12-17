@extends('layouts.app')
 
@section('content')

<div class="container">
        <h1>投稿検索</h1>

        <form action="{{ route('posts.search') }}" method="GET">
            <div class="form-group">
                <label for="search">検索ワード：</label>
                <input type="text" name="search" id="search" class="form-control" value="{{ old('posts.search') }}" placeholder="検索ワードを入力">
            </div>
            <div class="form-group">
                <label for="search">ユーザー名：</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('posts.search') }}" placeholder="ユーザー名を入力">
            </div>

            <button type="submit" class="btn btn-primary">検索</button>
        </form>
      

        <div class="container">
        <h1>検索結果</h1>

        <p>検索ワード: {{ $searchQuery }}</p>

        @if ($posts->isEmpty())
            <p>該当する投稿はありません。</p>
        @else
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->episode }}</p>
                       
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

       

    </div>
@endsection