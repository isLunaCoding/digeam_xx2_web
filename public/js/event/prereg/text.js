//p2"初出江湖"活動說明
function p2informationIn() {
    var p2informationarray = [
        "活動時間：2023/8/3 12:00 (四) ~ 上市後一週。",
        "註冊並登入DiGeam掘夢網平台帳號。",
        "填寫手機號碼，並同意接收遊戲相關簡訊。",
        "點擊「初出江湖」按鈕，即可完成活動。",
    ];

    var p2information = "";

    for (j = 0; j < 4; j++) {
        p2information += '<li style="margin-left: 11%;">' + p2informationarray[j] + "</li>";
    }

    $(".poptitle").html("活動說明");
    $(".popTable").hide();
    $(".popText").show().html(p2information);
}

//p2"初出江湖"注意事項
function p2noticeIn() {
    var p2noticearray = [
        "每組掘夢網會員帳號僅限參加一次事前預約活動。本活動僅限台港澳地區玩家參與。",
        "請確認您填寫的手機號碼是否正確，每個手機號碼僅可申請一次事前預約活動。",
        "此活動的抽獎為機會中獎獎勵，玩家參與活動不代表即可獲得指定獎勵。",
        "本活動所提供之虛寶獎勵，皆為不可交易之性質，實際道具限制依遊戲內為準。<span>領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。</span>",
        "若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。",
        "本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌：人為操作、蓄意偽造、多開(重)帳號、短時間異常多筆參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正常的方式意圖進行不實或虛偽活動參與行為，參加者因上述情形所獲得之活動資格及獎項，本公司得一概取消之。",
        "本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。",
    ];

    var p2noticestr = "";

    for (j = 0; j < 7; j++) {
        p2noticestr += "<li>" + p2noticearray[j] + "</li>";
    }

    $(".poptitle").html("注意事項");
    $(".popTable").hide();
    $(".popText").show().html(p2noticestr);
}

//p2"初出江湖"預約成功彈窗
function p2_success() {
    $(".popStitle").html("已完成初出江湖");
    $(".popSText")
        .html(
            "由衷地感謝您參與初出江湖活動，前往下一步完成更多任務，將有機會解鎖更多的獎勵。"
        )
        .css({
            fontSize: "1.3rem",
        });
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1rem",
        });
    }
    $(".popScheckBtn").html("確認");
}
//p2"初出江湖"預約失敗彈窗-未登入
function p2_not_login() {
    $(".popStitle").html("");
    $(".popSText").html("請先登入掘夢網會員​").css({
        fontSize: "1.8rem",
    });
    if (screen.width <= 820) {
        $(".popSText").css({
            fontSize: "1.6rem",
        });
    }
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1.2rem",
        });
    }
    $(".popScheckBtn").html("確認");
}

//p2"初出江湖"預約失敗彈窗-手機號碼錯誤
function p2_number_error() {
    $(".popStitle").html("請填寫正確的手機號碼​");
    $(".popSText")
        .html(
            "※請檢查是否符合以下限制：<br>台灣玩家的號碼，請為不含特殊符號的半形數字10碼<br>港/澳玩家的號碼，請為不含符號的半形數字8碼​"
        )
        .css({
            fontSize: "1.3rem",
        });
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1rem",
        });
    }
    $(".popScheckBtn").html("確認");
}

//p2"初出江湖"預約失敗彈窗-門號已使用
function p2_mobile_already_use() {
    $(".popStitle").html("");
    $(".popSText").html("此門號已被使用，請重新確認！").css({
        fontSize: "1.8rem",
    });
    if (screen.width <= 820) {
        $(".popSText").css({
            fontSize: "1.6rem",
        });
    }
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1.2rem",
        });
    }
    $(".popScheckBtn").html("確認");
}
// //p2"初出江湖"預約失敗彈窗-已完成
function p2_already_pre() {
    $(".popStitle").html("您已經完成初出江湖！​");
    $(".popSText")
        .html(
            "由衷地感謝您參與初出江湖活動，前往下一步完成更多任務，將有機會解鎖更多的獎勵。​"
        )
        .css({
            fontSize: "1.3rem",
        });
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1rem",
        });
    }
    $(".popScheckBtn").html("確認");
}

//p2"初出江湖"預約失敗彈窗-未勾選
function p2_pre_safe_error() {
    $(".popStitle").html("");
    $(".popSText")
        .html(
            '請勾選 我已閱讀且同意<a href="https://www.digeam.com/index"  target="_blank">隱私權政策</a>與活動相關注意事項。​​'
        )
        .css({
            fontSize: "1.8rem",
        });
    if (screen.width <= 820) {
        $(".popSText").css({
            fontSize: "1.6rem",
        });
    }
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1.2rem",
        });
    }
    $(".popScheckBtn").html("確認");
}

//p2"初出江湖"預約活動結束彈窗
function p2_active_done() {
    $(".popStitle").html("活動已截止！​");
    $(".popSText").html("感謝您的支持！前往官網了解更多最新活動情報。​").css({
        fontSize: "1.3rem",
    });
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1rem",
        });
    }
    $(".popScheckBtn").html("前往官網");
}

//p3"結交名士"活動說明
function p3informationIn() {
    var p3informationarray = [
        "活動時間：2023/08/03 12:00 (四)  ~上市後一週",
        "活動期間內完成指定任務可獲得對應拜訪次數，部分任務於活動期間內僅可完成一次，可重複完成的任務將於每日00:00重置。",
        "完成任務取得拜訪次數後，點選【拜訪名士】即可進行結交名士。",
        "拜訪名士後，可確認該名士的能力值等相關介紹。",
        "累計拜訪次數達30次，可以從「仙道盟主沈仲陽」、「七花獸百花仙靈」、「愛之紅娘」三位名士中任選一位名士取代原先拜訪的名士，作為當前拜訪名士結果。",
        "可與拜訪的名士進行結義，進行結義後無法再更改結義名士，並可於後續遊戲內獲得選定結義名士的仙俠錄。",
    ];

    var p3information = "";

    for (j = 0; j < 6; j++) {
        p3information += "<li>" + p3informationarray[j] + "</li>";
    }

    $(".poptitle").html("活動說明");
    $(".popTable").hide();
    $(".popText").show().html(p3information);
}

