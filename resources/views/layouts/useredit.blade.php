@extends('layouts.app')
 
@section('content')
<div class="container">
<h1>アカウント情報編集</h1>
<p>ユーザー名</p>
<input type="text" name="name" id="name" class="form-control" value="" placeholder="ユーザー名を入力してください">
       
<p>メールアドレス</p>
<input type="text" name="email" id="email" class="form-control" value="" placeholder="メールアドレスを入力してください">
<p>パスワード</p>
<input type="text" name="password" id="password" class="form-control" value="" placeholder="パスワードを入力してください">
<p>パスワード確認</p>
<input type="text" name="passwordtoken" id="passwordtoken" class="form-control" value="" placeholder="確認の為もう一度パスワードを入力してください">
<p>アイコン画像</p>

<p>プロフィール</p>
<input type="text" name="profile" id="profile" class="form-control" value="" placeholder="プロフィールを入力してください">



<a href="{{ route('useredit') }}" class="btn btn-primary">編集する</a>
<a href="{{ route('useredit') }}" class="btn btn-primary">ユーザー情報削除する</a>

</div>

@endsection