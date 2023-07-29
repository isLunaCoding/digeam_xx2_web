//輪播主體設定
var swiper = new Swiper(".mainSwiper", {
    direction: "vertical", //垂直輪播
    keyboard : true, //鍵盤上下換頁
    mousewheel: true,
    loop: false,
    speed: 500,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    }
});



//4熊貓賽跑
$('.panda1btn,.panda2btn,.panda3btn').on("click",function(){
    $('.pandas').animate({
        top: '-=15px'
    },400)
    $('.pandas').animate({
        top: '+=15px'
    },400)

    if(screen.width <= 820){
        $('.pandasValue').delay(100).animate({
            top: '-=15px'
        },400)
        $('.pandasValue').animate({
            top: '+=15px'
        },400)
    }else{
        $('.pandasValue').animate({
            left: '+=15px'
        },400)
        $('.pandasValue').animate({
            left: '-=15px'
        },400)
    }

})
$('.panda1btn').on("click",function(){
    $('.panda1').delay(500).fadeIn(200)
    $('.panda2').delay(500).fadeOut(200)
    $('.panda3').delay(500).fadeOut(200)
    $('.panda1Value').fadeIn(400)
    $('.panda2Value').fadeOut(400)
    $('.panda3Value').fadeOut(400)
    $('.panda1btn').addClass('panda1btn_2')
    $('.panda2btn').removeClass('panda2btn_2')
    $('.panda3btn').removeClass('panda3btn_2')
})
$('.panda2btn').on("click",function(){
    $('.panda1').delay(500).fadeOut(200)
    $('.panda2').delay(500).fadeIn(200)
    $('.panda3').delay(500).fadeOut(200)
    $('.panda1Value').fadeOut(400)
    $('.panda2Value').fadeIn(400)
    $('.panda3Value').fadeOut(400)
    $('.panda1btn').removeClass('panda1btn_2')
    $('.panda2btn').addClass('panda2btn_2')
    $('.panda3btn').removeClass('panda3btn_2')
})
$('.panda3btn').on("click",function(){
    $('.panda1').delay(500).fadeOut(200)
    $('.panda2').delay(500).fadeOut(200)
    $('.panda3').delay(500).fadeIn(200)
    $('.panda1Value').fadeOut(400)
    $('.panda2Value').fadeOut(400)
    $('.panda3Value').fadeIn(400)
    $('.panda1btn').removeClass('panda1btn_2')
    $('.panda2btn').removeClass('panda2btn_2')
    $('.panda3btn').addClass('panda3btn_2')
})

//p5遊戲特色輪播
$('.p5slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 3000
});
$('.slick-prev').on("click",function(){
    $('.p5flowers div:nth-child(1)').animate({
        rotate: '-=90deg'
    })
    $('.p5flowers div:nth-child(2)').animate({
        rotate: '+=90deg'
    })
    $('.p5flowers div:nth-child(3)').animate({
        rotate: '-=90deg'
    })
    $('.p5flowers div:nth-child(4)').animate({
        rotate: '+=90deg'
    })
})
$('.slick-next').on("click",function(){
    $('.p5flowers div:nth-child(1)').animate({
        rotate: '+=90deg'
    })
    $('.p5flowers div:nth-child(2)').animate({
        rotate: '-=90deg'
    })
    $('.p5flowers div:nth-child(3)').animate({
        rotate: '+=90deg'
    })
    $('.p5flowers div:nth-child(4)').animate({
        rotate: '-=90deg'
    })
})

//6職業介紹
$('.p6btn1,.p6btn2,.p6btn3,.p6btn4,.p6btn5').on("click",function(){
    $('.p6text').animate({
        opacity: '0',
        top: '-=5px'
    },200)
    $('.p6text').animate({
        opacity: '1',
        top: '+=5px'
    },500)
})
$('.p6btn1').on("click",function(){
    setTimeout("p6roles(1)",200);
    $('.p6btn1').addClass('p6btn1_2')
    $('.p6btn2').removeClass('p6btn2_2')
    $('.p6btn3').removeClass('p6btn3_2')
    $('.p6btn4').removeClass('p6btn4_2')
    $('.p6btn5').removeClass('p6btn5_2')
})
$('.p6btn2').on("click",function(){
    setTimeout("p6roles(2)",200);
    $('.p6btn1').removeClass('p6btn1_2')
    $('.p6btn2').addClass('p6btn2_2')
    $('.p6btn3').removeClass('p6btn3_2')
    $('.p6btn4').removeClass('p6btn4_2')
    $('.p6btn5').removeClass('p6btn5_2')
})
$('.p6btn3').on("click",function(){
    setTimeout("p6roles(3)",200);
    $('.p6btn1').removeClass('p6btn1_2')
    $('.p6btn2').removeClass('p6btn2_2')
    $('.p6btn3').addClass('p6btn3_2')
    $('.p6btn4').removeClass('p6btn4_2')
    $('.p6btn5').removeClass('p6btn5_2')
})
$('.p6btn4').on("click",function(){
    setTimeout("p6roles(4)",200);
    $('.p6btn1').removeClass('p6btn1_2')
    $('.p6btn2').removeClass('p6btn2_2')
    $('.p6btn3').removeClass('p6btn3_2')
    $('.p6btn4').addClass('p6btn4_2')
    $('.p6btn5').removeClass('p6btn5_2')
})
$('.p6btn5').on("click",function(){
    setTimeout("p6roles(5)",200);
    $('.p6btn1').removeClass('p6btn1_2')
    $('.p6btn2').removeClass('p6btn2_2')
    $('.p6btn3').removeClass('p6btn3_2')
    $('.p6btn4').removeClass('p6btn4_2')
    $('.p6btn5').addClass('p6btn5_2')
})


