// pop跳窗

function _close(){
    $('.mask').fadeOut(200);
    $("html").css("overflow", "scroll");
}
function skillInt(arrayName){
    $("html").css("overflow", "hidden");
    var _popContainer =``;
    for(  i = 0 ; i <= 10 ; i++ ){
        _popContainer += `
        <div class="title">
        `+arrayName[i].icon+`
        `+arrayName[i].title+`
        </div>
        <div class="text">`+arrayName[i].text+`</div>
        <div class="line"></div>
        `
    }
    $('.popContainer').html(_popContainer);
    setTimeout(() => {
        $('#pop1').fadeIn(200);
    }, 200);
}



// bar選單的hover動畫
$(".menu").hover(
    function () {
        $("." + this.dataset.menuaction + "")
            .stop(true, true)
            .slideDown(500);
    },
    function () {
        $("." + this.dataset.menuaction + "")
            .stop(true, true)
            .slideUp(500);
    }
);



// section1資訊tab
$(".newsContainer .text").hide();
$(".newsContainer .textNA").show();
$(".new").addClass("active");
$(".newsTab .newsBtn").on("click", function () {
    $(".newsContainer .text").hide();
    $(".newsBtn").removeClass("active");
    $(this).addClass("active");
    $(".newsContainer .text").hide();
    $(".text" + this.dataset.news + "").show();
});
// section1 BN輪播
$(document).ready(function(){
    $('.swiper').slick({
        dots: true,
        arrows:false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
});




// section2角色資訊切換
$(".section2 .cha").hide();
$(".section2 .cha3").show();
$('.charBtn:eq(2)').addClass('active');
$(".section2 .charBtn").on("click", function () {
    $(".section2 .cha").hide();
    $('.charBtn').removeClass("active");
    $(this).addClass("active");
    $("." + this.dataset.char + "").show();
});


