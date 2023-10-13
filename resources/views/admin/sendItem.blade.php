<html>
<style>
    input {
        width: 400px;
        height: 40px;
        margin: 10px 0;
    }

    p {
        margin: 10px 0;
    }

    .submit {
        display: block
    }
</style>
<div id="exchangeForm">
    <input type="text" name="user" id="user" placeholder="要發送的玩家"><br>
    <select name="server" id="server">
        <option value="" disabled selected>伺服器</option>
        <option value="1801">十方鎮</option>
    </select>
    <select name="character" id="character">
        <option value="" disabled selected>角色名稱</option>
    </select>
</div>
<div id="sendForm">

    <input type="text" name="item" id="item" placeholder="要發送的道具">
    <p>ex:一個道具分類[1]</p>
    {{-- <p> 多個道具分類[1,2,3]</p> --}}
    <button class='submit' onclick="submit()">確認發送</button>
</div>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    var api_get_char = "https://xx2.digeam.com/api/reward";
    var selectServer = $("#server");
    var optionCharacter = "0";
    var optionCharacterName = "";
    var selectUser = $("#user");
    var selectCharacter = $("#character");

    selectServer.change(function() {
        optionServer = selectServer.val();
        optionUser = selectUser.val();
        exchange_get_char();
    });
    selectUser.change(function() {
        $("#character").empty();
        optionServer = selectServer.val();
        optionUser = selectUser.val();
        exchange_get_char();
    });

    function exchange_get_char() {
        $.post(
            api_get_char, {
                type: "char",
                user_id: optionUser,
                server_id: optionServer,
            },
            function(res) {
                if (res.status == -99) {
                    alert("請先輸入正確帳號");
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

    function submit() {
        var item = $("#item").val();
        if (optionUser == "" || item == "") {
            alert("請完整填寫，謝謝");
        } else {
            optionCharacter = selectCharacter.val();
            optionCharacterName = selectCharacter.find("option:selected").text();
            console.log(optionUser);
            console.log(item);
            console.log(optionCharacter);
            console.log(optionCharacterName);
            send(optionUser, optionServer, item, optionCharacter, optionCharacterName);
        }
    }

    function send(optionUser, optionServer, item, optionCharacter, optionCharacterName) {
        $.post(
            api_get_char, {
                type: "send",
                user_id: optionUser,
                server_id: optionServer,
                item: item,
                charid: optionCharacter,
                char_name: optionCharacterName,
            },
            function(res) {
                if (res.status == 1) {
                    alert("已成功發獎!");
                }
                else if(res.status == -99) {
                    alert("帳號查詢有誤!");
                }
                else if(res.status == -98) {
                    alert("寄送道具發生錯誤!");
                }
            }
        );
    }
</script>
