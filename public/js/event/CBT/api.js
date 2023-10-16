let _api = "/api/cbt";
let _CheckLogin = $(".login_user_id").data("val");

if (_CheckLogin != "null") {
    _user = _CheckLogin;
}else{
    _user = null;
}

let _play_times;



// 登出
function logout_dg() {
    $("#logout-form").submit();
}
login();
function login() {
    $.post(
        _api,
        {
            type: "login",
            user: _user,
        },
        function(res){
            if(res.status == -99){
                console.log("未登入");
                $(".player_points").html("0")
                $(".now_LV").html('');
            }else{
                _play_times = res.play_times
                console.log("您好，"+_user);
                //一步登仙頁面載入資料
                //當前境界
                if(res.play_times < 3 && res.play_times >= 0){
                    $(".now_LV").html('凡人')
                }else if(res.play_times < 5 && res.play_times >= 3){
                    $(".now_LV").html('煉氣')
                }else if(res.play_times < 7 && res.play_times >= 5){
                    $(".now_LV").html('築基')
                }else if(res.play_times < 9 && res.play_times >= 7){
                    $(".now_LV").html('結丹')
                }else if(res.play_times < 11 && res.play_times >= 9){
                    $(".now_LV").html('元嬰')
                }else if(res.play_times < 15 && res.play_times >= 11){
                    $(".now_LV").html('化神')
                }else if(res.play_times >= 15){
                    $(".now_LV").html('登仙')
                }
                
                // 當日可否遊玩
                if(res.play_status == 1){
                    $(".p4_gobtn").on("click",function(){
                        if(res.play_times >= 15){    //滿級
                            level_max()
                        }else{
                            already_play()
                        }
                    })
                }

                //禮包資料
                //載入點數餘額
                $(".player_points").html(res.points)

                //禮包載入時已購買
                if(res.gift299_status == 1){
                    $(".p3_buy299").css({
                        backgroundImage : "url(/img/event/CBT/p3/buybtn_al.png)",
                        pointerEvents: 'none'
                    })
                }
                if(res.gift999_status == 1){
                    $(".p3_buy999").css({
                        backgroundImage : "url(/img/event/CBT/p3/buybtn_al.png)",
                        pointerEvents: 'none'
                    })
                }
                if(res.gift2690_status == 1){
                    $(".p3_buy2690").css({
                        backgroundImage : "url(/img/event/CBT/p3/buybtn_al.png)",
                        pointerEvents: 'none'
                    })
                }
            }
        }
    );
}

//299禮包購買
var isclick_p3_299 = true
$(".p3_buy299").on("click",function(){
    if(isclick_p3_299){
        isclick_p3_299 = false

        $.post(
            _api,
            {
                type: "buy_gift",
                user: _user,
                gift: 299
            },
            function (res) {
                if(res.status == -99){
                    login_txt()
                }else if(res.status == -98 || res.status == -96 || res.status == 1){
                    gift_299_buy()
                    $('.checkbtn_2').on("click",function(){
                        if(res.status == -98){
                            error()
                        }else if(res.status == -96){
                            gift_already_buy()
                        }else if(res.status == 1){
                            location.reload();
                        }else{
                            error()
                        }
                    })
                }else if(res.status == -97){
                    point_not_enough()
                }else if(res.status == -95){
                    end()
                }else{
                    error()
                }
            }
        );

        setTimeout(function(){
            isclick_p3_299 = true
        },1000)
    }
})

//999禮包購買
var isclick_p3_999 = true
$(".p3_buy999").on("click",function(){
    if(isclick_p3_999){
        isclick_p3_999 = false

        $.post(
            _api,
            {
                type: "buy_gift",
                user: _user,
                gift: 999,
            },
            function (res) {
                if(res.status == -99){
                    login_txt()
                }else if(res.status == -98 || res.status == -96 || res.status == 1){
                    gift_999_buy()
                    $('.checkbtn_2').on("click",function(){
                        if(res.status == -98){
                            error()
                        }else if(res.status == -96){
                            gift_already_buy()
                        }else if(res.status == 1){
                            location.reload();
                        }else{
                            error()
                        }
                    })
                }else if(res.status == -97){
                    point_not_enough()
                }else if(res.status == -95){
                    end()
                }else{
                    error()
                }
            }
        );

        setTimeout(function(){
            isclick_p3_999 = true
        },1000)
    }
})

//2690禮包購買
var isclick_p3_2690 = true
$(".p3_buy2690").on("click",function(){
    if(isclick_p3_2690){
        isclick_p3_2690 = false;

        $.post(
            _api,
            {
                type: "buy_gift",
                user: _user,
                gift: 2690,
            },
            function (res) {
                if(res.status == -99){
                    login_txt()
                }else if(res.status == -98 || res.status == -96 || res.status == 1){
                    gift_2690_buy()
                    $('.checkbtn_2').on("click",function(){
                        if(res.status == -98){
                            error()
                        }else if(res.status == -96){
                            gift_already_buy()
                        }else if(res.status == 1){
                            location.reload();
                        }else{
                            error()
                        }
                    })
                }else if(res.status == -97){
                    point_not_enough()
                }else if(res.status == -95){
                    end()
                }else{
                    error()
                }
            }
        );

        setTimeout(function(){
            isclick_p3_2690 = true
        },1000);
    }
})

