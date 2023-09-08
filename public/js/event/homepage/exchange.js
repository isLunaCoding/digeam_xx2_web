var api_data = "api/exchange";
var api_get_char = "api/reward";

var serial_num = $("#serial_num");
var exchangeForm = $("#exchangeForm");
var selectServer = $("#server");
var selectCharacter = $("#character");
var optionServer = "";
var optionCharacter = "";
var optionCharacterName = "";
var serial_text = "";

selectCharacter.change(function () {
    optionCharacter = selectCharacter.val();
    optionCharacterName = selectCharacter.find("option:selected").text();
});
selectServer.change(function () {
    optionServer = selectServer.val();
    exchange_get_char();
});
serial_num.change(function () {
    serial_text = serial_num.val();
    console.log(serial_text);
});

// var resExC = {
//     status: 1,
// };

function exchange_get_char() {
    console.log(optionServer);
    $.post(
        api_get_char,
        {
            type: "char",
            user_id: $(".account span").text(),
            server_id: optionServer,
        },
        function (res) {
            console.log(res);
            if (res.status == -99) {
                alert("請先登入帳號");
            } else if (res.status == 1) {
                for (var i in res.char_list) {
                    $("#character").append(
                        $("<option></option>")
                            .attr("value", res.char_list[i].charid)
                            .text(res.char_list[i].name)
                    );
                }
            }
        }
    );
}

// var resEx = {
//     status: 1,
// };

function ex_submit() {
    if ($(".account span").text() == "") {
        alert("請先登入");
    } else if (
        optionServer == "" ||
        optionCharacter == "" ||
        serial_text == ""
    ) {
        alert("請完整填寫伺服器、角色名稱、序號欄位，謝謝");
    } else if (
        optionServer !== "" &&
        optionCharacter !== "" &&
        serial_text !== ""
    ) {
        get_exchange();
    }
}

function get_exchange() {
    $.post(
        api_data,
        {
            type: "exchange",
            user_id: $(".account span").text(),
            serial_num: serial_text,
            sever_id: optionServer,
            charid: optionCharacter,
            char_name: optionCharacterName,
        },
        function (res) {
            // let res = resEx;
            // let res = JSON.parse(res);
            if (res.status == -99) {
                alert("序號錯誤");
            } else if (res.status == -98) {
                alert("序號不在兌換時間內");
            } else if (res.status == -97) {
                alert("序號已領取");
            } else if (res.status == -96) {
                alert("該序號數量已兌換完畢");
            } else if (res.status == -95) {
                alert("不明錯誤，請聯繫客服");
            } else if (res.status == 1) {
                alert("領取成功");
            }
        }
    );
}
