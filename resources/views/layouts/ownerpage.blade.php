@extends('layouts.app')
 
@section('content')
<div class="container">

<h1>管理者ページ</h1>
  <form action="" method="post">
  @csrf
 
      
      <a href="{{ route('userlist') }}" class="btn btn-outline-success">ユーザー検索</a>
      <br>
      <a href="{{ route('postlist') }}" class="btn btn-outline-success">投稿検索</a>

    
   </form>
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