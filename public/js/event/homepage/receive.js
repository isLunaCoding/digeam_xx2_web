var data_api = '.php';

// reward_get_setting();

// function reward_get_setting(){
    
// }

$('.boxDown').hide();
function show_cont(event_id){
    $('.boxDown').show();
    $('html, body').animate({
        scrollTop: $('.boxDown').offset().top
    }, 200);
}


// 印活動名稱資料
$(function(res) {
    $('.awardList').html(res.list);
})


function get_reward(content_id){
    console.log(1111);
}