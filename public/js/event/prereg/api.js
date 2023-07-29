let _api = "/api/prereg";
let _CheckLogin = $(".login_user_id").data("val");
if (_CheckLogin != "null") {
    _user = _CheckLogin;
} else {
    _user = null;
}

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
        function (res) {
            if (res.status == -99) {
                console.log("未登入");
            } else {
                console.log("已登入");
            }
        }
    );
}

$(".check_p2").on("click", function () {
    var _agree = $("#checkbox").prop("checked");
    var _phone = checkMobile();
    var _send = true;
    console.log(_user);
    if (_user == null) {
        p2_not_login();
        $(".popS").fadeIn(200);
        var _send = false;
        exit;
    }
    if (_agree == false) {
        p2_pre_safe_error();
        $(".popS").fadeIn(200);
        var _send = false;
        exit;
    }
    if (_phone == -99) {
        p2_number_error();
        $(".popS").fadeIn(200);
        var _send = false;
        exit;
    }
    if (_send == true) {
        $.post(
            _api,
            {
                type: "mobile_login",
                user: _user,
                phone: _phone,
            },
            function (res) {
                console.log(res);
            }
        );
    }
});
//電話號碼檢查
function checkMobile() {
    var _phone = $(".mobile").val();
    var _area = $(".mobile_area").val();
    // 台灣號碼為9碼
    if (_area == "+886") {
        if (_phone.length == 9 && !isNaN(_phone)) {
            return _area + _phone;
        } else if (_phone.length == 10 && !isNaN(_phone)) {
            // 有可能輸入09開頭,判斷第一碼是否為0
            if (_phone.substring(0, 1) != 0) {
                return -99;
            } else {
                // 整理號碼,回傳0以外後9碼
                return _area + _phone.substring(1, 10);
            }
        } else {
            return -99;
        }
        // 香港澳門號碼為8碼
    } else if (_area == "+852" || _area == "+853") {
        if (_phone.length == 8 && !isNaN(_phone)) {
            return _area + _phone;
        } else {
            return -99;
        }
    } else {
        return -99;
    }
}
