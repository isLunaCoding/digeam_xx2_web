var api_data = '';



function reward_get_setting(){
    // $.post(api_data,
    // {
    //     type : 'login',
    //     user_id : ''
    // },function(_res){
        let res = resLogin;
        // let res = JSON.parse(_res);
        $('.awardList').html(res.list)
        
    // })

}



var playeFrorm = $('#playeFrorm');
var selectServer = $('#server');
var selectCharacter = $('#character');
var optionServer ='';
var optionCharacter ='';
var optionCharacterName ='';

// 伺服器切換call char api
selectServer.change(function(){
    optionServer = selectServer.val();
    console.log(optionServer);
    
    if( optionServer !=="0" ){
        // playeFrorm.submit();//表單可以提交
        get_char(optionServer);
    }
});


// 角色切換 抓角色名稱
selectCharacter.change(function(){
    optionCharacter = selectCharacter.val();
    optionCharacterName = selectCharacter.find('option:selected').text()
    console.log(optionCharacter);
    console.log(optionCharacterName);
})



var resChar = {
    status:1,
    char_list:{
        0:{
            charid:70001869,
            name:'APItest'
        },
        1:{
            charid:80001869,
            name:'2APItest'
        }
    }
}

function get_char(server_id){
    // $.post(api_data,
    // {
    //     type : 'char',
    //     user_id : $(".account span").text(),
    //     server_id : server_id
    // },function(_res){
        let res = resChar;
        // let res = JSON.parse(_res);
        if( res.status == -99 ){
            alert('請先登入<br>有任何問題請連繫客服')
        }else if( res.status == 1 ){
            for (var i in res.char_list) {
                $("#character").append($("<option></option>").attr("value", res.char_list[i].charid).text(res.char_list[i].name));
            }
        }
    // })
}



function get_reward(content_id){
if( optionServer !=="0" && optionCharacter !== "0" ){

    // $.post(api_data,
    // {
    //     type : 'reward',
    //     user_id : $(".account span").text(),
    //     content_id : content_id,
    //     server_id : optionServer,
    //     char_id : optionCharacter,
    //     char_name : optionCharacterName,
    // },function(_res){
        
        // if( res.status == -99 ){
            // alert('不明錯誤<br>請連繫客服')
        // }
        // if( res.status == 1 ){
            console.log(optionServer);
            console.log(optionCharacter);
            console.log(optionCharacterName);
            alert('領取成功');
        // }
    // })
}}








// 活動搜尋列年月
var keyword = $('#keyword')
var selectYear = $('#year')
var selectMonth = $('#month')
var keywordVal = ''
var yearVal = ''
var monthVal = ''

selectYear.change(function(){
    yearVal = selectYear.val();
    console.log(yearVal);
})
selectMonth.change(function(){
    monthVal = selectMonth.val();
    console.log(monthVal);
})
keyword.change(function(){
    keywordVal = keyword.val();
    console.log(keywordVal);
})


// var keywordValue = $('#keyword');
// var yearValue = $('#year');
// var monthValue = $('#month');
// var submitBTN = $('.submit');
// var keyword = $('#keyword');
// var year = $('#year');
// var month = $('#month');
// var submitBTN = $('.submit');

// searchInput.addEventListener("keydown", function(event) {
//     if (event.keyCode === 13) {
//         event.preventDefault();
        
//         validateForm();
//     }
// });

// function validateForm(){

// }










$('.boxDown').hide();

function show_cont(event_id){
    let box = $('.boxDown')
    box.show();
    $('html').animate({
        scrollTop: $('.boxDown').offset().top
    }, 200);

    console.log(event_id);
    // window.scrollBy(0, 500); // 向下滚动500像素
}
