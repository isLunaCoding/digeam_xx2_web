$('.menubtns div').on("click",function () {

    if (screen.width <= 768) {
        $('.menubarbtn').trigger("click")
    }

})

$('.btn1 a').click(function () {
    $('html,body').animate({
        scrollTop: $('#page1').offset().top
    }, 10);
});

$('.btn2 a').click(function () {
    $('html,body').animate({
        scrollTop: $('#page2').offset().top
    }, 10);
});

$('.btn3 a').click(function () {
    $('html,body').animate({
        scrollTop: $('#page3').offset().top
    }, 10);
});

$('.btn4 a').click(function () {
    $('html,body').animate({
        scrollTop: $('#page4').offset().top
    }, 10);
});

$('.btn5 a').click(function () {
    $('html,body').animate({
        scrollTop: $('#page5').offset().top
    }, 10);
});

//menubar收合按鈕
let k = 0
$('.menubarbtn').on("click",function(){
    //入
    if(k == 0){
        k += 1;
        $('.menubar').animate({
            right: "+=100%"
        })
        $('.menubarbtn .line1').animate({
            top: "+=13.2px",
            rotate: '+=45deg'
        })
        $('.menubarbtn .line2').animate({
            opacity: "0"
        })
        $('.menubarbtn .line3').animate({
            top: "-=13.2px",
            rotate: '-=45deg'
        })
        $('.menubarbtn div').css({
            filter: "drop-shadow(0 0 10px #fff9bc)"
        })
    }
    //出
    else{
        k -= 1;
        $('.menubar').animate({
            right: "-=100%"
        })
        $('.menubarbtn .line1').animate({
            top: "-=13.2px",
            rotate: '-=45deg'
        })
        $('.menubarbtn .line2').animate({
            opacity: "1"
        })
        $('.menubarbtn .line3').animate({
            top: "+=13.2px",
            rotate: '+=45deg'
        })
        $('.menubarbtn div').css({
            filter: "none"
        })
    }
})
