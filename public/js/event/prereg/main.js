//輪播主體設定
var swiper = new Swiper(".mainSwiper", {
    direction: "vertical", //垂直輪播
    keyboard : true, //鍵盤上下換頁
    mousewheel: true,
    speed: 500,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    }
});

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
    $('.p6text,.arm').animate({
        opacity: '0',
        top: '-=5px'
    },200)
    $('.p6text,.arm').animate({
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
$('.p2informationbtn').on("click",function(){
    $('.pop').fadeIn(200);
    p2informationIn();
})
$('.p2noticebtn').on("click",function(){
    $('.pop').fadeIn(200);
    p2noticeIn();
})

//小彈窗
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

//footer隱藏按鈕
let c = 0;
$('.footer-btnbox').on('click',function(){
    //入
    if(c == 0){
        c += 1;
        $('footer').fadeIn(500);
        $('.footer-btnbox').css({
            "background-color":"rgba(169, 211, 235, 1)"
        });
        $('.footer-btn p').delay(150).fadeOut(500);
        $('.footer-btnball').animate({
            marginLeft:'29px',
            rotate:'90deg'
        },500);
    }
    //出
    else{
        c -= 1;
        $('footer').fadeOut(500);
        $('.footer-btnbox').css({
            "background-color":"rgba(169, 211, 235, .5)"
        });
        $('.footer-btn p').fadeIn(500);
        $('.footer-btnball').animate({
            marginLeft:'3px',
            rotate:'0deg'
        },500);
    }
});