//一步登仙
var isclick_p4 = true
$(".p4_gobtn").on("click",function(){
    if(isclick_p4){
        isclick_p4 = false;

        $.post(
            _api,
            {
                type: "play",
                user: _user,
            },
            function(res){
                if(res.status == -99){
                    login_txt()
                }else if(res.status == 1){    //當日未遊玩
                    if(_play_times >= 15){    //滿級
                        level_max()
                    }else if(_play_times < 15 && _play_times >= 0){
                        _play_times += 1
                        $('.p4_man2').animate({
                            opacity: "0"
                        },300);
                        $('.p4_gobtn').animate({
                            rotate: '1800deg'
                        },1000)
                        setTimeout(function(){
                            if(_play_times < 3 && _play_times > 0){
                                $('.popS').fadeIn(200)
                                $('.popStext').html('目前在<span>凡人</span>境界。​<br/>距離<span>煉氣</span>境界還剩<span>'+(3-_play_times)+'</span>次。')
                                $('.doublebtns').hide()
                                $('.checkbtn_1').show()
                                $('body').css({
                                    "overflow":"hidden"
                                });
                                $('.checkbtn_1').on("click",function(){
                                    location.reload();
                                })
                            }else if(_play_times == 3){
                                level_1()
                            }else if(_play_times > 3 && _play_times < 5){
                                $('.popS').fadeIn(200)
                                $('.popStext').html('目前在<span>煉氣</span>境界。​<br/>距離<span>築基</span>境界還剩<span>'+(5-_play_times)+'</span>次。')
                                $('.doublebtns').hide()
                                $('.checkbtn_1').show()
                                $('body').css({
                                    "overflow":"hidden"
                                });
                                $('.checkbtn_1').on("click",function(){
                                    location.reload();
                                })
                            }else if(_play_times == 5){
                                level_2()
                            }else if(_play_times > 5 && _play_times < 7){
                                $('.popS').fadeIn(200)
                                $('.popStext').html('目前在<span>築基</span>境界。​<br/>距離<span>結丹</span>境界還剩<span>'+(7-_play_times)+'</span>次。')
                                $('.doublebtns').hide()
                                $('.checkbtn_1').show()
                                $('body').css({
                                    "overflow":"hidden"
                                });
                                $('.checkbtn_1').on("click",function(){
                                    location.reload();
                                })
                            }else if(_play_times == 7){
                                level_3()
                            }else if(_play_times > 7 && _play_times < 9){
                                $('.popS').fadeIn(200)
                                $('.popStext').html('目前在<span>結丹</span>境界。​<br/>距離<span>元嬰</span>境界還剩<span>'+(9-_play_times)+'</span>次。')
                                $('.doublebtns').hide()
                                $('.checkbtn_1').show()
                                $('body').css({
                                    "overflow":"hidden"
                                });
                                $('.checkbtn_1').on("click",function(){
                                    location.reload();
                                })
                            }else if(_play_times == 9){
                                level_4()
                            }else if(_play_times > 9 && _play_times < 11){
                                $('.popS').fadeIn(200)
                                $('.popStext').html('目前在<span>元嬰</span>境界。​<br/>距離<span>化神</span>境界還剩<span>'+(11-_play_times)+'</span>次。')
                                $('.doublebtns').hide()
                                $('.checkbtn_1').show()
                                $('body').css({
                                    "overflow":"hidden"
                                });
                                $('.checkbtn_1').on("click",function(){
                                    location.reload();
                                })
                            }else if(_play_times == 11){
                                level_5()
                            }else if(_play_times > 11 && _play_times < 15){
                                $('.popS').fadeIn(200)
                                $('.popStext').html('目前在<span>化神</span>境界。​<br/>距離<span>登仙</span>境界還剩<span>'+(15-_play_times)+'</span>次。')
                                $('.doublebtns').hide()
                                $('.checkbtn_1').show()
                                $('body').css({
                                    "overflow":"hidden"
                                });
                                $('.checkbtn_1').on("click",function(){
                                    location.reload();
                                })
                            }else if(_play_times == 15){
                                level_6()
                            }else{
                                error()
                            }
                        },1000)
                    }else{
                        error()
                    }
                }else if(res.status == -98){  //當日已遊玩
                    if(_play_times >= 15){    //滿級
                        level_max()
                    }else{
                        already_play()
                    }
                }else if(res.status == -97){
                    end()
                }
    
            }
        )

        setTimeout(function(){
            isclick_p4 = true
        },1000)
    }
})

//問題回報
let imgSize;
$("#imgInp").on('change',function(){
    imgSize = (this.files[0].size)/1024/1024
})
let _radio;
$("#abn").on('click',function(){
    _radio = 1;
})
$("#mis").on('click',function(){
    _radio = 2;
})
$("#other").on('click',function(){
    _radio = 3;
})
jsPost = 1;
$(".p5_enter_btn").on("click",function(){
    let _content = $(".textareaBox").val();
    
    if(imgSize > 2){
        img_size()
    }else{
        $.post(
            _api,
            {
                type: "report",
                user: _user,
                bug_report: _radio,
                bug_report_txt: _content,
                bug_report_img: $("#imagePreview").attr("src"),
            },
            function(res){
                if(res.status == -99){
                    login_txt()
                }else if(res.status == -98 || res.status == -97 || res.status == -96 || res.status == 1){
                    if(res.status == -98){
                        img_mis()
                    }else if(res.status == -97){
                        no_type()
                    }else if(res.status == -96){
                        no_text()
                    }else if(res.status == 1){
                        report_success()
                    }
                }else if(res.status == -95){
                    end2()
                }else{
                    error()
                }
            }
        )
    }
})

//上傳圖片並預覽(轉base64)
$("#imgInp").change(function(){
    $("#imagePreview").show()
    readImgURL(this);
});

function readImgURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $("#imagePreview").attr("src",e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}