
// 遊戲下載彈窗開啟
// $('.downlooad_btn').on("click",function(){
//     $('.popDownload').fadeIn(200)
//     $('body').css({
//         "overflow":"hidden"
//     });
// })


// 大彈窗關閉
$('.popL_xx').on("click",function(){
    $('.popL').fadeOut(200)
    $('.popDownload').fadeOut(200)
    $('body').css({
        "overflow":"auto"
    });
})


// 小彈窗取消鈕
$('.checkbtn_3').on("click",function(){
    $('.popStext').html('')
    $('.doublebtns').hide()
    $('.checkbtn_1').hide()
    $('.popS').fadeOut(200)
    $('body').css({
        "overflow":"auto"
    });
})

// 小彈窗確認鈕(單顆)
$('.checkbtn_1').on("click",function(){
    $('.popStext').html('')
    $('.doublebtns').hide()
    $('.checkbtn_1').hide()
    $('.popS').fadeOut(200)
    $('body').css({
        "overflow":"auto"
    });
})


// 時裝窗開閉
$('.p1_cloth').on("click",function(){
    $('.clothpop').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})
$('.clothpop').on("click",function(){
    $('.clothpop').fadeOut(200)
    $('body').css({
        "overflow":"auto"
    });
})


// 禮包1窗開閉
$('.p3_gift_299_img').on("click",function(){
    $('.gift1_pop').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})
$('.gift1_pop').on("click",function(){
    $('.gift1_pop').fadeOut(200)
    $('body').css({
        "overflow":"auto"
    });
})

// 禮包2窗開閉
$('.p3_gift_999_img').on("click",function(){
    $('.gift2_pop').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})
$('.gift2_pop').on("click",function(){
    $('.gift2_pop').fadeOut(200)
    $('body').css({
        "overflow":"auto"
    });
})

// 禮包3窗開閉
$('.p3_gift_2690_img').on("click",function(){
    $('.gift3_pop').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})
$('.gift3_pop').on("click",function(){
    $('.gift3_pop').fadeOut(200)
    $('body').css({
        "overflow":"auto"
    });
})


//web基金tab切換
$('.p2_tab1_btn').on("click",function(){
    $('.p2_tab1_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn1_hover.png)'
    })
    $('.p2_tab2_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn2.png)'
    })
    $('.p2_tab3_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn3.png)'
    })

    $('.p2_tab1_info').animate({
        opacity: '1'
    },300)
    $('.p2_tab2_info').animate({
        opacity: '0'
    },300)
    $('.p2_tab3_info').animate({
        opacity: '0'
    },300)

    $('.p2_tab1_img').animate({
        opacity: '1'
    },300)
    $('.p2_tab2_img').animate({
        opacity: '0'
    },300)
    $('.p2_tab3_img').animate({
        opacity: '0'
    },300)
})
$('.p2_tab2_btn').on("click",function(){
    $('.p2_tab2_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn2_hover.png)'
    })
    $('.p2_tab1_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn1.png)'
    })
    $('.p2_tab3_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn3.png)'
    })

    $('.p2_tab1_info').animate({
        opacity: '0'
    },300)
    $('.p2_tab2_info').animate({
        opacity: '1'
    },300)
    $('.p2_tab3_info').animate({
        opacity: '0'
    },300)
    
    $('.p2_tab1_img').animate({
        opacity: '0'
    },300)
    $('.p2_tab2_img').animate({
        opacity: '1'
    },300)
    $('.p2_tab3_img').animate({
        opacity: '0'
    },300)
})
$('.p2_tab3_btn').on("click",function(){
    $('.p2_tab3_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn3_hover.png)'
    })
    $('.p2_tab2_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn2.png)'
    })
    $('.p2_tab1_btn').css({
        backgroundImage: 'url(/img/event/CBT/p2/tabbtn1.png)'
    })

    $('.p2_tab1_info').animate({
        opacity: '0'
    },300)
    $('.p2_tab2_info').animate({
        opacity: '0'
    },300)
    $('.p2_tab3_info').animate({
        opacity: '1'
    },300)
    
    $('.p2_tab1_img').animate({
        opacity: '0'
    },300)
    $('.p2_tab2_img').animate({
        opacity: '0'
    },300)
    $('.p2_tab3_img').animate({
        opacity: '1'
    },300)
})

//rwd基金slick
 $(document).ready(function(){
    $('.p2_wrap_m').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
      });
});



//p3禮包介紹彈窗開啟
$('.p3_giftinfo_btn').on("click",function(){
    p3_gifts_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})
//p3說明彈窗開啟
$('.p3_notice_btn').on("click",function(){
    p3_event_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})


//p4獎勵彈窗開啟
$('.p4_award_btn').on("click",function(){
    p4_award_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})
//p4說明彈窗開啟
$('.p4_notice_btn').on("click",function(){
    p4_event_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})


//p5獎勵彈窗開啟
$('.p5_award_btn').on("click",function(){
    p5_award_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})
//p5說明彈窗開啟
$('.p5_notice_btn').on("click",function(){
    p5_event_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
})

