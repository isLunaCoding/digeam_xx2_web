let notice = {
    title: `<div class="pop_title">注意事項</div>`,
    no1: `<div class="no_content">
    <ul>
        <li>1.活動期間內，達成等級條件的玩家於每日指定時間在遊戲中遊玩即可獲得用於鑲嵌於裝備上的寶石道具。</li>
        <li>2.活動期間內，會於每日指定時間發送獎勵給符合資格的玩家。</li>
        <li>3.活動獎項可能有交易、販售、使用次數或使用時間等限制，實際道具限制依遊戲內為準。</li>
        <li>4.若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。</li>
        <li>5.本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。</li>
    </ul>
    </div>`,
    no2: `<div class="no_content">
    <ul>
        <li>1.活動期間內，達成等級條件的玩家於每日指定時間在遊戲中遊玩即可獲得用於鑲嵌於裝備上的寶石道具。</li>
        <li>2.活動期間內，會於每日指定時間發送獎勵給符合資格的玩家。</li>
        <li>3.活動獎項可能有交易、販售、使用次數或使用時間等限制，實際道具限制依遊戲內為準。</li>
        <li>4.若因觸犯遊戲規章遭受凍結處分、個人線路不穩、個人操作不慎等，導致斷線、連線失敗等問題影響活動參與，活動將照常舉行，不另做補償。</li>
        <li>5.活動參加、得獎資格與獎項，不得轉讓或贈與第三人、轉移至其他帳號。</li>
        <li>6.本活動各項辦法及規定，以活動網站公告及本公司官方最新說明為準。掘夢網股份有限公司擁有活動最終保留、變更、修正或撤回、取消獎項發送之權利，若因不可抗力之因素，本活動將有權隨時補充或修正，並以最新公告為主。</li>
    </ul>
    </div>`,
    no3: `<div class="no_content">
    <ul>
        <li>1.本次販售禮包為機會中獎商品，消費者購買或參與活動不代表即可獲得特定商品。</li>
        <li>2.購買獲得之道具，均以遊戲內實際設定為準。</li>
        <li>3.購買如有問題，請至掘夢網官網>客服中心>線上回報單進行回報。</li>
        <li>4.各活動獎項可能有交易、販售、使用次數或使用時間等限制，實際道具限制依遊戲內為準。</li>
        <li>5.活動參加、得獎資格與獎項，不得轉讓或贈與第三人、轉移至其他帳號。</li>
        <li>6.本活動各項辦法及規定，以官方說明為準，掘夢網公司擁有活動最終保留、變更、修改或撤回、取消獎項發送之權利。</li>
    </ul>
    </div>`,
};

let props = {
    title: `<div class="pop_title">道具說明</div>`,
    pro1: `<div class="pro_content">
    <img src="../../../img/event/20231116/s3/s3List1.png" alt="">
    </div>`,
    pro3: `<div class="pro_content">
    <ul>
        <li class="tab1" data-tab="tab1-1">情比金堅背飾包</li>
        <li class="tab1" data-tab="tab1-2">翼破蒼穹背飾包</li>
        <li class="tab1" data-tab="tab1-3">天龍降世包</li>
    </ul>
    <div class="tab_content1" data-tab="tab1-1">
        <img src="../../../img/event/20231116/s3/s3List2.png" alt="">
    </div>
    <div class="tab_content1" data-tab="tab1-2">
        <img src="../../../img/event/20231116/s3/s3List3.png" alt="">
    </div>
    <div class="tab_content1" data-tab="tab1-3">
        <img src="../../../img/event/20231116/s3/s3List4.png" alt="">
    </div>
    </div>`,
};

let cases = {
    title: `<div class="pop_title">時裝展示</div>`,
    case1: `<div class="case_content">
    <img src="../../../img/event/20231116/s3/s3ch1.png" alt="">
    </div>`,
    case2: `<div class="case_content">
    <img src="../../../img/event/20231116/s3/s3ch2.png" alt="">
    </div>`,
    case3: `<div class="case_content" id="c3">
    <img src="../../../img/event/20231116/s3/s3ch3.png" alt="">
    <img src="../../../img/event/20231116/s3/s3ch4.png" alt="">
    </div>`,
};

let close = `  <div class="pop_close" onclick="cancel();">
<div class="one"></div>
<div class="three"></div>
</div>`;
