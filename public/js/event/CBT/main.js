
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
    $('.popL_info').animate({
        scrollTop: 0
    },10)
})
//p3說明彈窗開啟
$('.p3_notice_btn').on("click",function(){
    p3_event_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
    $('.popL_info').animate({
        scrollTop: 0
    },10)
})


//p4獎勵彈窗開啟
$('.p4_award_btn').on("click",function(){
    p4_award_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
    $('.popL_info').animate({
        scrollTop: 0
    },10)
})
//p4說明彈窗開啟
$('.p4_notice_btn').on("click",function(){
    p4_event_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
    $('.popL_info').animate({
        scrollTop: 0
    },10)
})


//p5獎勵彈窗開啟
$('.p5_award_btn').on("click",function(){
    p5_award_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
    $('.popL_info').animate({
        scrollTop: 0
    },10)
})
//p5說明彈窗開啟
$('.p5_notice_btn').on("click",function(){
    p5_event_pop()
    $('.popL').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
    $('.popL_info').animate({
        scrollTop: 0
    },10)
})
ttt()
scroll_p1()
scroll_p2()
scroll_p3()
scroll_p4()
scroll_p5()
function scroll_p1(){
    const option = {
        threshold: 0.5
    };
    const callback = (entries, observe) => {
        if (entries[0].isIntersecting) {
            if(screen.width > 768){
                $('.btn1').hover(function(){
                    $('.btn1').css("background","url(/img/event/CBT/p0/bar/menubtn1_hover.png)no-repeat center center / cover");
                },function(){
                    $('.btn1').css("background","url(/img/event/CBT/p0/bar/menubtn1.png)no-repeat center center / cover");
                });
                $('.btn1').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn1_hover.png)no-repeat center center / cover'
                })
            }else{
                $('.btn1').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn1m_hover.png)no-repeat center center / contain'
                })
            }
        } else {
            if(screen.width > 768){
                $('.btn1').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn1.png)no-repeat center center / cover'
                })
            }else{
                $('.btn1').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn1m.png)no-repeat center center / contain'
                })
            }
        }
    };
    const observer = new IntersectionObserver(callback, option);
    observer.observe(document.querySelector(".p1_wrap"));
}

function scroll_p2(){
    const option = {
        threshold: 0.5
    };
    const callback = (entries, observe) => {
        if (entries[0].isIntersecting) {
            if(screen.width > 768){
                $('.btn2').hover(function(){
                    $('.btn2').css("background","url(/img/event/CBT/p0/bar/menubtn2_hover.png)no-repeat center center / cover");
                },function(){
                    $('.btn2').css("background","url(/img/event/CBT/p0/bar/menubtn2.png)no-repeat center center / cover");
                });
                $('.btn2').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn2_hover.png)no-repeat center center / cover'
                })
            }else{
                $('.btn2').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn2m_hover.png)no-repeat center center / contain'
                })
            }
        } else {
            if(screen.width > 768){
                $('.btn2').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn2.png)no-repeat center center / cover'
                })
            }else{
                $('.btn2').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn2m.png)no-repeat center center / contain'
                })
            }
        }
    };
    const observer = new IntersectionObserver(callback, option);
    observer.observe(document.querySelector(".page2"));
}

function scroll_p3(){
    const option = {
        threshold: 0
    };
    const callback = (entries, observe) => {
        if (entries[0].isIntersecting) {
            if(screen.width > 768){
                $('.btn3').hover(function(){
                    $('.btn3').css("background","url(/img/event/CBT/p0/bar/menubtn3_hover.png)no-repeat center center / cover");
                },function(){
                    $('.btn3').css("background","url(/img/event/CBT/p0/bar/menubtn3.png)no-repeat center center / cover");
                });
                $('.btn3').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn3_hover.png)no-repeat center center / cover'
                })
            }else{
                $('.btn3').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn3m_hover.png)no-repeat center center / contain'
                })
            }
        } else {
            if(screen.width > 768){
                $('.btn3').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn3.png)no-repeat center center / cover'
                })
            }else{
                $('.btn3').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn3m.png)no-repeat center center / contain'
                })
            }
        }
    };
    const observer = new IntersectionObserver(callback, option);
    observer.observe(document.querySelector(".page3"));
}

