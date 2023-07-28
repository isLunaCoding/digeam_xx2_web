//p2"初出江湖"活動說明
function p2informationIn(){
    var p2informationarray = [
        '活動時間：2023/8/3 12:00 (四) ~ 上市後一週。',
        '註冊並登入DiGeam掘夢網平台帳號。',
        '填寫手機號碼，並同意接收遊戲相關簡訊。',
        '點擊「初出江湖」按鈕，即可完成活動。']

    var p2information = '';

    for(j = 0 ; j < 4 ; j++){
        p2information += '<li>'+p2informationarray[j]+'</li>';
    }

    $('.poptitle').html('活動說明');
    $('.popTable').hide();
    $('.popText').show().html(p2information);
}

//p2"初出江湖"注意事項
function p2noticeIn(){
    var p2noticearray = [
        '每組掘夢網會員帳號僅限參加一次事前預約活動。本活動僅限台港澳地區玩家參與。',
        '請確認您填寫的手機號碼是否正確，每個手機號碼僅可申請一次事前預約活動。',
        '此活動的抽獎為機會中獎獎勵，玩家參與活動不代表即可獲得指定獎勵。',
        '本活動所提供之虛寶獎勵，皆為不可交易之性質，實際到距限制依遊戲內為準。<span>領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。</span>',
        '若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。',
        '本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌：人為操作、蓄意偽造、多開(重)帳號、短時間異常多比參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正常的方式意圖進行不實或虛偽活動參與行為，參加者因上述情形所獲得之活動資格及獎項，本公司得一概取消之。',
        '本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。']

    var p2noticestr = '';

    for(j = 0 ; j < 7 ; j++){
        p2noticestr += '<li>'+p2noticearray[j]+'</li>';
    }

    $('.poptitle').html('注意事項');
    $('.popTable').hide();
    $('.popText').show().html(p2noticestr);
}

//p2"初出江湖"預約成功彈窗
$('.popStitle').html('已完成初出江湖');
$('.popSText').html('由衷地感謝您參與初出江湖活動，前往下一步完成更多任務，將有機會解鎖更多的獎勵。').css({
    fontSize: '1.3rem'
});
if(screen.width <= 425){
    $('.popSText').css({
        fontSize: '1rem'
    });
}
$('.popScheckBtn').html('確認');

//p2"初出江湖"預約失敗彈窗-未登入
// $('.popStitle').html('');
// $('.popSText').html('請先登入掘夢網會員​').css({
//     fontSize: '1.8rem'
// });
// if(screen.width <= 820){
//     $('.popSText').css({
//         fontSize: '1.6rem'
//     });
// }
// if(screen.width <= 425){
//     $('.popSText').css({
//         fontSize: '1.2rem'
//     });
// }
// $('.popScheckBtn').html('確認');

//p2"初出江湖"預約失敗彈窗-手機號碼錯誤
// $('.popStitle').html('請填寫正確的手機號碼​');
// $('.popSText').html('※請檢查是否符合以下限制：<br>台灣玩家的號碼，請為不含特殊符號的半形數字10碼<br>港/澳玩家的號碼，請為不含符號的半形數字8碼​').css({
//     fontSize: '1.3rem'
// });
// if(screen.width <= 425){
//     $('.popSText').css({
//         fontSize: '1rem'
//     });
// }
// $('.popScheckBtn').html('確認');

//p2"初出江湖"預約失敗彈窗-門號已使用
// $('.popStitle').html('');
// $('.popSText').html('此門號已被使用，請重新確認！').css({
//     fontSize: '1.8rem'
// });
// if(screen.width <= 820){
//     $('.popSText').css({
//         fontSize: '1.6rem'
//     });
// }
// if(screen.width <= 425){
//     $('.popSText').css({
//         fontSize: '1.2rem'
//     });
// }
// $('.popScheckBtn').html('確認');

// //p2"初出江湖"預約失敗彈窗-已完成
// $('.popStitle').html('您已經完成初出江湖！​');
// $('.popSText').html('由衷地感謝您參與初出江湖活動，前往下一步完成更多任務，將有機會解鎖更多的獎勵。​').css({
//     fontSize: '1.3rem'
// });
// if(screen.width <= 425){
//     $('.popSText').css({
//         fontSize: '1rem'
//     });
// }
// $('.popScheckBtn').html('確認');

