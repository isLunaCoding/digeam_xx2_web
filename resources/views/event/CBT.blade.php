<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="《仙俠世界貳》刪檔封測開放中" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="人人皆可恣意飛行的修仙大世界，打造屬於自己的修仙之路，【仙俠世界貳】10/12~10/16 刪檔封測開放中！" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:locale" content="zh_tw" />
    <meta property="article:author" content="" />
    <meta property="og:image" content="img/event/CBT/fb_share.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="628" />
    <meta name="author" content="DiGeam" />
    <meta name="Resource-type" content="Document" />
    <link rel="icon" sizes="192x192" href="img/event/CBT/favicon.ico">
    <meta name="description" content="人人皆可恣意飛行的修仙大世界，打造屬於自己的修仙之路，【仙俠世界貳】10/12~10/16 刪檔封測開放中！" />
    <link rel="pingback" href="" />

    <title>《仙俠世界貳》封測火熱開放中</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link rel="stylesheet" href="css/event/CBT/style.css?v=100">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@700&display=swap" rel="stylesheet">

</head>

<body>
    <!-- web版menu -->
    <div class="menubar">
        <div class="menu_wrap">
            <div class="xx2_logo">
                <a href="https://xx2.digeam.com/" target="blank"></a>
            </div>
            <div class="menubtns">
                <div class="btn1"><a href="#page1"></a></div>
                <div class="btn2"><a href="#page2"></a></div>
                <div class="btn3"><a href="#page3"></a></div>
                <div class="btn4"><a href="#page4"></a></div>
                <div class="btn5"><a href="#page5"></a></div>
            </div>
            <div class="social_link">

                @if (isset($_COOKIE['StrID']) && isset($_COOKIE['StrID']) != null)
                    <!-- 已登入 -->
                    <form id="logout-form" action="https://www.digeam.com/logout" method="POST" style="display: none;">
                        <input type="hidden" name="return_url" id="return_url"
                            value={{ base64_encode('https://xx2.digeam.com/CBT') }}>
                    </form>
                    <div class="login login_user_id" data-val={{ $_COOKIE['StrID'] }}>
                        <p>您好，<span>{{ $_COOKIE['StrID'] }}</span></p>
                        <button class="logoutbtn" onclick="logout_dg()">登出</button>
                    </div>
                @else
                    <!-- 未登入 -->
                    {{-- <form id="logout-form" action="https://www.digeam.com/logout" method="POST" style="display: none;">
                        <input type="hidden" name="return_url" id="return_url"
                            value={{ base64_encode('https://xx2.digeam.com/CBT') }}>
                    </form> --}}
                    @php
                        $_COOKIE_DOMAIN = '.digeam.com';
                        SetCookie('return_url', base64_encode('https://cbo.digeam.com/CBT'), 0, '/', $_COOKIE_DOMAIN);
                    @endphp
                    <div class='loginbtn login_user_id' style='text-align:center' data-val='null'><a
                            href="https://www.digeam.com/login"></a></div>
                @endif

                <div class="DC_link">
                    <a href="https://discord.gg/2ZRW3hacJ2" target="blank"></a>
                </div>
                <div class="FB_link">
                    <a href="https://www.facebook.com/DiGeamXianXia2" target="blank"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- rwd用menubtn -->
    <div class="menubarbtn">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>

    <!-- 頁首主視覺 -->
    <div class="page0">
        <video poster="/img/event/CBT/p0/bg0.png" class="videoBG" src="/img/event/CBT/p0/BG.mp4" autoplay loop
            muted></video>
        <a href="https://xx2.digeam.com/" target="blank" class="xx2_logo_M"></a>
        <div class="p0_ti">
            <div class="ti_light_mask">
                <div class="ti_light"></div>
            </div>
        </div>
        <div class="p0btns">
            <div class="register_btn">
                <a href="https://www.digeam.com/register" target="blank"> </a>
            </div>
            <div class="downlooad_btn">
                <a href="https://xx2.digeam.com/download" target="blank"> </a>
            </div>
        </div>
    </div>

    <!-- 修仙啟程 -->
    <div class="page1">
        <div class="p1_title" id="page1">
            <div class="p1_ti"></div>
        </div>
        <div class="p1_wrap">
            <div class="p1_main_text">
                <div class="p1_subti">
                    <p>活動時間</p>
                </div>
                <div class="p1_text_1">
                    <p>《仙俠世界貳》封測期間</p>
                </div>
                <div class="p1_subti">
                    <p>活動方式</p>
                </div>
                <ul class="p1_text_2">
                    <li>上仙於封測期間等級提升至40等，可以前往十方鎮尋找NPC魯東海領取時裝「雪意浮花」！</li>
                    <li>符合領取條件的帳號將可以於公測後，前往領獎專區再次領取時裝獎勵。</li>
                </ul>
            </div>
            <div class="p1_cloth">
                <div class="p1_cloth_info"></div>
            </div>
        </div>
    </div>

    <!-- 封測基金 -->
    <div class="page2">
        <div class="p2_title" id="page2">
            <div class="p2_ti"></div>
        </div>
        <!-- web -->
        <div class="p2_wrap">
            <div class="p2_tab">
                <div class="p2_tab1_btn"></div>
                <div class="p2_tab2_btn"></div>
                <div class="p2_tab3_btn"></div>
            </div>
            <div class="p2_main_text">
                <div class="p2_tab1_info">
                    <div class="p2_subti">
                        <p>活動時間</p>
                    </div>
                    <div class="p2_text_1">
                        <p>《仙俠世界貳》封測期間</p>
                    </div>
                    <div class="p2_subti">
                        <p>活動說明</p>
                    </div>
                    <div class="p2_text_2">
                        <p>封測期間每日可以前往十方鎮尋找NPC沈仲陽領取封測限定1萬元寶。</p>
                    </div>
                    <div class="p2_subti">
                        <p>注意事項</p>
                    </div>
                    <div class="p2_text_2">
                        <p>本活動獲得之元寶僅能於封測期間使用，封測結束後角色資料將會刪除，未使用的元寶將不會保留至公測。</p>
                    </div>
                </div>
                <div class="p2_tab2_info">
                    <div class="p2_subti">
                        <p>活動時間</p>
                    </div>
                    <div class="p2_text_1">
                        <p>《仙俠世界貳》封測期間</p>
                    </div>
                    <div class="p2_subti">
                        <p>活動說明</p>
                    </div>
                    <div class="p2_text_2">
                        <p>封測期間每日可以前往十方鎮尋找NPC根叔，完成任務後可以領取封測限定1萬紅包。</p>
                    </div>
                    <div class="p2_subti">
                        <p>注意事項</p>
                    </div>
                    <div class="p2_text_2">
                        <p>本活動獲得之紅包僅能於封測期間使用，封測結束後角色資料將會刪除，未使用的紅包將不會保留至公測。</p>
                    </div>
                </div>
                <div class="p2_tab3_info">
                    <div class="p2_subti">
                        <p>活動時間</p>
                    </div>
                    <div class="p2_text_1">
                        <p>《仙俠世界貳》封測期間</p>
                    </div>
                    <div class="p2_subti">
                        <p>活動說明</p>
                    </div>
                    <div class="p2_text_2">
                        <p>封測期間每日可以前往凌霄城尋找NPC陸望舒，完成任務後，可以領取封測限定100萬寶珠。</p>
                    </div>
                    <div class="p2_subti">
                        <p>注意事項</p>
                    </div>
                    <div class="p2_text_2">
                        <p>本活動獲得之寶珠僅能於封測期間使用，封測結束後角色資料將會刪除，未使用的寶珠將不會保留至公測。​</p>
                    </div>
                </div>
            </div>
            <div class="p2_pic">
                <img class="p2_tab1_img" src="/img/event/CBT/p2/NPC1.png">
                <img class="p2_tab2_img" src="/img/event/CBT/p2/NPC2.png">
                <img class="p2_tab3_img" src="/img/event/CBT/p2/NPC3.png">
            </div>
        </div>
        <!-- rwd -->
        <div class="p2_wrap_m">
            <div class="p2_tab1_m">
                <img class="p2_tab_m_ti" src="/img/event/CBT/p2/tabbtn1_m.png">
                <div class="p2_tabwrap_m">
                    <div class="p2_subti">
                        <p>活動時間</p>
                    </div>
                    <div class="p2_text_1">
                        <p>《仙俠世界貳》封測期間</p>
                    </div>
                    <div class="p2_subti">
                        <p>活動說明</p>
                    </div>
                    <div class="p2_text_2">
                        <p>封測期間每日可以前往十方鎮尋找NPC沈仲陽領取封測限定1萬元寶。</p>
                    </div>
                    <div class="p2_subti">
                        <p>注意事項</p>
                    </div>
                    <div class="p2_text_2">
                        <p>本活動獲得之元寶僅能於封測期間使用，封測結束後角色資料將會刪除，未使用的元寶將不會保留至公測。</p>
                    </div>
                    <img class="p2_tab_img" src="/img/event/CBT/p2/NPC1.png">
                </div>
            </div>
            <div class="p2_tab2_m">
                <img class="p2_tab_m_ti" src="/img/event/CBT/p2/tabbtn2_m.png">
                <div class="p2_tabwrap_m">
                    <div class="p2_subti">
                        <p>活動時間</p>
                    </div>
                    <div class="p2_text_1">
                        <p>《仙俠世界貳》封測期間</p>
                    </div>
                    <div class="p2_subti">
                        <p>活動說明</p>
                    </div>
                    <div class="p2_text_2">
                        <p>封測期間每日可以前往十方鎮尋找NPC根叔，完成任務後可以領取封測限定1萬紅包。</p>
                    </div>
                    <div class="p2_subti">
                        <p>注意事項</p>
                    </div>
                    <div class="p2_text_2">
                        <p>本活動獲得之紅包僅能於封測期間使用，封測結束後角色資料將會刪除，未使用的紅包將不會保留至公測。</p>
                    </div>
                    <img class="p2_tab_img" src="/img/event/CBT/p2/NPC2.png">
                </div>
            </div>
            <div class="p2_tab3_m">
                <img class="p2_tab_m_ti" src="/img/event/CBT/p2/tabbtn3_m.png">
                <div class="p2_tabwrap_m">
                    <div class="p2_subti">
                        <p>活動時間</p>
                    </div>
                    <div class="p2_text_1">
                        <p>《仙俠世界貳》封測期間</p>
                    </div>
                    <div class="p2_subti">
                        <p>活動說明</p>
                    </div>
                    <div class="p2_text_2">
                        <p>封測期間每日可以前往凌霄城尋找NPC陸望舒，完成任務後，可以領取封測限定100萬寶珠。</p>
                    </div>
                    <div class="p2_subti">
                        <p>注意事項</p>
                    </div>
                    <div class="p2_text_2">
                        <p>本活動獲得之寶珠僅能於封測期間使用，封測結束後角色資料將會刪除，未使用的寶珠將不會保留至公測。</p>
                    </div>
                    <img class="p2_tab_img" src="/img/event/CBT/p2/NPC3.png">
                </div>
            </div>
        </div>
    </div>

    <!-- 限定禮包 -->
    <div class="page3">
        <div class="p3_title" id="page3">
            <div class="p3_ti"></div>
        </div>
        <div class="p3_wrap">
            <div class="p3_main_info">
                <div class="p3_main_text">
                    <div class="p3_subti">
                        <p>活動時間</p>
                    </div>
                    <div class="p3_text_1">
                        <p>即日起 ~《仙俠世界貳》封測結束後</p>
                    </div>
                    <div class="p3_subti">
                        <p>活動方式</p>
                    </div>
                    <ul class="p3_text_2">
                        <li>封測期間，由此頁面可預購期間限定強力支援禮包，禮包將於公測開服時發送。</li>
                        <li>禮包內含限定時裝，​​僅限封測期間販售，錯過不再！</li>
                        <li>每個禮包帳號限購1次。</li>
                        <li>禮包僅需轉點至《仙俠世界貳》後即可於頁面進行購買，無需在遊戲中將點數兌換成元寶。</li>
                    </ul>
                </div>
                <div class="p3_point">
                    <span>剩餘點數</span>
                    <span class="player_points">0</span>
                    <span>點</span>
                </div>
                <div class="p3_btns">
                    <div class="p3_bonus_btn">
                        <a href="https://www.digeam.com/member/billing" target="blank">儲值中心</a>
                    </div>
                    <div class="p3_giftinfo_btn">禮包介紹</div>
                    <div class="p3_notice_btn">活動說明</div>
                </div>
            </div>
            <div class="p3_gifts">
                <div class="p3_gift p3_gift_299">
                    <div class="p3_gift_wrap">
                        <p class="p3_gift_name">靈氣初現禮包</p>
                        <div class="p3_gift_img p3_gift_299_img"></div>
                        <p class="p3_price">299<span>點</span></p>
                        <div class="p3_buy_btn p3_buy299"></div>
                    </div>
                </div>
                <div class="p3_gift p3_gift_999">
                    <div class="p3_gift_wrap">
                        <p class="p3_gift_name">仙獸羈絆禮包</p>
                        <div class="p3_gift_img p3_gift_999_img"></div>
                        <p class="p3_price">999<span>點</span></p>
                        <div class="p3_buy_btn p3_buy999"></div>
                    </div>
                </div>
                <div class="p3_gift p3_gift_2690">
                    <div class="p3_gift_wrap">
                        <p class="p3_gift_name">修真之寶禮包</p>
                        <div class="p3_gift_img p3_gift_2690_img"></div>
                        <p class="p3_price">2690<span>點</span></p>
                        <div class="p3_buy_btn p3_buy2690"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 一步登仙 -->
    <div class="page4">
        <div class="p4_title" id="page4">
            <div class="p4_ti"></div>
        </div>
        <div class="p4_wrap">
            <div class="p4_main_text">
                <div class="p4_subti">
                    <p>活動時間</p>
                </div>
                <div class="p4_text_1">
                    <p>即日起 ~《仙俠世界貳》上市後一週</p>
                </div>
                <div class="p4_subti">
                    <p>活動方式</p>
                </div>
                <ul class="p4_text_2">
                    <li>每天可進行一次內力注入。​</li>
                    <li>注入內力次數會於每日00:00重置。</li>
                    <li>達成指定注入內力次數可以提升境界，並獲得對應獎勵。​</li>
                    <li>活動期間內注入內力達15次可獲得iPhone14 Pro Max抽獎資格。</li>
                </ul>
            </div>
            <div class="p4_play">
                <div class="p4_man">
                    <div class="p4_man1"></div>
                    <div class="p4_man2"></div>
                    <div class="p4_man_frame"></div>
                </div>
                <div class="p4_lv">
                    <p class="now_LV"></p>
                </div>
                <div class="p4_gobtn">
                    <p>注入<br />內力</p>
                </div>
            </div>
            <div class="p4_iphone">
                <div class="p4_iphone_text">
                    <p>登仙途<br />送iPhone</p>
                </div>
                <div class="p4_iphone_img"></div>
            </div>
            <div class="p4_btns">
                <div class="p4_award_btn">境界獎勵</div>
                <div class="p4_notice_btn">活動說明</div>
            </div>
        </div>
    </div>

    <!-- 遊仙緝蠱 -->
    <div class="page5">
        <div class="p5_title" id="page5">
            <div class="p5_ti"></div>
        </div>
        <div class="p5_wrap">
            <p class="p5_text">《仙俠世界貳》封測期間，提交封測關於文字、說明、系統等BUG，可以於公測獲得對應獎勵。</p>
            <div class="p5_btns">
                <div class="p5_award_btn">獎勵說明</div>
                <div class="p5_notice_btn">活動說明</div>
            </div>
            <div class="bug_box">
                <form class="" action method="get">
                    <div class="quBox quBox1">
                        <p>問題分類</p>
                        <div class="qu_menu">
                            <input type="radio" id="abn" name="question">
                            <label for="abn" id="abn">系統及機制異常</label>
                            <input type="radio" id="mis" name="question">
                            <label for="mis" id="mis">描述錯誤/錯字/亂碼</label>
                            <input type="radio" id="other" name="question">
                            <label for="other" id="other">其他</label>
                        </div>
                    </div>
                    <div class="quBox quBox2">
                        <p>問題說明</p>
                        <textarea maxlength="100" name="textarea" id="textareaBox" class="textareaBox" placeholder="(100字以內)"></textarea>
                    </div>
                    <div class="quBox quBox3">
                        <p class="pic_ti">上傳圖片(2MB以下,限JPG、JPEG、PNG格式)</p>
                        <label for class="bug_img">
                            <input class="imgBtn0" type="file" id="imgInp" name="uploadImage"
                                accept="image/*">
                            <img id="imagePreview" src="">
                        </label>
                    </div>
                    <div class="p5_enter_btn">送出</div>
                </form>
            </div>
        </div>
    </div>

    <!-- 雲霧特效 -->
    <div class="clouds">
        <div class="cloud1"></div>
        <div class="cloud2"></div>
    </div>

    <!-- OB按鈕(10/16中午12點自己會出現) -->
    <div class="OBTLink">
        <a href="https://xx2.digeam.com/OBT" target="blank"></a>
    </div>

    <!-- 下載大彈窗(它被拋棄了QQ) -->
    <div class="popDownload">
        <div class="popDframe">
            <div class="popL_xx"></div>
            <p class="popD_ti">主程式下載</p>
            <p class="popD_text">選擇官方下載器或是免安裝包其中一種方式下載，完成後執行下載檔即可</p>
            <div class="dwbtn1">
                <a href="" target="blank"> </a>
            </div>
            <div class="dwline"></div>
            <div class="dwbtn2_1">
                <a href="" target="blank"> </a>
            </div>
            <div class="dwbtn2_2">
                <a href="" target="blank"> </a>
            </div>
        </div>
    </div>

    <!-- 大彈窗 -->
    <div class="popL">
        <div class="popLframe">
            <div class="popL_xx"></div>
            <p class="popL_ti"></p>
            <div class="popL_info">
            </div>
        </div>
    </div>

    <!-- 小彈窗 -->
    <div class="popS">
        <div class="popSframe">
            <p class="popStext"></p>
            <div class="checkbtn_1">確定</div>
            <div class="doublebtns">
                <div class="checkbtn_2" id="yes">確定</div>
                <div class="checkbtn_3" id="no">取消</div>
            </div>
        </div>
    </div>

    <!-- 登入用小彈窗 -->
    <div class="login_popS">
        <div class="login_popSframe">
            <p class="login_popStext">請先登入掘夢網會員</p>

            @if (isset($_COOKIE['StrID']) && isset($_COOKIE['StrID']) != null)
                <!-- 已登入 -->
                <form id="logout-form" action="https://www.digeam.com/logout" method="POST" style="display: none;">
                    <input type="hidden" name="return_url" id="return_url"
                        value={{ base64_encode('https://xx2.digeam.com/CBT') }}>
                </form>
            @else
                <!-- 未登入 -->
                <form id="logout-form" action="https://www.digeam.com/logout" method="POST" style="display: none;">
                    <input type="hidden" name="return_url" id="return_url"
                        value={{ base64_encode('https://xx2.digeam.com/CBT') }}>
                </form>
                <div class="login_checkbtn" data-val='null'><a href="https://www.digeam.com/login">確定</a></div>
            @endif

        </div>
    </div>

    <!-- 時裝彈窗 -->
    <div class="clothpop">
        <img class="cloth_view" src="/img/event/CBT/p1/cloth_4view.png">
        <img class="cloth_view_m" src="/img/event/CBT/p1/cloth_4view_m.png">
    </div>

    <!-- 禮包1彈窗 -->
    <div class="gift1_pop">
        <img class="gift_view" src="/img/event/CBT/p3/gift1_view.png">
    </div>

    <!-- 禮包2彈窗 -->
    <div class="gift2_pop">
        <img class="gift_view" src="/img/event/CBT/p3/gift2_view.png">
    </div>

    <!-- 禮包3彈窗 -->
    <div class="gift3_pop">
        <div class="gift3_view"></div>
    </div>

    <!-- footer -->
    <footer>
        <div class="wrap">
            <div class="digeamLogo"><a href="https://www.digeam.com/index" target="blank"></a></div>
            <div class="gaintLogo"></div>
            <div class="copyright">
                <p>
                    <a href="https://www.digeam.com/terms">會員服務條款</a>
                    <a href="https://www.digeam.com/terms2">隱私條款</a>
                </p>
                <p>掘夢網股份有限公司©2023</p>
                <p>Copyright©DiGeam Corporation.</p>
                <p>All Rights Reserved.</p>
            </div>
            <div class="plus">
                <div class="lv"></div>
                <div class="footernotice">
                    <p>本遊戲為免費使用，部分內容涉及暴力與不當言語情節。</p>
                    <p>遊戲內另提供購買虛擬遊戲幣、物品等付費服務。</p>
                    <p>請注意遊戲時間，避免沉迷。​</p>
                    <p>本遊戲服務區域包含台灣、香港、澳門。</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="js/event/CBT/menu.js?v=100" type="text/javascript"></script>
    <script src="js/event/CBT/poptext.js?v=100" type="text/javascript"></script>
    <script src="js/event/CBT/main.js?v=100" type="text/javascript"></script>
    <script src="js/event/CBT/api.js?v=100" type="text/javascript"></script>
</body>

</html>
