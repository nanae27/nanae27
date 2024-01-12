@extends('layouts.app')
 
@section('content')
<div class="container">
<h1>アカウント情報編集</h1>
<form action="{{route('userupdate', ['id' => $user->id])}}" method="post">
   @csrf
   @method('patch')
   <div class="form-group">
   <label for="name">ユーザー名</label>
   <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" placeholder="ユーザー名を入力してください">
   </div>
   <div class="form-group">
   <label for="email">メールアドレス</label>
   <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" placeholder="メールアドレスを入力してください">
   </div>
   <div class="form-group">
   <label for="profile">プロフィール</label>
   <input type="text" name="profile" id="profile" class="form-control" value="{{ $user->profile }}" placeholder="プロフィールを入力してください">
</div>



<input type="submit" class="btn btn-primary" value="編集する"/>
</form>

<a href="{{ route('userdelete', $user->id) }}" class="btn btn-primary">ユーザー情報削除する</a>


</div>

@endsection