//p2"初出江湖"預約失敗彈窗-未勾選
// $('.popStitle').html('');
// $('.popSText').html('請勾選 我已閱讀且同意<a href="https://www.digeam.com/index"  target="_blank">隱私權政策</a>與活動相關注意事項。​​').css({
//     fontSize: '1.8rem'
// });
// if(screen.width <= 820){
//     $('.popSText').css({
//         fontSize: '1.6rem'
//     });
// }
// if(screen.width <= 425){
//     $('.popSText').css({
//         fontSize: '1.2rem'
//     });
// }
// $('.popScheckBtn').html('確認');

//p2"初出江湖"預約活動結束彈窗
// $('.popStitle').html('活動已截止！​');
// $('.popSText').html('感謝您的支持！前往官網了解更多最新活動情報。​').css({
//     fontSize: '1.3rem'
// });
// if(screen.width <= 425){
//     $('.popSText').css({
//         fontSize: '1rem'
//     });
// }
// $('.popScheckBtn').html('前往官網');

//p3"結交名士"活動說明
function p3informationIn(){
    var p3informationarray = [
        '活動時間：2023/08/03 12:00 (四)  ~上市後一週',
        '活動期間內完成指定任務可獲得對應拜訪次數，部分任務於活動期間內僅可完成一次，可重複完成的任務將於每日00:00重置。',
        '完成任務取得拜訪次數後，點選【拜訪名士】即可進行結交名士。',
        '拜訪名士後，可確認該名士的能力值等相關介紹。',
        '累計拜訪次數達30次，可以從「仙道盟主沈仲陽」、「七花獸百花仙靈」、「愛之紅娘」三位名士中任選一位名士取代原先拜訪的名士，作為當前拜訪名士結果。',
        '可與拜訪的名士進行結義，進行結義後無法再更改結義名士，並可於後續遊戲內獲得選定結義名士的仙俠錄。']

    var p3information = '';

    for(j = 0 ; j < 6 ; j++){
        p3information += '<li>'+p3informationarray[j]+'</li>';
    }

    $('.poptitle').html('活動說明');
    $('.popTable').hide();
    $('.popText').show().html(p3information);
}

//p3"結交名士"注意事項
function p3noticeIn(){
    var p3noticearray = [
        '此活動需完成事前預約活動才可參加。 ',
        '此活動的抽獎為機會中獎獎勵，玩家參與活動不代表即可獲得指定獎勵。',
        '玩家在拜訪名士後，若不選擇保留將視為放棄該次抽取到的名士。',
        '結交名士活動最多只可獲得一次獎勵，且進行結義後即視為最終選定結果，無法再進行保留名士更改。',
        '本活動需要於主畫面點選結義按鈕選定最終獎勵，僅保留拜訪結果不視為完成活動。若因沒有進行結義導致無法取得獎勵，恕不進行補償。',
        '本活動所提供之虛寶獎勵，皆為不可交易之性質，實際到距限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。',
        '若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。',
        '本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌：人為操作、蓄意偽造、多開(重)帳號、短時間異常多比參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正常的方式意圖進行不實或虛偽活動參與行為，參加者因上述情形所獲得之活動資格及獎項，本公司得一概取消之。',
        '本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。']

    var p3noticestr = '';

    for(j = 0 ; j < 9 ; j++){
        p3noticestr += '<li>'+p3noticearray[j]+'</li>';
    }

    $('.poptitle').html('注意事項');
    $('.popTable').hide();
    $('.popText').show().html(p3noticestr);
}

//p3"結交名士"遊戲玩法
var p3samplerulesarray = [
    '完成<span onclick="missionpop()">指定任務</span>，可取得拜訪次數。',
    '點選拜訪名士，取得名士卡片。<span class="listpop">名士一覽</span>',
    '拜訪名士後，將會顯示該名士的能力值等相關介紹。',
    '若抽取的名士不符合需求，可透過完成各項指定任務，取得拜訪次數後重複抽取。',
    '可與拜訪的名士進行結義，進行結義後即為最終結果，不可變更。']

