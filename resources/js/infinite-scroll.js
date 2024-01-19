$(document).ready(function () {
    let page = 2; // 初期のページ番号

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            // Ajaxを使用して新しいページをロード
            $.ajax({
                url: '?page=' + page,
                type: 'GET',
                dataType: 'html',
                success: function (data) {
                    if (data.trim() !== '') {
                        $('.flex-box-wrap').append(data);
                        page++;
                    }
                }
            });
        }
    });
});