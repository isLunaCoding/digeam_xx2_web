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

function reward_get_setting(){

}



// 活動搜尋列年月

// var keywordValue = $('#keyword');
// var yearValue = $('#year');
// var monthValue = $('#month');
// var submitBTN = $('.submit');
var keyword = $('#keyword');
var year = $('#year');
var month = $('#month');
var submitBTN = $('.submit');

searchInput.addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        
        validateForm();
    }
});

function validateForm(){

}
