


function Loading() {
    var $loading = $('<div class="loading"><div class="logo_center"></div></div>').appendTo('body');
    setTimeout(() => {
        $('.logo_center').addClass('done');
        setTimeout(() => {
            $('.loading').addClass('remove');
            $loading.remove();
            return $loading;
        }, 1000);
    }, 500);
}

$(function () {
    Loading();
    $('.tab_content , .t2_content , .lv_content , .gift_content').hide();
    $('.tab_content[data-tab="tab1"] , .t2_content[data-t2="tab1"] , .lv_content[data-lv="tab1"] , .gift_content[data-gift="tab1"]').show().addClass('active');
    $('.tab[data-tab="tab1"] , .t2_tab[data-t2="tab1"] , .lv_content[data-lv="tab1"] , .gift_content[data-gift="tab1"]').addClass('active');
    $('.tab').on('click', function () {
        var tabData = $(this).data('tab');
        $('.tab_content').hide().removeClass('active');
        $('.tab').removeClass('active');
        $('.tab_content[data-tab="' + tabData + '"]').show().addClass('active');
        $('.tab[data-tab="' + tabData + '"]').addClass('active');
        pop();
    })
    $('.t2_tab').on('click', function () {
        var tabData = $(this).data('t2');
        $('.t2_content').hide().removeClass('active');
        $('.t2_tab').removeClass('active');
        $('.t2_content[data-t2="' + tabData + '"]').show().addClass('active');
        $('.t2_tab[data-t2="' + tabData + '"]').addClass('active');
        var otherBoxHtml = (tabData == 'tab2') ? '<div class="other pop" data-pop="notice_sec2_2">注意事項</div>' : (tabData == 'tab1') ? '<div class="other pop" data-pop="content_sec2_1">道具說明</div><div class="other pop" data-pop="notice_sec2_1">注意事項</div>' : '<div class="other pop" data-pop="content_sec2_3">道具說明</div><div class="other pop" data-pop="notice_sec2_3">注意事項</div>';
        $(".other_box2").html(otherBoxHtml);
        pop();
    });
    pop();
});

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    focusOnSelect: true,
    variableWidth: true,
    centerMode: true,
});

$('.slick-next , .slick-prev').text('');


// menu開關
$(".menu_toggle , .sec").on('click', function () {
    $('.menu_toggle').toggleClass("on");
    $('.menu_section').toggleClass("on");
});




function pop() {
    $('.pop').on("click", function () {
        $('.mask , .pop_b_wrap').fadeIn();
        let popId = $(this).data('pop');
        if (popId == 'notice_sec1') {
            $(".pop_b_box").html(close + notice.title + notice.sec01);
        } else if (popId == 'notice_sec2_1') {
            $(".pop_b_box").html(close + notice.title + notice.sec02_1);
        } else if (popId == 'notice_sec2_2') {
            $(".pop_b_box").html(close + notice.title + notice.sec02_2);
        } else if (popId == 'notice_sec2_3') {
            $(".pop_b_box").html(close + notice.title + notice.sec02_3);
        } else if (popId == 'notice_sec3') {
            $(".pop_b_box").html(close + notice.title + notice.sec03);
        } else if (popId == 'notice_sec4') {
            $(".pop_b_box").html(close + notice.title + notice.sec04);
        } else if (popId == 'notice_sec5') {
            $(".pop_b_box").html(close + notice.title + notice.sec05);
        } else if (popId == 'notice_sec6') {
            $(".pop_b_box").html(close + notice.title + notice.sec06);
        } else if (popId == 'content_sec2_1') {
            $(".pop_b_box").html(close + content.title.props + content.info.sec02_1);
        } else if (popId == 'content_sec2_3') {
            $(".pop_b_box").html(close + content.title.props + content.info.sec02_3);
        } else if (popId == 'content_sec3') {
            $(".pop_b_box").html(close + content.title.props + content.tab.sec03 + content.info.sec03);
            $('.lv_content').hide();
            $('.lv_content[data-lv="tab1"]').show().addClass('active');
            $('.lv_tab[data-lv="tab1"]').addClass('active');
            $('.lv_tab').on('click', function () {
                var tabData = $(this).data('lv');
                $('.lv_content').hide().removeClass('active');
                $('.lv_tab').removeClass('active');
                $('.lv_content[data-lv="' + tabData + '"]').show().addClass('active');
                $('.lv_tab[data-lv="' + tabData + '"]').addClass('active');
                pop();
            });
        } else if (popId == 'content_sec5') {
            $(".pop_b_box").html(close + content.title.content + content.info.sec05);
        } else if (popId == 'content_sec6') {
            $(".pop_b_box").html(close + content.title.props + content.tab.sec06 + content.info.sec06);
            $('.gift_content').hide();
            $('.gift_content[data-gift="tab1"]').show().addClass('active');
            $('.gift_tab[data-gift="tab1"]').addClass('active');
            $('.gift_tab').on('click', function () {
                var tabData = $(this).data('gift');
                $('.gift_content').hide().removeClass('active');
                $('.gift_tab').removeClass('active');
                $('.gift_content[data-gift="' + tabData + '"]').show().addClass('active');
                $('.gift_tab[data-gift="' + tabData + '"]').addClass('active');
                pop();
            });
        } else if (popId == 'sec6_img_1') {
            $(".pop_b_box").html(close + content.title.props + content.img.sec06_1);
        } else if (popId == 'sec6_img_2') {
            $(".pop_b_box").html(close + content.title.props + content.img.sec06_2);
        }

        $('.close , .mask').on("click", function () {
            cancel();
        });

    })

    function cancel() {
        $('.pop_b_wrap, .mask').fadeOut();
    }



}