//側bar最尾端+上敬請期待
//8/31要拿掉
// $('.swiper-pagination').append(`<span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label=""></span>`)

//背景影片音樂開關
var x = document.getElementsByClassName('.videoBG');
let soundbtn = 0;
$('.soundbtn').on('click',function () {
    if(soundbtn == 0){
        $('.videoBG').prop('muted', true);
        soundbtn += 1;
    }
    else{
        $('.videoBG').prop('muted', false);
        soundbtn -= 1;
    }
})

//大彈窗內容
$('.XX').on("click",function(){
    $('.pop').fadeOut(200);
})
//p2初出江湖資訊彈窗
$('.p2informationbtn').on("click",function(){
    $('.pop').fadeIn(200);
    p2informationIn();
})
$('.p2noticebtn').on("click",function(){
    $('.pop').fadeIn(200);
    p2noticeIn();
})
//p3結交名士資訊彈窗
$('.p3listbtns').on("click",function(){
    $('.pop').fadeIn(200);
    p3listIn();
})
$('.p3informationbtn').on("click",function(){
    $('.pop').fadeIn(200);
    p3informationIn();
})
$('.p3missionbtn').on("click",function(){
    p3missionIn();
})
$('.p3XX').on("click",function(){
    $('.p3missionpop').fadeOut(200);
})
$('.p3noticebtn').on("click",function(){
    $('.pop').fadeIn(200);
    p3noticeIn();
})
$('.getcardbtn').on("click",function(){
    $('.p3resultpop').fadeIn(200);
    $('.result_new').hover(function(){
        $('.newinfo').css({display:'block'})
    },function(){
        $('.newinfo').css({display:'none'})
    });
    $('.result_now').hover(function(){
        $('.nowinfo').css({display:'block'})
    },function(){
        $('.nowinfo').css({display:'none'})
    });
    p3cardinfo();

})

//p4熊貓賽跑資訊彈窗
$('.p4informationbtn').on("click",function(){
    $('.pop').fadeIn(200);
    p4informationIn();
})
$('.p4noticebtn').on("click",function(){
    $('.pop').fadeIn(200);
    p4noticeIn();
})
$('.p4awards').on("click",function(){
    $('.pop').fadeIn(200);
    p4awardIn();
})

//小彈窗
//p2初出江湖綁定結果窗
// $('.page2 .checkbtn').on("click",function(){
//     $('.popS').fadeIn(200);
// })

$('.popScheckBtn').on("click",function(){
    $('.popS').fadeOut(200);
})


//側bar收合按鈕
let k = 0;
if(screen.width <= 820){
    $('.menubtn').addClass("menubtn2");
    $('.menubtn').removeClass("menubtn1");
}else{
    $('.menubtn').addClass("menubtn1");
    $('.menubtn').removeClass("menubtn2");
}
$('.menubtn1,.menubtn2').on("click",function(){
    //入
    if(k == 0){
        k += 1;
        $('.menubtn1,.menubtn2').addClass("menubtnOpen");
        $('.menubtn2').css({
            background: 'none'
        })
        $('.barLine').animate({
            top: '0vh',
            opacity: '1'
        },200);
        if(screen.width <= 820){
            $('.bar').fadeIn(200);
        }else{
            $('.bar').delay(300).fadeIn(200);
        }
    }
    //出
    else{
        k -= 1;
        $('.menubtn1,.menubtn2').removeClass("menubtnOpen");
        $('.menubtn2').css({
            backgroundImage: 'linear-gradient(to bottom, #98a8cb, #424e7e)'
        })
        $('.barLine').delay(200).animate({
            top: '-100vh',
            opacity: '0'
        });
        $('.bar').fadeOut(200);
    }
})

$('.swiper-pagination').on("click",function(){
    k -= 1;
    $('.menubtn1,.menubtn2').removeClass("menubtnOpen");
    $('.menubtn2').css({
        backgroundImage: 'linear-gradient(to bottom, #98a8cb, #424e7e)'
    })
    $('.barLine').delay(200).animate({
        top: '-100vh',
        opacity: '0'
    });
    $('.bar').fadeOut(200);
})
