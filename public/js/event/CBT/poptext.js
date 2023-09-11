//未登入
function login_txt(){
    $('.login_popS').fadeIn(200)
    $('body').css({
        "overflow":"hidden"
    });
    // $('.login_checkbtn').on("click",function(){
    //     window.open('https://www.digeam.com/login');
    //     location.reload();
    // })
}

//禮包
function gift_299_buy(){
    $('.popS').fadeIn(200)
    $('.popStext').html('是否花費<span>299</span>點數購買靈氣初現禮包?')
    $('.doublebtns').show()
    $('.checkbtn_1').hide()
    $('body').css({
        "overflow":"hidden"
    });
}

function gift_999_buy(){
    $('.popS').fadeIn(200)
    $('.popStext').html('是否花費<span>999</span>點數購買仙獸羈絆禮包?')
    $('.doublebtns').show()
    $('.checkbtn_1').hide()
    $('body').css({
        "overflow":"hidden"
    });
}

function gift_2690_buy(){
    $('.popS').fadeIn(200)
    $('.popStext').html('是否花費<span>2690</span>點數購買修真之寶禮包?')
    $('.doublebtns').show()
    $('.checkbtn_1').hide()
    $('body').css({
        "overflow":"hidden"
    });
}

function point_not_enough(){
    $('.popS').fadeIn(200)
    $('.popStext').html('點數不足，是否前往儲值?')
    $('.doublebtns').show()
    $('.checkbtn_1').hide()
    $('.checkbtn_2').on("click",function(){
        window.open('//www.digeam.com/member/billing');
    })
    $('body').css({
        "overflow":"hidden"
    });
}

