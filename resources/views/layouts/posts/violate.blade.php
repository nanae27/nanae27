@extends('layouts.app')
 
@section('content')

<div class="container">

<h1>違反報告</h1>
@if ($errors->any())
<div class="alert alert-danger">
<ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  </ul>
  </div>
@endif
  <form action="{{ route('violations.store', ['postId' => $postId]) }}" method="post">
  @csrf
  <input type="hidden" name="post_id" value="{{ $postId }}">
      <p class="post-title mt-5">違反報告の理由</p>
      <input type="text" name="title" /><br /><br />

      <p>記入欄</p>
      <textarea name="violate_comment"></textarea><br />
      <br />
      <input type="submit" class="btn btn-info text-white" value="送信する"/>
    
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