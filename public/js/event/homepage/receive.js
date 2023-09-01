var data_api = '.php';

// reward_get_setting();

// function reward_get_setting(){
    
// }

$('.boxDown').hide();
function show(){
    $('.boxDown').show();
    $('html, body').animate({
        scrollTop: $('.boxDown').offset().top
    }, 200);
}