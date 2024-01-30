@extends('layouts.app')
 
@section('content')
<div class="container">
<h1 class="ownerpage mb-5">投稿一覧</h1>
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">タイトル</th>
      <th scope="col">投稿</th>
      <th scope="col">写真</th>
      <th scope="col">投稿者</th>
      <th scope="col">作成日</th>
      <th scope="col">投稿詳細へ</th>
    </tr>
  </thead> 

  <tbody id="content">
  @foreach($posts as $post)
    <tr class="count">
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->episode}}</td>
      <td><img src="{{ asset($post->image) }}" width="100" height="100"></td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->created_at}}</td>
      <td><a href="{{route('posts.show', $post->id)}}">投稿詳細へ</a></td>
    </tr>
    @endforeach
    </tbody>
  </table>


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




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function (){

    $(window).on("scroll", function () {
        // スクロール位置
       
        const bodyHeight = $(document).innerHeight();
        const windowHeight = window.innerHeight;

        let st = $(window).scrollTop();
        const bottom = bodyHeight - windowHeight - st;
        // 画面最下部にスクロールされている場合
        if (bottom <= 1) {
            // ajaxコンテンツ追加処理
            // console.log(bottom);

            ajax_add_content()
        }
    });


    // ajaxコンテンツ追加処理
function ajax_add_content() {
    // 追加コンテンツ
    var add_content = "";
    // コンテンツ件数           
    var count = $(".count").length;
     
    // ajax処理
    $.post({
      headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        type: "post",
        datatype: "json",
        url: "/ajax/scroll",
        data:{ count : count }
    }).done(function(data){
      console.log(data);
        //コンテンツ生成
        // $.each(data,function(key, val){
        //     add_content += "<div>"+val.content+"</div>";
        // })
        for (var i=0; i<data.length; i++) {
          $("#content").append(`<tr class="count">
      <th scope="row">${data[i]["id"]}</th>
      <td>${data[i]["title"]}</td>
      <td>${data[i]["episode"]}</td>
      <td><img src="${data[i]["image"]}" width="100" height="100"></td>
      <td>${data[i]["user"]["name"]}</td>
      <td>${data[i]["created_at"]}</td>
      <td><a href="/posts/${data[i]["id"]}">投稿詳細へ</a></td>
    </tr>`);
}
        // コンテンツ追加
        // 取得件数を加算してセット
    }).fail(function(e){
        console.log(e);
    })
}
  });  


</script>

