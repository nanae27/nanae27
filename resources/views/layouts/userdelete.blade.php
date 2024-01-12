@extends('layouts.app')
 
@section('content')

<div class="container">
    
<h1>アカウント削除</h1>
<p>ユーザー名:</p>
<p>{{ $user->name }}</p>
      
<p>メールアドレス:</p>
<p>{{ $user->email }}</p>

<p>プロフィール:</p>
<p>{{ $user->profile }}</p>

<form action="{{ route('userdelete', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $user->id }}"/>
            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
            </form>
<a href="{{ route('useredit') }}" class="btn btn-primary">編集画面に戻る</a>

</div>
@endsection