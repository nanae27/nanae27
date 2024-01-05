@extends('layouts.app')
 
@section('content')
<div class="container">
<h1>アカウント情報編集</h1>
<form action="" method="post">
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
   <label for="password">パスワード</label>
   <input type="text" name="password" id="password" class="form-control" value="{{ $user->password }}" placeholder="パスワードを入力してください">
   </div>
   <div class="form-group">
   <label for="passwordtoken">パスワード確認</label>
   <input type="text" name="passwordtoken" id="passwordtoken" class="form-control" value="" placeholder="確認の為もう一度パスワードを入力してください">
   </div>
   <div class="form-group">
   <label for="image">アイコン画像</label>
   <input type="text" name="image" id="image" class="form-control" value="" placeholder="">
   </div>
   <div class="form-group">
   <label for="profile">プロフィール</label>
   <input type="text" name="profile" id="profile" class="form-control" value="{{ $user->profile }}" placeholder="プロフィールを入力してください">
</div>
</form>


<a href="{{ route('mypage') }}" class="btn btn-primary">編集する</a>
<a href="{{ route('userdelete') }}" class="btn btn-primary">ユーザー情報削除する</a>

</div>

@endsection