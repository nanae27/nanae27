@extends('layouts.app')
 
@section('content')

<div class="container">
    
<h1 class="ownerpage mb-5">管理ユーザー専用画面</h1>

@foreach($posts as $post)
<div class="post">
<p>ユーザー名</p> 
<p>[]</p>
<p>文章</p> 
<p>[{{$post->episode}}]</p>
<small>投稿者:{{$post->user->name}} 作成日:{{$post->created_at}}</small>

</div>


@endforeach
</div>
@endsection