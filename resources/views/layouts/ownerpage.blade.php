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
</div>



@endsection