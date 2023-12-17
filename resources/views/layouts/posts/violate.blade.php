@extends('layouts.app')
 
@section('content')

<div>

<h1>違反報告</h1>
  <form action="" method="post">
  @csrf
 
      <p>違反報告の理由</p>
      <input type="text" name="title" /><br /><br />

      <p>記入欄</p>
      <textarea name="violate_comment"></textarea><br />
      <br />
      <input type="submit" class="btn btn-info text-white" value="送信する"/>
    
   </form>
</div>
@endsection