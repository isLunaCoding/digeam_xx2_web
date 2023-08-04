$('.bar ul li a').click(function() {
    $('.bar ul li a').removeClass('active');
    var $this = $(this),
    _clickTab = $this.attr('id');
    $this.addClass('active');
    $(_clickTab).stop(false, true).fadeIn().siblings().hide();
    return false;
});

$('.SUB1 a').click(function() {

    $('html,body').animate({

        scrollTop: $('.page1').offset().top

    }, 10);

    console.log(1);

});

$('.SUB2 a').click(function() {

    $('html,body').animate({

        scrollTop: $('.page2').offset().top

    }, 10);

});

$('.SUB3 a').click(function() {

    $('html,body').animate({

        scrollTop: $('.page3').offset().top

    }, 10);

});

$('.SUB4 a').click(function() {

    $('html,body').animate({

        scrollTop: $('.page4').offset().top

    }, 10);

});

$('.SUB5 a').click(function() {

    $('html,body').animate({

        scrollTop: $('.page5').offset().top

    }, 10);

});

$('.SUB6 a').click(function() {

    $('html,body').animate({

        scrollTop: $('.page6').offset().top

    }, 10);

});
