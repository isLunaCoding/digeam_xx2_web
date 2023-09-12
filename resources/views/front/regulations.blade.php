@extends('front.pageBase')

@section('title')
    <title>《仙俠世界貳》遊戲規章</title>
@endsection



@section('otherCss2')
    <link rel="stylesheet" href="/css/event/homepage/pageRegulations.css">
@endsection



@section('textTitle')
    遊戲規章
@endsection



{{-- 顯示當前位置 --}}
@section('seat')
    <span class="currentLocation">遊戲規章</span>
@endsection


{{-- 內文 --}}
@section('textBox')
    <div class="regulationsTextBox">
        各位親愛的玩家：<br>
        良好的遊戲環境，需在一定的規範下才能構築。<br>
        還請各位玩家們遵守並詳加閱讀以下管理規則，一同努力維持良好的遊戲環境。<br>
        <span class="red">※本遊戲規章可能會因特定服務更新或遊戲改版而有所修正調整，還請定期查閱並確實遵守。</span><br>
        <br>
        <div class="tableBox">
            <h2>《仙俠世界二》遊戲管理規章</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" width="1%">違規事項
                        </th>
                        <th colspan="3" width="2%">懲處辦法(以帳號計算)</th>
                    </tr>
                    <tr>
                        <th width="1%">首次違反</th>
                        <th width="1%">二次違反</th>
                        <th width="1%">三次違反</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>語言辱罵、騷擾、洗頻</td>
                        <td>柔性勸導</td>
                        <td>停權三日</td>
                        <td>停權七日</td>
                    </tr>
                    <tr>
                        <td>使用不當文字、圖片</td>
                        <td colspan="3">帳號停權一日，並請配合改善</td>
                    </tr>
                    <tr>
                        <td>假冒官方之身分 </td>
                        <td colspan="3">終止會員合約</td>
                    </tr>
                    <tr>
                        <td>惡意妨礙他人進行遊戲</td>
                        <td colspan="3">依照個案處理</td>
                    </tr>
                    <tr>
                        <td>使用第三方程式的作弊行為</td>
                        <td colspan="3">終止會員合約</td>
                    </tr>
                    <tr>
                        <td>嘗試修改遊戲程式或資料 </td>
                        <td colspan="3">帳號託管，依照個案通知託管時間</td>
                    </tr>
                    <tr>
                        <td>使用硬體所賦予的作弊行為</td>
                        <td>停權三日</td>
                        <td>停權七日</td>
                        <td>終止會員合約</td>
                    </tr>
                    <tr>
                        <td>涉及現金/帳號交易</td>
                        <td>停權一日</td>
                        <td>停權七日</td>
                        <td>終止會員合約</td>
                    </tr>
                    <tr>
                        <td>會員註冊資料不實</td>
                        <td colspan="3">終止會員合約</td>
                    </tr>
                    <tr>
                        <td>濫用遊戲機制</td>
                        <td colspan="3">依照個案處理，並且所有不當所得回收</td>
                    </tr>
                    <tr>
                        <td>破壞行為</td>
                        <td colspan="3">終止會員合約</td>
                    </tr>
                    <tr>
                        <td>涉及盜用</td>
                        <td colspan="3">終止會員合約</td>
                    </tr>
                    <tr>
                        <td>贓物收取</td>
                        <td colspan="3">帳號託管，依照個案通知託管時間</td>
                    </tr>
                    <tr>
                        <td>帳務款項問題</td>
                        <td colspan="3">帳號託管，依照個案通知託管時間</td>
                    </tr>
                    <tr>
                        <td>公家機關案件</td>
                        <td colspan="3">帳號託管，依照個案通知託管時間</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <span class="red">※請注意※</span><br>
        上述本條例即刻生效，為維護遊戲品質及權益，請一同遵守條例規範。會員如因為違反服務規章，帳號於使用上受到限制而無法登入遊戲，
        限制期間遊戲內期限性道具消耗或使用天數扣減等損失，將不會進行補償。<br>
        <br>
        <div class="tableBox">
            <table class="table">
                <thead>
                    <tr>
                        <th> 言語騷擾、辱罵且情節重大</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft">於遊戲中任何訊息發送頻道涉及洗頻或發送不當內容，且情形或嚴重影響他人的遊戲體驗者。<br>
                            不當內容，包括但不限於下列行為：<br>
                            1. 影射任何猥褻、不法、不雅、色情、有違社會善良風俗、政治意味濃厚、具爭議性、不實謠言。<br>
                            2. 侵害他人智慧財產權的資訊。<br>
                            3. 從事廣告宣傳任何商業行為、組織、網站或非本遊戲相關內容之廣告宣傳。<br>
                            4. 透由任何訊息傳遞功能散佈第三方作弊程式之取得方式，將直接帳號停權7日或終止會員服務。<br>
                            <span class="red">※ 遊戲中所有玩家角色之操作皆屬於遊戲行為，基於虛擬遊戲世界的生態及活動，
                            若玩家彼此之間有任何遊戲糾紛發生，本公司基於中立立場將不過份干涉；
                            請玩家秉持遊戲禮儀及社會道德自行協調解決。
                            但若因情節嚴重影響遊戲正常進行者，本公司保有最後決定處置權，將視情形判斷介入處理。</span></td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 不當使用文字、圖片 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 使用具商業宣傳、惡意針對、強烈違背社會善良風俗，以致他人遊戲體驗不佳的相關文字、圖片<br>
                            例如：不雅或不當角色名稱、公會、寵物名稱…等遊戲中允許玩家發揮創意的要素，將可能依情節遭受規範。</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 假冒官方之身分 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 假冒官方之身分判定，包括但不限於下列行為：<br>
                            1. 自稱遊戲GM、遊戲管理者、或本公司職員、部門成員、開發團隊等等身分者<br>
                            2. 意圖使用接近文字假冒他人或遊戲內NPC、道具名稱，且強烈造成其他玩家混亂的名稱</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 惡意妨礙其他玩家進行遊戲 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 個人行為進而影響到他人進行遊戲，都有可能違反此規章，正常進行打怪、PVP行為則不牽涉在此條例內。</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 使用第三方程式的作弊行為 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 遊戲不允許會員於遊戲運行中執行「任何」未經本公司授權之程式<br>
                            包含但不僅限於『自動練功程式』、『軟/硬體加速器』、『按鍵精靈』、『巨集』、『VM虛擬主機』等軟體；<br>
                            經官方使用之反作弊軟體程式(如：XIGNCODE)偵測、線上查緝人員(如：GM角色)測試、遊戲歷程LOG異常。<br>
                            均判定為於運行本遊戲時執行非官方提供，且會破壞遊戲公平原則的軟體，將依照此規範進行懲處。<br>
                            <span class="red">※
                                牽涉使用第三方程式的作弊行為，不法所得之相關帳號角色，依照情節也將進行道具、金錢回收、停權等懲處。</span><br>
                        </td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 嘗試修改遊戲程式或資料 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft">官方不允許非正常遊玩方式嘗試更動遊戲程式或遊戲資料<br>
                            1. 包含但不僅限於嘗試使用任何方式入侵、破解、修改遊戲程式或官方用戶端資料、複製道具。<br>
                            2. 啟動遊戲時，無運行或繞過官方提供之反作弊軟體程式(如Xigncode)運行遊戲。<br>
                            <span class="red">※ 違反此規範時，將直接鎖定進行該動作的帳號/角色，並依照個案通知託管時間。</span>
                        </td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 使用硬體所賦予的輔助功能 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 遊戲本身需要玩家使用「鍵盤」、「滑鼠」來進行遊玩。<br>
                            如遊戲過程中，啟用硬體所賦予的『巨集』、『加速』、『自動施放』、『連點』、『腳本』等等功能<br>
                            且經屬實判定違反遊戲公平原則，遭受到對應懲處。<br>
                            <span class="red">※牽涉使用硬體所賦予的輔助功能，不法所得之相關帳號角色，依照情節也將進行道具、金錢回收、停權等懲處。<br>
                                若單純使用內建上述功能的硬體進行遊戲，但並「無於遊戲過程中」使用功能，並不會因此遭受懲處。</span>
                        </td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 涉及現金交易 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft">
                            1. 帳號任何涉及使用現金、實體有價物品交換虛擬幣、虛擬道具、遊戲帳號、代練服務等等遊戲中相關電磁資料，將被判定違反此條例，遭受到對應懲處。<br>
                            2. 在遊戲中發送牽涉現金、實體有價物品交換虛擬幣、虛擬道具、遊戲帳號、代練服務等「對話訊息」，亦將被判定違反此條例，遭受到對應懲處。<br>
                            <span class="red">
                                ※ 牽涉字眼包含但不限於發送下列名詞：<br>
                                現金、8591、數字網、數字科技、虛寶序號、台幣、NTD、小朋友、 實匯、T幣、85網站、8X9X、T網…等。<br>
                                ※ 同時玩家利用本遊戲之任何電磁資料進行現金交易，且在交易過程中玩家遭遇任何損失，恕官方無法給予任何補償。<br>
                            </span>
                        </td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th>會員註冊資料不實</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 偽冒或盜用他人之身分資料進行註冊，將違反此條例。</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th>濫用遊戲機制、Bug或是參與了任何對某方產生不公平優勢的作弊行為</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 包括但不限於下列行為：<br>
                            1. 遊戲中物品複製。<br>
                            2. 重複取得單次性獎勵。<br>
                            3. 以投機方式、非正常管道獲取遊戲內所有數值。<br>
                            4. 違反遊戲機制合理設定。<br>
                            5. 與使用非官方提供之第三方程式玩家共享利益將會依照情節判定是否連帶違反此條例。</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th>破壞行為</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 所有入侵攻擊、破壞、破解、修改伺服器、遊戲程式或官方客戶端資料等相關行為</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 涉及帳號盜取(用)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 試圖竊取他人的帳號密碼，無論是否進行不正當的遊戲道具、貨幣轉移行為，<br>
                            一經盜用行為確立，將永久停止竊取得益者遊戲帳號及財產。<br>
                            <span class="red">※切勿任意提供帳號資訊給友人，如因個人行為導致帳號遭受盜用，官方將不採取任何補償服務。</span>
                        </td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 贓物收取</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 於本遊戲中並無付出相當交易代價，卻獲取超過一定程度的利益者<br>
                            將有可能被視為參與盜取(用)的不當得利之人，請帳號本人於鎖定7日內提出說明<br>
                            如逾期無法說明，本公司將逕行回收非法利益者取得之遊戲內容，且帳號最重將永久停權。</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 帳務款項問題</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 例如：合作之金流代收廠商等通知欠費鎖定。</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 公家機關案件</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft"> 配合政府行政/司法機關來函案件處理鎖定。</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th> 帳號資料異常</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="textLeft">相關處理如下：帳號託管，請聯繫客服中心反應處理。<br>
                            遊戲帳號資料出現異常資料，包括但不僅限<br>
                            1. 擁有現階段版本未開放之道具<br>
                            2. 角色或裝備數值異常<br>
                            3. 遊戲歷程異於其他一般正常使用者<br>
                            經原廠或營運團隊判定資料異常之狀況，請帳號本人於鎖定帳號後聯繫客服釐清提出說明，將依情節判定處理。</td>
                    </tr>
                </tbody>
            </table>
            <p class="textRight">  DiGeam 《仙俠世界二》 營運團隊  </p>
        </div>
    </div>
@endsection