function gift_already_buy(){
    $('.popS').fadeIn(200)
    $('.popStext').html('該禮包已購買')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

//登仙
function already_play(){
    $('.popS').fadeIn(200)
    $('.popStext').html('本日已注入過內力，<br/>請於明天再進行內力注入。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

function level_1(){
    $('.popS').fadeIn(200)
    $('.popStext').html('達成<span>煉氣</span>境界，​已獲得以下獎勵。​<br/>寶珠x10000<br/>寶石兌換卷x5。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

function level_2(){
    $('.popS').fadeIn(200)
    $('.popStext').html('達成<span>築基</span>境界，​已獲得以下獎勵。​<br/>寶珠x10000<br/>寶石兌換卷x5。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

function level_3(){
    $('.popS').fadeIn(200)
    $('.popStext').html('達成<span>結丹</span>境界，​已獲得以下獎勵。​<br/>寶珠x20000<br/>寶石兌換卷x10。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

function level_4(){
    $('.popS').fadeIn(200)
    $('.popStext').html('達成<span>元嬰</span>境界，​已獲得以下獎勵。​<br/>寶珠x20000<br/>寶石兌換卷x10。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

function level_5(){
    $('.popS').fadeIn(200)
    $('.popStext').html('達成<span>化神</span>境界，​已獲得以下獎勵。​<br/>寶珠x50000<br/>寶石兌換卷x20。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

function level_6(){
    $('.popS').fadeIn(200)
    $('.popStext').html('達成<span>登仙</span>境界，​已獲得以下獎勵。​<br/>iPhone 14 Pro Max<br/>抽獎資格。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

function level_max(){
    $('.popS').fadeIn(200)
    $('.popStext').html('已經達成<span>登仙</span>境界，<br/>無須再進行內力注入。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

//問題回報
function no_type(){
    $('.popS').fadeIn(200)
    $('.popStext').html('請選擇問題分類後​，再進行回報。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
}

function no_text(){
    $('.popS').fadeIn(200)
    $('.popStext').html('請輸入問題描述後​，再進行回報。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
}

function img_mis(){
    $('.popS').fadeIn(200)
    $('.popStext').html('請上傳正確的圖片格式，再進行回報。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
}

function img_size(){
    $('.popS').fadeIn(200)
    $('.popStext').html('圖片大小超過2MB。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
}

function report_success(){
    $('.popS').fadeIn(200)
    $('.popStext').html('已送出回報​，感謝您參與遊仙緝蠱活動')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}

//活動結束
function end(){
    $('.popS').fadeIn(200)
    $('.popStext').html('活動已截止!<br/>感謝您的支持!<br/>前往官網了解更多最新活動情報。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('.checkbtn_1').on("click",function(){
        $(window).attr('location','//www.xx2.digeam.com');
    })
    $('body').css({
        "overflow":"hidden"
    });
}

//發生不明錯誤
function error(){
    $('.popS').fadeIn(200)
    $('.popStext').html('發生錯誤，請稍後再試。')
    $('.doublebtns').hide()
    $('.checkbtn_1').show()
    $('body').css({
        "overflow":"hidden"
    });
    $('.checkbtn_1').on("click",function(){
        location.reload();
    })
}


// 大彈窗內容
// p3禮包內容
function p3_gifts_pop(){
    $('.popL_ti').html('禮包介紹')
    $('.popL_info').html(`
        <img class="popL_subti_img" src="/img/event/CBT/p3/subti_2690.png">
        <img class="popL_img" src="/img/event/CBT/p3/table2690.png">
        <img class="popL_subti_img" src="/img/event/CBT/p3/subti_999.png">
        <img class="popL_img" src="/img/event/CBT/p3/table999.png">
        <img class="popL_subti_img" src="/img/event/CBT/p3/subti_299.png">
        <img class="popL_img" src="/img/event/CBT/p3/table299.png">
    `)
}

// p3活動說明
function p3_event_pop(){
    $('.popL_ti').html('活動說明')
    $('.popL_info').html(`
        <img class="popL_subti_img" src="/img/event/CBT/popL/subti_event.png">
        <ul class="popL_ul">
            <li>活動時間：即日起~《仙俠世界貳》上市後一週。</li>
            <li>活動期間內，由此頁面可預購期間限定​強力支援禮包，禮包將於《仙俠世界貳》上市後時發送。​</li>
            <li>禮包後買後可獲得禮包內全數商品。</li>
            <li>禮包內含限定時裝，​僅限封測期間販售，錯過不再！​</li>
            <li>每個禮包在活動期間內每個帳號限購一次。</li>
        </ul>
        <img class="popL_subti_img" src="/img/event/CBT/popL/subti_notice.png">
        <ul class="popL_ul">
            <li>每個帳號於活動期間內每個禮包限購一次。</li>
            <li>購買禮包後，將可以於活動結束後至「領獎專區」領取已購買的商品。</li>
            <li>本活動所提供之虛寶獎勵，皆為不可交易之性質，實際道具限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。</li>
            <li>本活動參加、得獎資格與獎項不得轉讓或贈與第三人。</li>
            <li>本活動之獎勵將無法折換現金或其他等值商品。</li>
            <li>本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌例：人為操作、惡意灌票、蓄意偽造、多開（重）帳號、短時間異常多筆參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正當的方式意圖以進行不實或虛偽活動參與行為，參賽者因上述情形所獲得之活動資格及獎項，本公司得一概取消之，其帳號亦將停權處份。</li>
            <li>玩家參與本活動之同時，即同意接受本活動辦法與注意事項之規範，如不同意或有違反，將視為取消參加資格 ，或本公司得取消其使用資格，如因此有致生損害於本公司或其他任何第三人，本公司得向參加者請求損害賠償，參加者應負一切相關責任。</li>
            <li>掘夢網保留變更、取消或終止本活動的權利，包括但不限於本活動條款及活動辦法。</li>
        </ul>
    `)
}



// p4境界獎勵內容
function p4_award_pop(){
    $('.popL_ti').html('境界獎勵')
    $('.popL_info').html(`<img class="popL_img" src="/img/event/CBT/p4/awardTable.png">`)
}

// p4活動說明
function p4_event_pop(){
    $('.popL_ti').html('活動說明')
    $('.popL_info').html(`
        <img class="popL_subti_img" src="/img/event/CBT/popL/subti_event.png">
        <ul class="popL_ul">
            <li>活動時間：即日起~《仙俠世界貳》上市後一週。</li>
            <li>每天可進行一次內力注入，成功注入內力後即完成當日修行。注入內力次數會於每日00:00重置。</li>
            <li>達成指定注入內力次數可以提升境界，並獲得該境界對應獎勵，最多可注入15次。</li>
            <li>活動期間內注入內力達15次可獲得iPhone14 Pro Max抽獎資格。</li>
            <li>iPhone14 Pro Max會於活動結束後7天內進行抽獎，並以郵件方式通知得獎人。</li>
        </ul>
        <img class="popL_subti_img" src="/img/event/CBT/popL/subti_notice.png">
        <ul class="popL_ul">
            <li>帳號注入內力次數次數將於每日00:00進行重置。未使用的次數不會累積到隔日。</li>
            <li>活動期間，只要提升境界，將可以於活動結束後至""領獎專區""領取對應境界的獎勵。</li>
            <li>本活動所提供之虛寶獎勵，皆為不可交易之性質，實際道具限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。</li>
            <li>本活動所提供之實體獎勵會使用Mail的方式直接通知得獎人，將不另行公布得獎名單。</li>
            <li>本活動參加、得獎資格與獎項不得轉讓或贈與第三人。</li>
            <li>本活動實體獎勵之得獎人，需在收到郵件後30日內完成填寫寄送資料與機會中獎憑證文件並寄回客服信箱，逾期視同放棄獎勵。</li>
            <li>依國稅局規定，機會中獎商品價值超過新台幣2萬元(含)，中獎者需自行繳納10%機會中獎稅(非中華民國境內居住之個人，依法扣繳20%稅金)，機會中獎商品獎項價值如超過$1,000以上者，依法需納入年度個人綜合所得總額進行申報，扣繳憑單將由主辦單位寄發予得獎者，請務必據實申報。</li>
            <li>承上，故中獎者需提供並填寫中獎者資料，繳交身分證正反面影本。如中獎者不同意繳交稅款，或不填寫提供相關資料、證件影本者，視為自動放棄商品，中獎者不得異議。</li>
            <li>本活動之獎勵將無法折換現金或其他等值商品。</li>
            <li>本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌例：人為操作、惡意灌票、蓄意偽造、多開（重）帳號、短時間異常多筆參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正當的方式意圖以進行不實或虛偽活動參與行為，參賽者因上述情形所獲得之活動資格及獎項，本公司得一概取消之，其帳號亦將停權處份。</li>
            <li>玩家參與本活動之同時，即同意接受本活動辦法與注意事項之規範，如不同意或有違反，將視為取消參加資格 ，或本公司得取消其使用資格，如因此有致生損害於本公司或其他任何第三人，本公司得向參加者請求損害賠償，參加者應負一切相關責任。</li>
            <li>掘夢網保留變更、取消或終止本活動的權利，包括但不限於本活動條款及活動辦法。</li>
        </ul>
    `)
}	



// p5獎勵內容
function p5_award_pop(){
    $('.popL_ti').html('獎勵說明')
    $('.popL_info').html(`<img class="popL_img" src="/img/event/CBT/p5/awardTable.png">`)
}

// p5活動說明
function p5_event_pop(){
    $('.popL_ti').html('活動說明')
    $('.popL_info').html(`
        <img class="popL_subti_img" src="/img/event/CBT/popL/subti_event.png">
        <ul class="popL_ul">
            <li>活動時間：即日起~《仙俠世界貳》封測結束</li>
            <li>封測活動期間內，可以於此頁面回報遊戲內關於文字、 說明、系統等BUG。確認BUG屬實後，可以於《仙俠世界貳》上市後獲得對應獎勵。</li>
            <li>不同程度的BUG可獲得的獎勵也不同，最高可於活動內獲得5000元寶。</li>
        </ul>
        <img class="popL_subti_img" src="/img/event/CBT/popL/subti_notice.png">
        <ul class="popL_ul">
            <li>活動時間：即日起~《仙俠世界貳》封測結束</li>
            <li>系統BUG或是同類型BUG回報僅限第一位回報成功玩家可以獲得獎勵，且無法重複獲獎。</li>
            <li>活動期間內，只要確認回報屬實，並且為第一位發現者，將可以於活動結束後至"領獎專區"領取對應的獎勵。</li>
            <li>回報圖片上傳時，僅接受「JPG、JPEG、PNG」格式，並需於2MB以內。如有相關影片可以提供，可將該影片上傳至Youtube平台，影片權限設置不公開，並於問題描述中提供影片連結回報即可。</li>
            <li>本活動所提供之虛寶獎勵，皆為不可交易之性質，實際道具限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。</li>
            <li>本活動參加、得獎資格與獎項不得轉讓或贈與第三人。</li>
            <li>本活動之獎勵將無法折換現金或其他等值商品。</li>
            <li>本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌例：人為操作、惡意灌票、蓄意偽造、多開（重）帳號、短時間異常多筆參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正當的方式意圖以進行不實或虛偽活動參與行為，參賽者因上述情形所獲得之活動資格及獎項，本公司得一概取消之，其帳號亦將停權處份。</li>
            <li>玩家參與本活動之同時，即同意接受本活動辦法與注意事項之規範，如不同意或有違反，將視為取消參加資格 ，或本公司得取消其使用資格，如因此有致生損害於本公司或其他任何第三人，本公司得向參加者請求損害賠償，參加者應負一切相關責任。</li>
            <li>掘夢網保留變更、取消或終止本活動的權利，包括但不限於本活動條款及活動辦法。</li>
        </ul>
    `)
}