var p3samplerulesstr = '';

for(count = 0 ; count < 5 ; count++){
    p3samplerulesstr += '<li>'+p3samplerulesarray[count]+'</li>';
}

$('.samplerules').html(p3samplerulesstr);

//p3"結交名士"名士一覽
function p3listIn(){
    var p3listarray = {
        name:[
        '七花獸百花仙靈',
        '仙道盟執法長老',
        '仙道盟訓誡長老'],
        others:[
            '仙道盟掌刑長老',
            '仙道盟執法長老',
            '仙道盟訓誡長老',
            '仙道盟傳功長老',
            '天魔計都',
            '天魔影煞',
            '齊天大聖',
            '吞靈獸',
            '愛之月老',
            '愛之禮官',
            '愛之花童',
            '愛之隨從']
    }

    var p3liststr = '';

    for(j = 0 ; j < 12 ; j+=3){
        p3liststr += '<tr><td>'+p3listarray[j]+'</td><td>'+p3listarray[j+1]+'</td><td>'+p3listarray[j+2]+'</td></tr>';
    }

    var p3listtopstr = '';

    for(a = 0 ; a < 3 ; a++ ){
        p3listtopstr += '<table><tr colspan=2><td><img src="/img/event/prereg/p3/cardlist'+a+'.png"></td>'
    }

    $('.poptitle').html('名士一覽');
    $('.popTable').show().html(`
    <table>
        <tr colspan=2> 
            <td>
                <img src="/img/event/prereg/p3/cardlist1.png">
            </td> 
            <td>
                <table>
                    <tr colspan=2>
                        <td>七花獸百花仙靈</td>
                    </tr>
                    <tr colspan=2>
                        <td>卡片屬性</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr colspan=2>
                        <td>羈絆技能</td>
                    </tr>
                    <tr colspan=2>
                        <td>煉獄火海</td>
                    </tr>
                    <tr colspan=2>
                        <td>羈絆技能羈絆技能羈絆技能羈絆技能羈絆技能羈絆技能羈絆技能羈絆技能</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table>
        <tr colspan=2> 
            <td>
                <img src="/img/event/prereg/p3/cardlist1.png">
            </td> 
            <td>
                <table>
                    <tr colspan=2>
                        <td>七花獸百花仙靈</td>
                    </tr>
                    <tr colspan=2>
                        <td>卡片屬性</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr colspan=2>
                        <td>羈絆技能</td>
                    </tr>
                    <tr colspan=2>
                        <td>煉獄火海</td>
                    </tr>
                    <tr colspan=2>
                        <td>羈絆技能羈絆技能羈絆技能羈絆技能羈絆技能羈絆技能羈絆技能羈絆技能</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr colspan=3 ><td>名稱</td></tr>` + p3liststr +
    `</table>`);
    $('.popText').hide();
}

//p3"結交名士"任務佈告
function p3missionIn(){
}

//p4"熊貓賽跑"活動說明
function p4informationIn(){
    var p4informationarray = [
        '活動時間：2023/08/31 12:00 (四)  ~上市後一週',
        '活動期間內，<span>將於每日00:00開啟一輪新的賽事，每日登入活動頁面都可以遊玩一次熊貓賽跑。</span>',
        '進行熊貓賽跑時，將從熊貓酒仙、熊貓少林、熊貓船長三隻熊貓中選出一隻心儀的熊貓，若預測成功則可累計一次猜對次數，累計猜對達指定次數，可獲得對應獎勵。',
        '預測失敗也不用灰心，每日參與熊貓賽跑競猜活動，不論是否預測成功皆可累計競猜次數，累計參與活動達指定次數，可獲得對應獎勵。']

    var p4information = '';

    for(j = 0 ; j < 4 ; j++){
        p4information += '<li>'+p4informationarray[j]+'</li>';
    }  

    $('.poptitle').html('活動說明');
    $('.popTable').hide();
    $('.popText').show().html(p4information);
}

