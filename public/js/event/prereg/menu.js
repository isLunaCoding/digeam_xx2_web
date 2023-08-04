$('.bar ul li a').click(function() {
    $('.bar ul li a').removeClass('active');
    var $this = $(this),
    _clickTab = $this.attr('id');
    $this.addClass('active');
    $(_clickTab).stop(false, true).fadeIn().siblings().hide();
    return false;
});