//p3"結交名士"注意事項
function p3noticeIn() {
    var p3noticearray = [
        "此活動需完成事前預約活動才可參加。",
        "此活動的抽獎為機會中獎獎勵，玩家參與活動不代表即可獲得指定獎勵。",
        "玩家在拜訪名士後，再次進行拜訪名士將放棄前次抽取到的名士。",
        "結交名士活動最多只可獲得一次獎勵，且進行結義後即視為最終選定結果，無法再進行拜訪名士。",
        "本活動需要於主畫面點選結義按鈕選定最終獎勵，若因沒有進行結義導致無法取得獎勵，恕不進行補償。",
        "本活動所提供之虛寶獎勵，皆為不可交易之性質，實際道具限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。",
        "若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參噢，活動將照常舉行，不另做補償。",
        "本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌：人為操作、蓄意偽造、多開(重)帳號、短時間異常多筆參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正常的方式意圖進行不實或虛偽活動參與行為，參加者因上述情形所獲得之活動資格及獎項，本公司得一概取消之。",
        "本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主"
    ];

    var p3noticestr = "";

    for (j = 0; j < 9; j++) {
        p3noticestr += "<li>" + p3noticearray[j] + "</li>";
    }

    $(".poptitle").html("注意事項");
    $(".popTable").hide();
    $(".popText").show().html(p3noticestr);
}

//p3"結交名士"遊戲玩法
var p3samplerulesarray = [
    '完成<span onclick="p3missionIn()" >指定任務</span>，可取得拜訪次數。',
    '點選拜訪名士，取得名士卡片。<span class="listpop" onclick="p3listIn()">名士一覽</span>',
    "拜訪名士後，將會顯示該名士的能力值等相關介紹。",
    "若抽取的名士不符合需求，可透過完成各項指定任務，取得拜訪次數後重複抽取。",
    "可與拜訪的名士進行結義，進行結義後即為最終結果，不可變更。",
];

var p3samplerulesstr = "";

for (count = 0; count < 5; count++) {
    p3samplerulesstr += "<li>" + p3samplerulesarray[count] + "</li>";
}

$(".samplerules").html(p3samplerulesstr);

