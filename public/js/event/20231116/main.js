//一進畫面預設的tab
    $(".tab_content").hide();
    $('.tab_content[data-tab="tab1"]').show();
    $('.tab[data-tab="tab1"]').addClass("active");
//tab按下去之後顯示的內容
$(".tab").on("click", function () {
    let tabData = $(this).data("tab");
    $(".tab_content").hide();
    $(".tab").removeClass("active");
    $('.tab_content[data-tab="' + tabData + '"]').show();
    $('.tab[data-tab="' + tabData + '"]').addClass("active");
});
//跳窗事件開始
$(".pop").on("click", function () {
    $(".mask , .pop_wrap").fadeIn(500);
    let popId = $(this).data("val");
    if (popId == "n1") {
        $(".pop_box").html(close + notice.title + notice.no1);
    } else if (popId == "n2") {
        $(".pop_box").html(close + notice.title + notice.no2);
    } else if (popId == "n3") {
        $(".pop_box").html(close + notice.title + notice.no3);
    } else if (popId == "p1") {
        $(".pop_box").html(close + props.title + props.pro1);
    } else if (popId == "p3") {
        $(".pop_box").html(close + props.title + props.pro3);
        $(".tab_content1").hide();
        $('.tab_content1[data-tab="tab1-1"]').show();
        $('.tab1[data-tab="tab1-1"]').addClass("active");
        $(".tab1").on("click", function () {
            let tabData = $(this).data("tab");
            $(".tab_content1").hide();
            $(".tab1").removeClass("active");
            $('.tab_content1[data-tab="' + tabData + '"]').show();
            $('.tab1[data-tab="' + tabData + '"]').addClass("active");
        });
    } else if (popId == "s3Img1") {
        $(".pop_box").html(close + cases.title + cases.case1);
    } else if (popId == "s3Img2") {
        $(".pop_box").html(close + cases.title + cases.case2);
    } else if (popId == "s3Img3") {
        $(".pop_box").html(close + cases.title + cases.case3);
    }
});
//跳窗結束 關閉跳窗開始
$(".close").on("click", function () {
    cancel();
});
//綁定跳窗事件
function cancel() {
    $(".mask , .pop_wrap").fadeOut(500);
};

// rwd menu開關
$(".menu_toggle").on("click" , function(){
    $(".menu").toggleClass("on");
    $(".menu_toggle").toggleClass("on");
});

// slider開始
// slider-for 下文區
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
// slider-nav 導覽區
$('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    // focusOnSelect: true,
    variableWidth: true, // 讓slider-nav的每個slide的寬度一樣
    centerMode: true, // 讓slider-nav位置居中
});
// 讓next previous 文字顯示不見
$('.slick-next , .slick-prev').text('');
