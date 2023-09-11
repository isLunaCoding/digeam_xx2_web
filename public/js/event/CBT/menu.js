
$('.menubtns div').on("click",function () {

    if (screen.width <= 768) {
        $('.menubarbtn').trigger("click")
    }

})

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