function scroll_p4(){
    const option = {
        threshold: 0
    };
    const callback = (entries, observe) => {
        if (entries[0].isIntersecting) {
            if(screen.width > 768){
                $('.btn4').hover(function(){
                    $('.btn4').css("background","url(/img/event/CBT/p0/bar/menubtn4_hover.png)no-repeat center center / cover");
                },function(){
                    $('.btn4').css("background","url(/img/event/CBT/p0/bar/menubtn4.png)no-repeat center center / cover");
                });
                $('.btn4').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn4_hover.png)no-repeat center center / cover'
                })
            }else{
                $('.btn4').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn4m_hover.png)no-repeat center center / contain'
                })
            }
        } else {
            if(screen.width > 768){
                $('.btn4').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn4.png)no-repeat center center / cover'
                })
            }else{
                $('.btn4').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn4m.png)no-repeat center center / contain'
                })
            }
        }
    };
    const observer = new IntersectionObserver(callback, option);
    observer.observe(document.querySelector(".page4"));
}

function scroll_p5(){
    const option = {
        threshold: 0
    };
    const callback = (entries, observe) => {
        if (entries[0].isIntersecting) {
            if(screen.width > 768){
                $('.btn5').hover(function(){
                    $('.btn5').css("background","url(/img/event/CBT/p0/bar/menubtn5_hover.png)no-repeat center center / cover");
                },function(){
                    $('.btn5').css("background","url(/img/event/CBT/p0/bar/menubtn5.png)no-repeat center center / cover");
                });
                $('.btn5').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn5_hover.png)no-repeat center center / cover'
                })
            }else{
                $('.btn5').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn5m_hover.png)no-repeat center center / contain'
                })
            }
        } else {
            if(screen.width > 768){
                $('.btn5').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn5.png)no-repeat center center / cover'
                })
            }else{
                $('.btn5').css({
                    'background': 'url(/img/event/CBT/p0/bar/menubtn_M/menubtn5m.png)no-repeat center center / contain'
                })
            }
        }
    };
    const observer = new IntersectionObserver(callback, option);
    observer.observe(document.querySelector(".page5"));
}

function ttt(){
    if(screen.width > 768){
        $('.btn1').hover(function(){
            $('.btn1').css("background","url(/img/event/CBT/p0/bar/menubtn1_hover.png)no-repeat center center / cover");
        },function(){
            $('.btn1').css("background","url(/img/event/CBT/p0/bar/menubtn1.png)no-repeat center center / cover");
        });
        $('.btn2').hover(function(){
            $('.btn2').css("background","url(/img/event/CBT/p0/bar/menubtn2_hover.png)no-repeat center center / cover");
        },function(){
            $('.btn2').css("background","url(/img/event/CBT/p0/bar/menubtn2.png)no-repeat center center / cover");
        });
        $('.btn3').hover(function(){
            $('.btn3').css("background","url(/img/event/CBT/p0/bar/menubtn3_hover.png)no-repeat center center / cover");
        },function(){
            $('.btn3').css("background","url(/img/event/CBT/p0/bar/menubtn3.png)no-repeat center center / cover");
        });
        $('.btn4').hover(function(){
            $('.btn4').css("background","url(/img/event/CBT/p0/bar/menubtn4_hover.png)no-repeat center center / cover");
        },function(){
            $('.btn4').css("background","url(/img/event/CBT/p0/bar/menubtn4.png)no-repeat center center / cover");
        });
        $('.btn5').hover(function(){
            $('.btn5').css("background","url(/img/event/CBT/p0/bar/menubtn5_hover.png)no-repeat center center / cover");
        },function(){
            $('.btn5').css("background","url(/img/event/CBT/p0/bar/menubtn5.png)no-repeat center center / cover");
        });
    }
}