//p4"熊貓賽跑"注意事項
function p4noticeIn(){
    var p4noticearray = [
        '此活動需完成事前預約活動才可參加。',
        '熊貓賽跑活動將於每日00:00開啟一輪新的賽事，每日登入活動頁面僅可遊玩一次熊貓賽跑 。',
        '本活動所提供之虛寶獎勵，皆為不可交易之性質，實際到距限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。',
        '若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。',
        '本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌：人為操作、蓄意偽造、多開(重)帳號、短時間異常多比參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正常的方式意圖進行不實或虛偽活動參與行為，參加者因上述情形所獲得之活動資格及獎項，本公司得一概取消之。',
        '本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。']

    var p4noticestr = '';

    for(j = 0 ; j < 6 ; j++){
        p4noticestr += '<li>'+p4noticearray[j]+'</li>';
    }

    $('.poptitle').html('注意事項');
    $('.popTable').hide();
    $('.popText').show().html(p4noticestr);
}

//p4"熊貓賽跑"獎勵列表
function p4awardIn(){
    var p4awardarray = [
        '此活動需完成事前預約活動才可參加。']

    var p4awardstr = '';

    for(j = 0 ; j < 6 ; j++){
        p4awardstr += '<li>'+p4awardarray[j]+'</li>';
    }

    $('.poptitle').html('獎勵列表');
    $('.popTable').hide();
    $('.popText').show().html(p4awardstr);
}

//p6職業介紹資料
var p6textarray = {
    arm:['劍','重<br>劍','琴','弓','雙<br>斧'],
    text1:[
        '神脈正統，天器傳人，善借五行之力，幻化出無形劍式，配合靈動的身法，給予敵人致命打擊。',
        '嫉惡如仇，心存大是非。視軍令如山，在戰場上抵禦千軍，斬妖除魔。配合無所畏懼的決心，對敵人造成心靈與肉體的雙重傷害。',
        '悲天憫人者，以普渡蒼生為己念。善使琴音震撼軍心，精用仙法救死扶傷。通過各種輔助能力，助戰友立於不敗之地。',
        '善觀星卜卦，奇門遁甲。常肩負長弓行走世間，以三尺玄羽懲惡揚善。在戰場上無論是拒敵還是追殺，都有著絕對的掌控權。',
        '天生具有皇者霸氣，是與生俱來的強者。每次逢敵都是以命養戰，鬼神賤之都要避讓。一但開戰，必定至死方休。'],
    text2:[
        '遠程法系輸出，可以控制大量敵人，並給予傷害，但是血防較為薄弱，容易被擊火擊殺。',
        '近戰物理職業，當之無愧的坦克職業，擁有強大的防禦力和生存能力，是團隊中不可缺少的存在。',
        '治癒+控制系職業，不僅可以實現輸出的作用，也可以扮演團隊治療的角色。',
        '遠程物理輸出。靈巧的身形可以躲避近戰的攻擊，遠距離的射程可以將敵人逐一擊殺。',
        '近戰物理職業，擁有卓越的絕地反殺能力，是戰場上不可多得的戰鬥主力。']
}

function p6roles(x){
    $('.p6feature1 .p6text').html(p6textarray.text1[x-1]);
    $('.p6feature2 .p6text').html(p6textarray.text2[x-1]);
    if(x == 1){
       role1(x);
       role2(x);
       role3(x);
       role4(x);
       role5(x);
    }else if(x == 2){
       role1(x);
       role2(x);
       role3(x);
       role4(x);
       role5(x);
    }else if(x == 3){
       role1(x);
       role2(x);
       role3(x);
       role4(x);
       role5(x);
    }else if(x == 4){
       role1(x);
       role2(x);
       role3(x);
       role4(x);
       role5(x);
    }else if(x == 5){
       role1(x);
       role2(x);
       role3(x);
       role4(x);
       role5(x);
    }
}

