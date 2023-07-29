
let _api ='/api/prereg';
login()
function login(){
    $.post(_api,{
        type:'login',
        user:'jacky0996',
    },function(res){
        console.log(res)
    })
}

$('.checkbtn').on('click',function(){
    $.post(_api,{
        type:'mobile_login',
        user:'jacky0996',
        
    },function(res){
        console.log(res)
    })
})
