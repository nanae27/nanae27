$(function (){
    console.log('a');
    $(window).scroll(function() {
        // pageBottom = [bodyの高さ] - [windowの高さ]
        var pageBottom = document.body.clientHeight - window.innerHeight;
        // スクロール量を取得
        var currentPos = window.pageYOffset;
    
        // スクロール量が最下部の位置を過ぎたか判定
        if (pageBottom <= currentPos) {
            // スクロールが画面末端に到達している時
            /*
             * 追加情報を追加＆表示する処理を実行
             */
        }
    });

// $.ajax({
//     type: "GET",
//     url: "https://127.0.0.1:8000/home",
//     dataType : "json",
// })
// // Ajaxリクエストが成功した場合
// .done(function(data) {
//     // 取得した情報を表示する処理
// })
// // Ajaxリクエストが失敗した場合
// .fail(function(XMLHttpRequest, textStatus, errorThrown) {
//     alert(errorThrown);
// });


});  