function role1(c){
    if(c == 1){
        $('.arm').fadeOut(200);
        $('.human1').animate({
            left:'105.6px',
            opacity: '1'
        },300)
        $('.name1').animate({
            left:'316.8px',
            opacity: '1'
        },300)
        setTimeout(function (){
            $('.arm').css({
                top: '363.375px',
                left: '176.64px'
            });
            $('.arm').html(p6textarray.arm[c-1]);
        },200)
        $('.arm').fadeIn(500);
    }else{
        $('.human1').animate({
            left:'205.6px',
            opacity: '0'
        },300)
        $('.name1').animate({
            left:'216.8px',
            opacity: '0'
        },300)
    }
}
function role2(c){
    if(c == 2){
        $('.arm').fadeOut(200);
        $('.human2').animate({
            left:'86.4px',
            opacity: '1'
        },300)
        $('.name2').animate({
            left:'340.8px',
            opacity: '1'
        },300)
        setTimeout(function (){
            $('.arm').css({
                top: '232.56px',
                left: '192px'
            });
            $('.arm').html(p6textarray.arm[c-1]);
        },200);
        $('.arm').fadeIn(500);
    }else{
        $('.human2').animate({
            left:'186.4px',
            opacity: '0'
        },300)
        $('.name2').animate({
            left:'240.8px',
            opacity: '0'
        },300)
    }
}
function role3(c){
    if(c == 3){
        $('.arm').fadeOut(200);
        $('.human3').animate({
            left:'259.2px',
            opacity: '1'
        },300)
        $('.name3').animate({
            left:'19.2px',
            opacity: '1'
        },300)
        setTimeout(function (){
            $('.arm').css({
                top: '244.2px',
                left: '174.7px'
            })
            $('.arm').html(p6textarray.arm[c-1]);
        },200);
        $('.arm').fadeIn(500);
    }else{
        $('.human3').animate({
            left:'359.2px',
            opacity: '0'
        },300)
        $('.name3').animate({
            left:'-80.8px',
            opacity: '0'
        },300)
    }
}
function role4(c){
    if(c == 4){
        $('.arm').fadeOut(200);
        $('.human4').animate({
            left:'106px',
            opacity: '1'
        },300)
        $('.name4').animate({
            left:'326px',
            opacity: '1'
        },300)
        setTimeout(function (){
            $('.arm').css({
                top: '305.235px',
                left: '453.1px'
            })
            $('.arm').html(p6textarray.arm[c-1]);
        },200);
        $('.arm').fadeIn(500);
    }else{
        $('.human4').animate({
            left:'206px',
            opacity: '0'
        },300)
        $('.name4').animate({
            left:'226px',
            opacity: '0'
        },300)
    }
}
function role5(c){
    if(c == 5){
        $('.arm').fadeOut(200);
        $('.human5').animate({
            left:'76.8px',
            opacity: '1'
        },300)
        $('.name5').animate({
            left:'-67.2px',
            opacity: '1'
        },300)
        setTimeout(function (){
            $('.arm').css({
                top: '226.7px',
                left: '347.5px'
            })
            $('.arm').html(p6textarray.arm[c-1]);
        },200);
        $('.arm').fadeIn(500);
    }else{
        $('.human5').animate({
            left:'176.8px',
            opacity: '0'
        },300)
        $('.name5').animate({
            left:'-32.8px',
            opacity: '0'
        },300)
    }
}



//p7"活動規則"注意事項
var p7rulesarray = [
    '活動時間：即日起至《仙俠世界貳》上市後一週15:00截止。',
    '本活動所提供之虛寶獎勵，皆為不可交易之性質，實際道具限制依遊戲內為準。領出前請務必留意角色ID，一經領取恕不提供轉移道具之服務。',
    '各項活動獎勵需於遊戲正式開服後，於官網內的「領獎專區」進行領取，獎勵才會發送至對應角色信箱內。',
    '各項活動參加、得獎資格與獎項不得轉讓或贈與第三人。',
    '若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。',
    '本公司有權檢視各參加者之活動參與行為及得獎情形是否涉嫌：人為操作、蓄意偽造、多開(重)帳號、短時間異常多比參與行為、透過任何電腦程式參與活動、詐欺、任何違反會員系統服務合約及停權管理規章之情事者，或以任何其他不正常的方式意圖進行不實或虛偽活動參與行為，參加者因上述情形所獲得之活動資格及獎項，本公司得一概取消之。',
    '本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。']

var p7rulesstr = '';

for(j = 0 ; j < 7 ; j++){
    p7rulesstr += '<li>'+p7rulesarray[j]+'</li>';
}

$('.p7rules').html(p7rulesstr);

				
				
				
				
				
				
				
				
				