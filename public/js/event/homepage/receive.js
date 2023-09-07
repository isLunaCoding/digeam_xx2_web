var api_data = "api/reward";

function logout_dg() {
    $("#logout-form").submit();
}

$(".boxDown").hide();

reward_get_setting();
function reward_get_setting() {
    $.post(
        api_data,
        {
            type: "login",
            user_id: $(".account span").text(),
        },
        function (res) {
            $(".awardList").html(res.list);
            showPage(1);
            generatePagination();
        }
    );
}

var playerFrorm = $("#playerFrorm");
var selectServer = $("#server");
var selectCharacter = $("#character");
var optionServer = "0";
var optionCharacter = "0";
var optionCharacterName = "";

// 伺服器切換call char api
selectServer.change(function () {
    optionServer = selectServer.val();

    if (optionServer !== "0") {
        get_char(optionServer);
    }
});

// 角色切換 抓角色名稱
selectCharacter.change(function () {
    optionCharacter = selectCharacter.val();
    optionCharacterName = selectCharacter.find("option:selected").text();
});

function get_char(server_id) {
    $.post(
        api_data,
        {
            type: "char",
            user_id: $(".account span").text(),
            server_id: server_id,
        },
        function (res) {
            if (res.status == -99) {
                alert("請先登入<br>有任何問題請連繫客服");
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

function get_reward(content_id) {
    if (optionServer !== "0" && optionCharacter !== "0") {
        $.post(
            api_data,
            {
                type: "reward",
                user_id: $(".account span").text(),
                content_id: content_id,
                server_id: optionServer,
                charid: optionCharacter,
                char_name: optionCharacterName,
            },
            function (res) {
                if (res.status == -99) {
                    alert("不明錯誤<br>請連繫客服");
                }
                if (res.status == 1) {
                    alert("領取成功");
                    location.reload();
                }
            }
        );
    } else {
        alert("請選擇伺服器及角色");
    }
}

// 活動搜尋列年月
var keyword = $("#keyword");
var selectYear = $("#year");
var selectMonth = $("#month");
var keywordVal = "";
var yearVal = "0";
var monthVal = "0";

selectYear.change(function () {
    yearVal = selectYear.val();
});
selectMonth.change(function () {
    monthVal = selectMonth.val();
});
keyword.change(function () {
    keywordVal = keyword.val();
    if (keywordVal === "") {
        keywordVal = null;
        console.log(keywordVal);
    }
});

$('#keyword input[name="keyword"]').on("keypress", function (event) {
    if (event.which === 13) {
        event.preventDefault();
        keywordWall();
    }
});

function keywordWall() {
    if (keywordVal === null && yearVal === "0" && monthVal === "0") {
        alert("請填寫關鍵字、年、月任一項目");
    } else {
        awardSearch();
        function awardSearch() {
            $.post(
                api_data,
                {
                    type: "search",
                    keyword: keywordVal,
                    year: yearVal,
                    month: monthVal,
                },
                function (res) {
                    if (res.status == -99) {
                        alert("不明錯誤，請重整或連繫客服");
                    } else if (res.status == 1) {
                        $(".awardList").html(res.list);
                        showPage(1);
                        generatePagination();
                    }
                }
            );
        }
    }
}

function show_cont(event_id) {
    $.post(
        api_data,
        {
            type: "show",
            user_id: $(".account span").text(),
            event_id: event_id,
        },
        function (res) {
            if (res.status == -99) {
                $(".show_title").html(res.title);
                $(".show_content").html(res.content);
                $(".boxDown").show();
            } else if (res.status == 1) {
                $(".show_title").html(res.title);
                $(".show_content").html(res.content);
                $(".boxDown").show();
            }
        }
    );
}

// 顯示當前頁li
function showPage(page) {
    var itemsPerPage = 5;
    var start = (page - 1) * itemsPerPage;
    var end = start + itemsPerPage;

    $(".awardList li").hide();

    $(".awardList li").slice(start, end).show();
}

// 頁碼顯示及前後頁切換
function generatePagination() {
    var itemsPerPage = 5;
    var totalItems = $(".awardList li").length;
    var totalPages = Math.ceil(totalItems / itemsPerPage);

    $(".pagination").empty();

    var prevBtn = $(
        "<li class='page-goto' aria-label='« Previous'>" + "‹" + "</li>"
    );
    $(".pagination").append(prevBtn);

    for (var i = 1; i <= totalPages; i++) {
        var li = $(
            "<li class='page-item'><a class='page-link' href='#'>" +
                i +
                "</a></li>"
        );
        $(".pagination").append(li);
    }

    var nextBtn = $("<li class='page-goto'>" + "›" + "</li>");
    $(".pagination").append(nextBtn);

    $(".page-goto").first().addClass("active");
    $(".page-item").first().addClass("active");

    $(".page-item").click(function () {
        var page = parseInt($(this).text());
        showPage(page);

        $(".page-item").removeClass("active");
        $(this).addClass("active");

        if (page === 1) {
            prevBtn.addClass("disabled");
        } else {
            prevBtn.removeClass("disabled");
        }

        if (page === totalPages) {
            nextBtn.addClass("disabled");
        } else {
            nextBtn.removeClass("disabled");
        }
    });

    // Previous點擊
    prevBtn.click(function () {
        var currentPage = parseInt($(".page-item.active").text());
        if (currentPage > 1) {
            showPage(currentPage - 1);
            $(".page-item")
                .removeClass("active")
                .eq(currentPage - 2)
                .addClass("active");
        }
    });

    // Next點擊
    nextBtn.click(function () {
        var currentPage = parseInt($(".page-item.active").text());
        if (currentPage < totalPages) {
            showPage(currentPage + 1);
            $(".page-item")
                .removeClass("active")
                .eq(currentPage)
                .addClass("active");
        }
    });
}
