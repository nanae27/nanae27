@extends('layouts.app')
 
@section('content')

<div class="container">
    
<h1>アカウント削除</h1>
<p>ユーザー名:</p>
<p>{{ $user->name }}</p>
      
<p>メールアドレス:</p>
<p>{{ $user->email }}</p>

<p>パスワード:</p>
<p>{{ $user->password }}</p>
<p>アイコン画像:</p>


<p>プロフィール:</p>
<p>{{ $user->profile }}</p>

<a href="{{ route('userdelete') }}" class="btn btn-primary">削除する</a>
<a href="{{ route('useredit') }}" class="btn btn-primary">編集画面に戻る</a>


@endsection