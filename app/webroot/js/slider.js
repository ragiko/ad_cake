// サムネイルの枚数をちゃんと考える
// サムネイルが空のときの処理

$(function() {
    $(".xv-thumb").on({
        'mouseenter': function () {
            $("#imomushi .eye").text(">");
            console.log($(this).attr('id'))
            var id = $(this).attr('id');
            slideStart(id)
        },
        'mouseleave': function () {
            $("#imomushi .eye").text("-");
            console.log("out")
            slideStop()
        }
    }); 
});

function slideStart(id) {
    videoId = id;
    slideChange();
    timerId = setInterval('slideChange()', 220);
}

function slideStop() {
    clearInterval(timerId);
}

function slideChange() {
    var root_url = "/files/xvideo_thumb/";
    var thumb_cnt = 30;
    var url = $('#'+videoId).attr('src');
    var match = url.match(/\/files\/xvideo_thumb\/\d+\/(\d+)\.jpg/i);
    
    if (match == null) {
        // thumbnailを変更
        url = "/files/xvideo_thumb/"+videoId+"/1.jpg"; 
        $('img#'+videoId).attr('src', url);
    
        return;
    }
    
    num = parseInt(match[1]);
    if (thumb_cnt > num) {
        num++;
    } else {
        num = 1;
    }
    
    url = "/files/xvideo_thumb/"+videoId+"/"+num+".jpg";
    $('img#'+videoId).attr('src', url);
}