//p3"結交名士"名士一覽
function p3listIn() {
    var p3listarray = {
        name: ["七花獸百花仙靈", "仙道盟主沈仲陽", "愛之紅娘"],
        value: [
            "體質<span>+245</span>",
            "精神<span>+245</span>",
            "耐力<span>+245</span>",
            "罡氣<span>+4480</span>",
            "物理防禦<span>+204</span>",
            "法術防禦<span>+204</span>",
            "生命值<span>+10181</span>",
            "",
            "力量<span>+204</span>",
            "智力<span>+204</span>",
            "攻擊力<span>+285</span>",
            "罡氣攻擊<span>+244</span>",
            "物理攻擊<span>+244</span>",
            "法術攻擊<span>+244</span>",
            "",
            "",
            "體質<span>+245</span>",
            "精神<span>+245</span>",
            "耐力<span>+245</span>",
            "罡氣<span>+4480</span>",
            "物理防禦<span>+204</span>",
            "法術防禦<span>+204</span>",
            "生命值<span>+10181</span>",
            "",
        ],
        skill: [
            "煉獄火海",
            "兩儀反轉",
            "快跑女孩",
            "對前方區域造成傷害，該區域中會出現火海持續燃燒10秒。",
            "使用兩儀反轉後，所有受到的傷害將轉變為恢復生命，持續20秒。",
            "將目標變為毫無還手之力的小女孩。",
        ],
        others: [
            "仙道盟掌刑長老",
            "仙道盟執法長老",
            "仙道盟訓誡長老",
            "仙道盟傳功長老",
            "天魔計都",
            "天魔影煞",
            "齊天大聖",
            "吞靈獸",
            "愛之月老",
            "不死冰骷髏",
            "不死霜骷髏",
            "開明獸",
            "冰麒麟",
            "寒冰巨甲",
            "愛之禮官",
            "愛之花童",
            "愛之隨從",
            ""
        ],
    };

    var p3liststr = "";

    for (j = 0; j < 18; j += 3) {
        p3liststr +=
            "<tr><td>" +
            p3listarray.others[j] +
            "</td><td>" +
            p3listarray.others[j + 1] +
            "</td><td>" +
            p3listarray.others[j + 2] +
            "</td></tr>";
    }

    var p3listtopstr = "";

    for (a = 0; a < 3; a++) {
        if (screen.width <= 425) {
            p3listtopstr +=
                `
            <table class="toptable">
                <tr>
                    <td class="tableimg">
                        <img src="/img/event/prereg/p3/cardlist` +
                (a + 1) +
                `.png">
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td colspan=2  style="font-weight: bold;font-size: 1.2rem;text-align: center;">` +
                p3listarray.name[a] +
                `</td>
                            </tr>
                            <tr>
                                <td colspan=2 style="font-weight: bold;font-size: 1.1rem;">卡片屬性</td>
                            </tr>`;
        } else {
            p3listtopstr +=
                `
            <table class="toptable">
                <tr>
                    <td class="tableimg">
                        <img src="/img/event/prereg/p3/cardlist` +
                (a + 1) +
                `.png">
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td colspan=2  style="font-weight: bold;font-size: 30px;text-align: center;">` +
                p3listarray.name[a] +
                `</td>
                            </tr>
                            <tr>
                                <td colspan=2 style="font-weight: bold;font-size: 1.3rem;">卡片屬性</td>
                            </tr>`;
        }

        if (a == 0) {
            p3listtopstr +=
                `
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 0] +
                `</td>
                <td>` +
                p3listarray.value[a + 1] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 2] +
                `</td>
                <td>` +
                p3listarray.value[a + 3] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 4] +
                `</td>
                <td>` +
                p3listarray.value[a + 5] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 6] +
                `</td>
                <td>` +
                p3listarray.value[a + 7] +
                `</td>
            </tr>`;
        }
        if (a == 1) {
            p3listtopstr +=
                `
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 7] +
                `</td>
                <td>` +
                p3listarray.value[a + 8] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 9] +
                `</td>
                <td>` +
                p3listarray.value[a + 10] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 11] +
                `</td>
                <td>` +
                p3listarray.value[a + 12] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 13] +
                `</td>
                <td>` +
                p3listarray.value[a + 14] +
                `</td>
            </tr>`;
        }
        if (a == 2) {
            p3listtopstr +=
                `
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 14] +
                `</td>
                <td>` +
                p3listarray.value[a + 15] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 16] +
                `</td>
                <td>` +
                p3listarray.value[a + 17] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 18] +
                `</td>
                <td>` +
                p3listarray.value[a + 19] +
                `</td>
            </tr>
            <tr style="color: #000">
                <td>` +
                p3listarray.value[a + 20] +
                `</td>
                <td>` +
                p3listarray.value[a + 21] +
                `</td>
            </tr>`;
        }

        if (screen.width <= 425) {
            p3listtopstr +=
                `
            <tr>
                <td colspan=2 style="font-weight: bold;font-size: 1.1rem;">羈絆技能</td>
            </tr>
            <tr>
                <td colspan=2 style="color: #6782ae">` +
                p3listarray.skill[a] +
                `</td>
            </tr>
            <tr>
                <td colspan=2 style="color: #000">` +
                p3listarray.skill[a + 3] +
                `</td>
            </tr>
            </table>
            </td>
            </tr>
            </table>`;
        } else {
            p3listtopstr +=
                `
            <tr>
                <td colspan=2 style="font-weight: bold;font-size: 1.3rem;">羈絆技能</td>
            </tr>
            <tr>
                <td colspan=2 style="color: #6782ae">` +
                p3listarray.skill[a] +
                `</td>
            </tr>
            <tr>
                <td colspan=2 style="color: #000">` +
                p3listarray.skill[a + 3] +
                `</td>
            </tr>
            </table>
            </td>
            </tr>
            </table>`;
        }
    }

    $(".pop").fadeIn(200);
    $(".poptitle").html("名士一覽");
    $(".popTable")
        .show()
        .html(
            p3listtopstr +
                `
        <table class="othertable"><tr><td colspan=3 style="font-weight: bold;background-color: #627eac;color: #FFF;">名稱</td></tr>` +
                p3liststr +
                `</table><br/>`
        );
    $(".popText").hide();
}

//p3"結交名士"結果資訊
function p3cardinfo() {
    var p3cardinfoarray = {
        Ocard1: [
            "七花獸百花仙靈",
            "體質<span>+245</span>",
            "精神<span>+245</span>",
            "耐力<span>+245</span>",
            "罡氣<span>+4480</span>",
            "物理防禦<span>+204</span>",
            "法術防禦<span>+204</span>",
            "生命值<span>+10181</span>",
            "",
            "煉獄火海",
            "對前方區域造成傷害，該區域中會出現火海持續燃燒10秒。",
        ],
        Ocard2: [
            "仙道盟主沈仲陽",
            "力量<span>+204</span>",
            "智力<span>+204</span>",
            "攻擊力<span>+285</span>",
            "罡氣攻擊<span>+244</span>",
            "物理攻擊<span>+244</span>",
            "法術攻擊<span>+244</span>",
            "",
            "",
            "兩儀反轉",
            "使用兩儀反轉後，所有受到的傷害將轉變為恢復生命，持續20秒。",
        ],
        Ocard3: [
            "愛之紅娘",
            "體質<span>+245</span>",
            "精神<span>+245</span>",
            "耐力<span>+245</span>",
            "罡氣<span>+4480</span>",
            "物理防禦<span>+204</span>",
            "法術防禦<span>+204</span>",
            "生命值<span>+10181</span>",
            "",
            "快跑女孩",
            "將目標變為毫無還手之力的小女孩。",
        ],
        Pcard1: [
            "仙道盟訓誡長老",
            "力量<span>+85</span>",
            "智力<span>+85</span>",
            "額外傷害<span>+74</span>",
            "物理攻擊<span>+111</span>",
            "法術攻擊<span>+111</span>",
            "",
            "",
            "",
            "兩儀反轉",
            "使用兩儀反轉後，所有受到的傷害將轉變為恢復生命，持續20秒。",
        ],
        Pcard2: [
            "仙道盟執法長老",
            "體質<span>+102</span>",
            "精神<span>+102</span>",
            "耐力<span>+102</span>",
            "物理防禦<span>+93</span>",
            "法術防禦<span>+93</span>",
            "傷害吸收<span>+83</span>",
            "",
            "",
            "兩儀反轉",
            "使用兩儀反轉後，所有受到的傷害將轉變為恢復生命，持續20秒。",
        ],
        Pcard3: [
            "仙道盟傳功長老",
            "力量<span>+85</span>",
            "智力<span>+85</span>",
            "額外傷害<span>+74</span>",
            "物理攻擊<span>+111</span>",
            "法術攻擊<span>+111</span>",
            "",
            "",
            "",
            "兩儀反轉",
            "使用兩儀反轉後，所有受到的傷害將轉變為恢復生命，持續20秒。",
        ],
        Pcard4: [
            "仙道盟掌刑長老",
            "體質<span>+102</span>",
            "精神<span>+102</span>",
            "耐力<span>+102</span>",
            "物理防禦<span>+93</span>",
            "法術防禦<span>+93</span>",
            "傷害吸收<span>+83</span>",
            "",
            "",
            "兩儀反轉",
            "使用兩儀反轉後，所有受到的傷害將轉變為恢復生命，持續20秒。",
        ],
        Pcard5: [
            "天魔影煞",
            "力量<span>+85</span>",
            "智力<span>+85</span>",
            "額外傷害<span>+74</span>",
            "物理攻擊<span>+111</span>",
            "法術攻擊<span>+111</span>",
            "",
            "",
            "",
            "煉獄火海",
            "對前方區域造成傷害，該區域中會出現火海持續燃燒10秒。",
        ],
        Pcard6: [
            "天魔計都",
            "力量<span>+85</span>",
            "智力<span>+85</span>",
            "額外傷害<span>+74</span>",
            "物理攻擊<span>+111</span>",
            "法術攻擊<span>+111</span>",
            "",
            "",
            "",
            "煉獄火海",
            "對前方區域造成傷害，該區域中會出現火海持續燃燒10秒。",
        ],
        Bcard1: [
            "愛之月老",
            "體質<span>+44</span>",
            "精神<span>+44</span>",
            "耐力<span>+44</span>",
            "物理防禦<span>+43</span>",
            "法術防禦<span>+43</span>",
            "",
            "",
            "",
            "快跑女孩",
            "將目標變為毫無還手之力的小女孩。",
        ],
        Bcard2: [
            "吞靈獸",
            "體質<span>+44</span>",
            "精神<span>+44</span>",
            "耐力<span>+44</span>",
            "物理防禦<span>+43</span>",
            "法術防禦<span>+43</span>",
            "",
            "",
            "",
            "煉獄火海",
            "對前方區域造成傷害，該區域中會出現火海持續燃燒10秒。",
        ],
        Bcard3: [
            "齊天大聖",
            "力量<span>+37</span>",
            "智力<span>+37</span>",
            "物理攻擊<span>+52</span>",
            "法術攻擊<span>+52</span>",
            "",
            "",
            "",
            "",
            "煉獄火海",
            "對前方區域造成傷害，該區域中會出現火海持續燃燒10秒。",
        ],
        Gcard1: [
            "不死冰骷髏",
            "力量<span>+17</span>",
            "智力<span>+17</span>",
            "攻擊力<span>+29</span>",
            "",
            "",
            "",
            "",
            "",
            "無",
            "",
        ],
        Gcard2: [
            "不死霜骷髏",
            "力量<span>+17</span>",
            "智力<span>+17</span>",
            "攻擊力<span>+29</span>",
            "",
            "",
            "",
            "",
            "",
            "無",
            "",
        ],
        Gcard3: [
            "開明獸",
            "力量<span>+17</span>",
            "智力<span>+17</span>",
            "攻擊力<span>+29</span>",
            "",
            "",
            "",
            "",
            "",
            "無",
            "",
        ],
        Gcard4: [
            "冰麒麟",
            "力量<span>+17</span>",
            "智力<span>+17</span>",
            "攻擊力<span>+29</span>",
            "",
            "",
            "",
            "",
            "",
            "無",
            "",
        ],
        Gcard5: [
            "寒冰巨甲",
            "力量<span>+17</span>",
            "智力<span>+17</span>",
            "攻擊力<span>+29</span>",
            "",
            "",
            "",
            "",
            "",
            "無",
            "",
        ],
        Wcard1: [
            "愛之隨從",
            "體質<span>+10</span>",
            "精神<span>+10</span>",
            "耐力<span>+10</span>",
            "傷害吸收<span>+9</span>",
            "",
            "",
            "",
            "",
            "快跑女孩",
            "將目標變為毫無還手之力的小女孩。",
        ],
        Wcard2: [
            "愛之花童",
            "體質<span>+10</span>",
            "精神<span>+10</span>",
            "耐力<span>+10</span>",
            "傷害吸收<span>+9</span>",
            "",
            "",
            "",
            "",
            "快跑女孩",
            "將目標變為毫無還手之力的小女孩。",
        ],
        Wcard3: [
            "愛之禮官",
            "體質<span>+10</span>",
            "精神<span>+10</span>",
            "耐力<span>+10</span>",
            "傷害吸收<span>+9</span>",
            "",
            "",
            "",
            "",
            "快跑女孩",
            "將目標變為毫無還手之力的小女孩。",
        ],
    };

    var p3cardinfostr = "";
    if (result == orange) {
        if (result.num == 1) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/orange/card1_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Ocard1[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard1[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard1[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard1[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard1[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard1[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard1[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard1[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard1[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Ocard1[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Ocard1[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Ocard1[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard1[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard1[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard1[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard1[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard1[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard1[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard1[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard1[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Ocard1[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Ocard1[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/orange/card1_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/orange/card1_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 2) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/orange/card2_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Ocard2[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard2[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard2[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard2[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard2[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard2[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard2[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard2[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard2[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Ocard2[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Ocard2[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Ocard2[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard2[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard2[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard2[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard2[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard2[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard2[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard2[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard2[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Ocard2[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Ocard2[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/orange/card2_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/orange/card2_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 3) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/orange/card3_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Ocard3[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard3[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard3[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard3[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard3[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard3[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard3[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Ocard3[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Ocard3[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Ocard3[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Ocard3[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Ocard3[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard3[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard3[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard3[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard3[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard3[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard3[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Ocard3[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Ocard3[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Ocard3[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Ocard3[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/orange/card3_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/orange/card3_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }
    }else if (result == purple) {
        if (result.num == 1) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/purple/card1_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Pcard1[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard1[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard1[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard1[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard1[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard1[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard1[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard1[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard1[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Pcard1[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Pcard1[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Pcard1[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard1[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard1[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard1[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard1[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard1[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard1[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard1[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard1[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Pcard1[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Pcard1[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/purple/card1_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/purple/card1_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 2) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/purple/card2_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Pcard2[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard2[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard2[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard2[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard2[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard2[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard2[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard2[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard2[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Pcard2[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Pcard2[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Pcard2[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard2[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard2[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard2[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard2[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard2[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard2[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard2[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard2[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Pcard2[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Pcard2[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/purple/card2_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/purple/card2_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 3) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/purple/card3_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Pcard3[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard3[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard3[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard3[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard3[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard3[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard3[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard3[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard3[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Pcard3[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Pcard3[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Pcard3[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard3[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard3[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard3[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard3[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard3[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard3[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard3[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard3[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Pcard3[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Pcard3[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/purple/card3_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/purple/card3_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 4) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/purple/card4_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Pcard4[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard4[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard4[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard4[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard4[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard4[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard4[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard4[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard4[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Pcard4[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Pcard4[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Pcard4[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard4[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard4[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard4[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard4[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard4[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard4[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard4[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard4[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Pcard4[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Pcard4[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/purple/card4_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/purple/card4_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 5) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/purple/card5_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Pcard5[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard5[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard5[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard5[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard5[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard5[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard5[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard5[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard5[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Pcard5[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Pcard5[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Pcard5[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard5[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard5[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard5[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard5[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard5[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard5[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard5[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard5[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Pcard5[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Pcard5[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/purple/card5_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/purple/card5_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 6) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/purple/card6_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Pcard6[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard6[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard6[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard6[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard6[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard6[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard6[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Pcard6[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Pcard6[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Pcard6[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Pcard6[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Pcard6[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard6[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard6[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard6[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard6[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard6[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard6[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Pcard6[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Pcard6[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Pcard6[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Pcard6[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/purple/card6_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/purple/card6_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }
    }else if (result == blue) {
        if (result.num == 1) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/blue/card1_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Bcard1[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard1[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard1[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard1[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard1[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard1[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard1[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard1[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard1[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Bcard1[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Bcard1[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Bcard1[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard1[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard1[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard1[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard1[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard1[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard1[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard1[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard1[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Bcard1[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Bcard1[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/blue/card1_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/blue/card1_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 2) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/blue/card2_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Bcard2[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard2[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard2[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard2[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard2[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard2[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard2[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard2[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard2[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Bcard2[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Bcard2[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Bcard2[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard2[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard2[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard2[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard2[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard2[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard2[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard2[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard2[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Bcard2[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Bcard2[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/blue/card2_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/blue/card2_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 3) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/blue/card3_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Bcard3[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard3[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard3[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard3[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard3[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard3[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard3[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Bcard3[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Bcard3[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Bcard3[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Bcard3[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Bcard3[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard3[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard3[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard3[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard3[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard3[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard3[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Bcard3[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Bcard3[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Bcard3[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Bcard3[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/blue/card3_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/blue/card3_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }
    }else if (result == green) {
        if (result.num == 1) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/green/card1_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Gcard1[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard1[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard1[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard1[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard1[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard1[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard1[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard1[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard1[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Gcard1[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Gcard1[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Gcard1[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard1[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard1[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard1[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard1[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard1[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard1[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard1[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard1[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Gcard1[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Gcard1[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/green/card1_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/green/card1_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 2) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/green/card2_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Gcard2[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard2[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard2[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard2[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard2[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard2[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard2[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard2[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard2[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Gcard2[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Gcard2[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Gcard2[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard2[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard2[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard2[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard2[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard2[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard2[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard2[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard2[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Gcard2[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Gcard2[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/green/card2_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/green/card2_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 3) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/green/card3_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Gcard3[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard3[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard3[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard3[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard3[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard3[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard3[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard3[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard3[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Gcard3[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Gcard3[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Gcard3[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard3[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard3[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard3[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard3[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard3[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard3[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard3[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard3[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Gcard3[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Gcard3[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/green/card3_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/green/card3_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 4) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/green/card4_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Gcard4[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard4[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard4[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard4[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard4[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard4[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard4[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard4[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard4[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Gcard4[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Gcard4[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Gcard4[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard4[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard4[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard4[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard4[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard4[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard4[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard4[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard4[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Gcard4[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Gcard4[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/green/card4_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/green/card4_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 5) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/green/card5_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Gcard5[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard5[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard5[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard5[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard5[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard5[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard5[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Gcard5[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Gcard5[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Gcard5[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Gcard5[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Gcard5[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard5[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard5[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard5[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard5[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard5[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard5[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Gcard5[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Gcard5[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Gcard5[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Gcard5[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/green/card5_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/green/card5_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }
    }else if (result == white) {
        if (result.num == 1) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/white/card1_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Wcard1[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard1[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard1[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard1[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard1[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard1[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard1[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard1[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard1[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Wcard1[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Wcard1[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Wcard1[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard1[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard1[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard1[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard1[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard1[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard1[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard1[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard1[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Wcard1[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Wcard1[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/white/card1_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/white/card1_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 2) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/white/card2_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Wcard2[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard2[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard2[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard2[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard2[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard2[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard2[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard2[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard2[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Wcard2[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Wcard2[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Wcard2[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard2[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard2[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard2[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard2[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard2[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard2[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard2[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard2[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Wcard2[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Wcard2[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/white/card2_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/white/card2_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }else if (result.num == 3) {
            $(".result_new").html(
                `<img src="/img/event/prereg/p3/white/card3_M.png">`
            );

            var newinfostr = "";
            newinfostr +=`
            <table class="nowinfotable">
                <tr>
                    <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center" colspan=2>` +
                        p3cardinfoarray.Wcard3[0] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard3[1] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard3[2] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard3[3] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard3[4] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard3[5] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard3[6] +
                    `</td>
                </tr>
                <tr>
                    <td>` +
                        p3cardinfoarray.Wcard3[7] +
                    `</td>
                    <td>` +
                        p3cardinfoarray.Wcard3[8] +
                    `</td>
                </tr>
                <tr>
                    <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                </tr>
                <tr>
                    <td colspan=2><span>` +
                        p3cardinfoarray.Wcard3[9] +
                    `</span></td>
                </tr>
                <tr>
                    <td colspan=2>` +
                        p3cardinfoarray.Wcard3[10] +
                    `</td>
                </tr>
            </table>`;

            $(".newinfo").html(newinfostr);
            $(".choosenew").on("click", function () {
                p3cardinfostr += `
                    <div class="cardname">` +
                        p3cardinfoarray.Wcard3[0] +
                    `</div>
                    <div class="value">卡片屬性</div>
                    <table class="valuetable">
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard3[1] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard3[2] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard3[3] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard3[4] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard3[5] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard3[6] +
                            `</td>
                        </tr>
                        <tr>
                            <td>` +
                                p3cardinfoarray.Wcard3[7] +
                            `</td>
                            <td>` +
                                p3cardinfoarray.Wcard3[8] +
                            `</td>
                        </tr>
                    </table>
                    <div class="skill">羈絆技能</div>
                    <table class="skilltable">
                        <tr>
                            <td colspan=2><span>` +
                                p3cardinfoarray.Wcard3[9] +
                            `</span></td>
                        </tr>
                        <tr>
                            <td colspan=2>` +
                                p3cardinfoarray.Wcard3[10] +
                            `</td>
                        </tr>
                    </table>`;

                $(".nowcard").html(
                    `<img src="/img/event/prereg/p3/white/card3_L.png">`
                );
                $(".cardinfo").html(p3cardinfostr);
                $(".result_now").html(
                    `<img src="/img/event/prereg/p3/white/card3_S.png">`
                );
                $(".nowinfo").html(newinfostr);
            });
        }
    }

    $(".samplerules").hide();
    $(".cardinfo").show();
    $(".keepnow").on("click", function () {
        $(".p3resultpop").fadeOut(200);
    });
}

$(".popStitle").html("是否要選擇這位名士取代原先保留的名士?");
$(".popSText")
    .html(
        "※請注意，本次選擇將會放棄原先保留之獎勵，是否要以這位名士取代原本結果?​"
    )
    .css({
        fontSize: "1.3rem",
    });
if (screen.width <= 425) {
    $(".popSText").css({
        fontSize: "1rem",
    });
}
$(".popScheckBtn").html("確認");

//p3"結交名士"任務佈告
function p3missionIn() {
    $(".p3missionpop").fadeIn(200);
}

//若任務完成時
// $('.missionbtn').css({
//     background: 'url(/img/event/prereg/p3/seal.png) no-repeat center'
// });

//p4"熊貓賽跑"活動說明
function p4informationIn() {
    var p4informationarray = [
        "活動時間：2023/08/31 12:00 (四)  ~上市後一週",
        "活動期間內，<span>將於每日00:00開啟一輪新的賽事，每日登入活動頁面都可以遊玩一次熊貓賽跑。</span>",
        "進行熊貓賽跑時，將從熊貓酒仙、熊貓少林、熊貓船長三隻熊貓中選出一隻心儀的熊貓，若預測成功則可累計一次猜對次數，累計猜對達指定次數，可獲得對應獎勵。",
        "預測失敗也不用灰心，每日參與熊貓賽跑競猜活動，不論是否預測成功皆可累計競猜次數，累計參與活動達指定次數，可獲得對應獎勵。",
    ];

    var p4information = "";

    for (j = 0; j < 4; j++) {
        p4information += "<li>" + p4informationarray[j] + "</li>";
    }

    $(".poptitle").html("活動說明");
    $(".popTable").hide();
    $(".popText").show().html(p4information);
}

//p4"熊貓賽跑"注意事項
function p4noticeIn() {
    var p4noticearray = [
        "此活動需完成事前預約活動才可參加。",
        "熊貓賽跑活動將於每日00:00開啟一輪新的賽事，每日登入活動頁面僅可遊玩一次熊貓賽跑 。",
        "本活動所提供之虛寶獎勵，皆為不可交易之性質，實際道具限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。",
        "若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。",
        "本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌：人為操作、蓄意偽造、多開(重)帳號、短時間異常多筆參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正常的方式意圖進行不實或虛偽活動參與行為，參加者因上述情形所獲得之活動資格及獎項，本公司得一概取消之。",
        "本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。",
    ];

    var p4noticestr = "";

    for (j = 0; j < 6; j++) {
        p4noticestr += "<li>" + p4noticearray[j] + "</li>";
    }

    $(".poptitle").html("注意事項");
    $(".popTable").hide();
    $(".popText").show().html(p4noticestr);
}

//p4"熊貓賽跑"獎勵列表
function p4awardIn() {
    var p4award1array = {
        times: ["猜對次數", "1", "3", "5", "7", "10"],
        award: [
            "獎勵",
            "玄獸技能升級寶典x10",
            "根骨丹x10",
            "隨機熊貓元靈x1",
            "強骨丹x10",
            "隨機熊貓元靈x1",
        ],
        info: [
            "獎勵說明",
            "玄獸技能升級消耗的道具",
            "用以強化玄獸/仙尊/仙童根骨等級，最高提升至10",
            "獲得琉璃竹後，可至遊戲中跟NPC馴靈小仙兌換",
            "用以強化玄獸/仙尊/仙童根骨等級，從10開始最高可提升至16",
            "獲得琉璃竹後，可至遊戲中跟NPC馴靈小仙兌換",
        ],
    };
    var p4award2array = {
        times: ["競猜次數", "5", "10", "15", "20", "30"],
        award: [
            "獎勵數量",
            "三級體質玄石",
            "三級防禦玄石",
            "新手玄獸經驗丹",
            "濺射",
            "靈界精魄*200",
        ],
        info: [
            "獎勵說明",
            "鑲嵌效果：體質+90，可鑲嵌至玄獸護甲、腰帶、護腿、護足上，三個三級體質玄石可以合成一個四級體質玄石",
            "鑲嵌效果：耐力+90 精神+90，可鑲嵌至玄獸護甲、腰帶、護腿、護足上，三個三級防禦玄石可以合成一個四級防禦玄石",
            "使用後可增加玄獸經驗值",
            "玄獸技能書，可以讓玄獸學會技能濺射，以特殊身法攻擊目標及其周圍半徑16米內最多8個敵人，造成50%的特攻傷害，如果目標是怪物，造成的傷害提高400%",
            "用於兌換玄獸裝備",
        ],
    };

    var p4award1str = "",
        p4award2str = "";

    for (j = 0; j < 6; j++) {
        if(j == 0){
            p4award1str +=
                '<tr><td style="width: 10%;background-color:#d9ebff;">' +
                p4award1array.times[j] +
                '</td><td style="width: 30%;background-color:#d9ebff;">' +
                p4award1array.award[j] +
                '</td><td style="width:60%;background-color:#d9ebff;">' +
                p4award1array.info[j] +
                '</td></tr>';
        }else{
            p4award1str +=
                '<tr><td style="width: 10%;">' +
                p4award1array.times[j] +
                '</td><td style="width: 30%;">' +
                p4award1array.award[j] +
                '</td><td style="width:60%;">' +
                p4award1array.info[j] +
                '</td></tr>';
        }
    }

    for (j = 0; j < 6; j++) {
        if(j == 0){
            p4award2str +=
                '<tr><td style="width: 10%;background-color:#d9ebff;">' +
                p4award2array.times[j] +
                '</td><td style="width: 30%;background-color:#d9ebff;">' +
                p4award2array.award[j] +
                '</td><td style="width:60%;background-color:#d9ebff;">' +
                p4award2array.info[j] +
                '</td></tr>';
        }else{
            p4award2str +=
                '<tr><td style="width: 10%;">' +
                p4award2array.times[j] +
                '</td><td style="width: 30%;">' +
                p4award2array.award[j] +
                '</td><td style="width:60%;">' +
                p4award2array.info[j] +
                '</td></tr>';
        }
    }

    $(".poptitle").html("獎勵列表");
    $(".popTable")
        .show()
        .html(
            `<table class="othertable"><tr><td colspan=3 style="font-weight: bold;background-color: #627eac;color: #FFF;">累計猜對獎勵</td></tr>` +
                p4award1str +
                `</table><p style="text-align: center;">備註:每隻熊貓勝出的機率均為33%</p>` +
                `<table class="othertable"><tr><td colspan=3 style="font-weight: bold;background-color: #627eac;color: #FFF;">累計猜對獎勵</td></tr>` +
                p4award2str +
                `</table>`
        );
    $(".popText").hide();
}

//p4"熊貓賽跑"結果
function p4pandaresult(i){
    //i是隨機數字，用於隨機選獲勝熊貓的影片
    if(i == 1){
        $(".pandavideo").html(`<source src="/img/event/prereg/p4/panda1win.mp4">`)
        $(".p4resultpop").fadeIn(200);
        $('.popS').delay(7500).fadeIn(200);
        p4_panda1_win();
    }else if(i == 2){
        $(".pandavideo").html(`<source src="/img/event/prereg/p4/panda2win.mp4">`)
        $(".p4resultpop").fadeIn(200);
        $('.popS').delay(7500).fadeIn(200);
        p4_panda2_win();
    }else if(i == 3){
        $(".pandavideo").html(`<source src="/img/event/prereg/p4/panda3win.mp4">`)
        $(".p4resultpop").fadeIn(200);
        $('.popS').delay(7500).fadeIn(200);
        p4_panda3_win();
    }
    $('.popScheckBtn').on("click",function(){
        $('.p4resultpop').fadeOut(200);
    })
}

//p4"熊貓賽跑"獲勝彈窗-熊貓船長
function p4_panda1_win() {
    $(".popStitle").html("");
    $(".popSText").html("本次獲勝的是熊貓船長").css({
        fontSize: "1.8rem",
    });
    if (screen.width <= 820) {
        $(".popSText").css({
            fontSize: "1.6rem",
        });
    }
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1.2rem",
        });
    }
    $(".popScheckBtn").html("確認");
}
//p4"熊貓賽跑"獲勝彈窗-熊貓酒仙
function p4_panda2_win() {
    $(".popStitle").html("");
    $(".popSText").html("本次獲勝的是熊貓酒仙").css({
        fontSize: "1.8rem",
    });
    if (screen.width <= 820) {
        $(".popSText").css({
            fontSize: "1.6rem",
        });
    }
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1.2rem",
        });
    }
    $(".popScheckBtn").html("確認");
}
//p4"熊貓賽跑"獲勝彈窗-熊貓少林
function p4_panda3_win() {
    $(".popStitle").html("");
    $(".popSText").html("本次獲勝的是熊貓少林").css({
        fontSize: "1.8rem",
    });
    if (screen.width <= 820) {
        $(".popSText").css({
            fontSize: "1.6rem",
        });
    }
    if (screen.width <= 425) {
        $(".popSText").css({
            fontSize: "1.2rem",
        });
    }
    $(".popScheckBtn").html("確認");
}

//p6職業介紹資料
var p6textarray = {
    arm: ["劍", "重<br>劍", "琴", "弓", "雙<br>斧"],
    text1: [
        "神脈正統，天器傳人，善借五行之力，幻化出無形劍式，配合靈動的身法，給予敵人致命打擊。",
        "嫉惡如仇，心存大是非。視軍令如山，在戰場上抵禦千軍，斬妖除魔。配合無所畏懼的決心，對敵人造成心靈與肉體的雙重傷害。",
        "悲天憫人者，以普渡蒼生為己念。善使琴音震撼軍心，精用仙法救死扶傷。通過各種輔助能力，助戰友立於不敗之地。",
        "善觀星卜卦，奇門遁甲。常肩負長弓行走世間，以三尺玄羽懲惡揚善。在戰場上無論是拒敵還是追殺，都有著絕對的掌控權。",
        "天生具有皇者霸氣，是與生俱來的強者。每次逢敵都是以命養戰，鬼神賤之都要避讓。一但開戰，必定至死方休。",
    ],
    text2: [
        "遠程法系輸出，可以控制大量敵人，並給予傷害，但是血防較為薄弱，容易被擊火擊殺。",
        "近戰物理職業，當之無愧的坦克職業，擁有強大的防禦力和生存能力，是團隊中不可缺少的存在。",
        "治癒+控制系職業，不僅可以實現輸出的作用，也可以扮演團隊治療的角色。",
        "遠程物理輸出。靈巧的身形可以躲避近戰的攻擊，遠距離的射程可以將敵人逐一擊殺。",
        "近戰物理職業，擁有卓越的絕地反殺能力，是戰場上不可多得的戰鬥主力。",
    ],
};

function p6roles(x) {
    $(".p6feature1 .p6text").html(p6textarray.text1[x - 1]);
    $(".p6feature2 .p6text").html(p6textarray.text2[x - 1]);
    if (x == 1) {
        role1(x);
        role2(x);
        role3(x);
        role4(x);
        role5(x);
    } else if (x == 2) {
        role1(x);
        role2(x);
        role3(x);
        role4(x);
        role5(x);
    } else if (x == 3) {
        role1(x);
        role2(x);
        role3(x);
        role4(x);
        role5(x);
    } else if (x == 4) {
        role1(x);
        role2(x);
        role3(x);
        role4(x);
        role5(x);
    } else if (x == 5) {
        role1(x);
        role2(x);
        role3(x);
        role4(x);
        role5(x);
    }
}

function role1(c) {
    if (c == 1) {
        $(".arm").fadeOut(200);
        $(".human1").animate(
            {
                left: "105.6px",
                opacity: "1",
            },
            300
        );
        $(".name1").animate(
            {
                left: "316.8px",
                opacity: "1",
            },
            300
        );
        setTimeout(function () {
            $(".arm").css({
                top: "363.375px",
                left: "176.64px",
            });
            $(".arm").html(p6textarray.arm[c - 1]);
        }, 200);
        $(".arm").fadeIn(500);
    } else {
        $(".human1").animate(
            {
                left: "205.6px",
                opacity: "0",
            },
            300
        );
        $(".name1").animate(
            {
                left: "216.8px",
                opacity: "0",
            },
            300
        );
    }
}
function role2(c) {
    if (c == 2) {
        $(".arm").fadeOut(200);
        $(".human2").animate(
            {
                left: "86.4px",
                opacity: "1",
            },
            300
        );
        $(".name2").animate(
            {
                left: "340.8px",
                opacity: "1",
            },
            300
        );
        setTimeout(function () {
            $(".arm").css({
                top: "232.56px",
                left: "192px",
            });
            $(".arm").html(p6textarray.arm[c - 1]);
        }, 200);
        $(".arm").fadeIn(500);
    } else {
        $(".human2").animate(
            {
                left: "186.4px",
                opacity: "0",
            },
            300
        );
        $(".name2").animate(
            {
                left: "240.8px",
                opacity: "0",
            },
            300
        );
    }
}
function role3(c) {
    if (c == 3) {
        $(".arm").fadeOut(200);
        $(".human3").animate(
            {
                left: "259.2px",
                opacity: "1",
            },
            300
        );
        $(".name3").animate(
            {
                left: "19.2px",
                opacity: "1",
            },
            300
        );
        setTimeout(function () {
            $(".arm").css({
                top: "244.2px",
                left: "174.7px",
            });
            $(".arm").html(p6textarray.arm[c - 1]);
        }, 200);
        $(".arm").fadeIn(500);
    } else {
        $(".human3").animate(
            {
                left: "359.2px",
                opacity: "0",
            },
            300
        );
        $(".name3").animate(
            {
                left: "-80.8px",
                opacity: "0",
            },
            300
        );
    }
}
function role4(c) {
    if (c == 4) {
        $(".arm").fadeOut(200);
        $(".human4").animate(
            {
                left: "106px",
                opacity: "1",
            },
            300
        );
        $(".name4").animate(
            {
                left: "326px",
                opacity: "1",
            },
            300
        );
        setTimeout(function () {
            $(".arm").css({
                top: "305.235px",
                left: "453.1px",
            });
            $(".arm").html(p6textarray.arm[c - 1]);
        }, 200);
        $(".arm").fadeIn(500);
    } else {
        $(".human4").animate(
            {
                left: "206px",
                opacity: "0",
            },
            300
        );
        $(".name4").animate(
            {
                left: "226px",
                opacity: "0",
            },
            300
        );
    }
}
function role5(c) {
    if (c == 5) {
        $(".arm").fadeOut(200);
        $(".human5").animate(
            {
                left: "76.8px",
                opacity: "1",
            },
            300
        );
        $(".name5").animate(
            {
                left: "-67.2px",
                opacity: "1",
            },
            300
        );
        setTimeout(function () {
            $(".arm").css({
                top: "226.7px",
                left: "347.5px",
            });
            $(".arm").html(p6textarray.arm[c - 1]);
        }, 200);
        $(".arm").fadeIn(500);
    } else {
        $(".human5").animate(
            {
                left: "176.8px",
                opacity: "0",
            },
            300
        );
        $(".name5").animate(
            {
                left: "-32.8px",
                opacity: "0",
            },
            300
        );
    }
}

//p7"活動規則"注意事項
var p7rulesarray = [
    "活動時間：即日起至《仙俠世界貳》上市後一週15:00截止。",
    "本活動所提供之虛寶獎勵，皆為不可交易之性質，實際道具限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。",
    "各項活動獎勵需於遊戲正式開服後，於官網內的「領獎專區」進行領取，獎勵才會發送至對應角色信箱內。",
    "各項活動參加、得獎資格與獎項不得轉讓或贈與第三人。",
    "若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。",
    "本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌：人為操作、蓄意偽造、多開(重)帳號、短時間異常多筆參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正常的方式意圖進行不實或虛偽活動參與行為，參加者因上述情形所獲得之活動資格及獎項，本公司得一概取消之。",
    "本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。",
];

var p7rulesstr = "";

for (j = 0; j < 7; j++) {
    p7rulesstr += "<li>" + p7rulesarray[j] + "</li>";
}

$(".p7rules").html(p7rulesstr);

$(".digeamlogo").html(`<a href="https://www.digeam.com/index" target="blank"></a>`)
