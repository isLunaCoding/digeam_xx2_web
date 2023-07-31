<?php
$_COOKIE['StrID'] = 'jacky0996';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="首頁 &#038;《仙俠世界貳》事前預約" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="人人皆可恣意飛行的修仙大世界，打造屬於自己的修仙之路，2023年度仙俠鉅作【仙俠世界貳】事前預約中！" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:locale" content="zh_tw" />
    <meta property="article:author" content="" />
    <meta property="og:image" content="img/fb_share.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="628" />
    <meta name="author" content="DiGeam" />
    <meta name="Resource-type" content="Document" />
    <link rel="icon" sizes="192x192" href="img/event/prereg/favicon.ico">
    <meta name="description" content="人人皆可恣意飛行的修仙大世界，打造屬於自己的修仙之路，2023年度仙俠鉅作【仙俠世界貳】事前預約中！" />
    <link rel="pingback" href="" />

    <title>《仙俠世界貳》事前預約</title>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <link rel="stylesheet" href="css/event/prereg/main.css">
    <link rel="stylesheet" href="css/event/prereg/style1440.css">
    <link rel="stylesheet" href="css/event/prereg/style820.css">
    <link rel="stylesheet" href="css/event/prereg/style425.css">
    <link rel="stylesheet" href="css/event/prereg/style375.css">
    <link rel="stylesheet" href="css/event/prereg/animate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- 側bar -->
    <div class="menubar">
        <div class="barLine"></div>
        <div class="bar ">
            <div class="swiper-pagination"></div>
        </div>
        <div class="menubtn"></div>
    </div>
    <!-- 主內容Swiper -->
    <div class="swiper mainSwiper">
        <div class="swiper-wrapper">

            <!-- 1首頁 -->
            <div class="swiper-slide page1">
                <video poster="/img/event/prereg/p1/bg1.png" class="videoBG" src="/img/event/prereg/p1/bgvideo.mp4"
                    autoplay loop muted></video>
                <!-- <button class="soundbtn"></button> -->
                <div class="XX2_logo"></div>
                <div class="maintitle"></div>
                <div class="slogan"></div>
                <div class="downbtn"></div>
                <div class="cloudmask"></div><!-- 這行一定要放在這區的最後一條 -->
            </div>

            <!-- 2初出江湖 -->
            <div class="swiper-slide page2">
                <div class="bg2animate">
                    <div class="bird1"></div>
                    <div class="bird2"></div>
                    <div class="leave1"></div>
                    <div class="leave2"></div>
                </div>
                <div class="p2title"></div>
                <div class="p2main">
                    <div class="p2steps">
                        <div class="step1"></div>
                        @if (isset($_COOKIE['StrID']) && isset($_COOKIE['StrID']) != null)
                            <!-- 已登入 -->
                            <form id="logout-form" action="https://www.digeam.com/logout" method="POST"
                                style="display: none;">
                                <input type="hidden" name="return_url" id="return_url"
                                    value={{ base64_encode('https://xx2.digeam.com/prereg') }}>
                            </form>
                            <div class='login_user_id' style='text-align:center' data-val={{ $_COOKIE['StrID'] }}>
                                目前登入的帳號是:{{ $_COOKIE['StrID'] }}</div>
                            <button class="loginbtn" style='text-align:center' onclick="logout_dg()">登 出</button>
                        @else
                            <!-- 未登入 -->
                            <form id="logout-form" action="https://www.digeam.com/logout" method="POST"
                                style="display: none;">
                                <input type="hidden" name="return_url" id="return_url"
                                    value={{ base64_encode('https://xx2.digeam.com/prereg') }}>
                            </form>
                            <div class='login_user_id' style='text-align:center' data-val='null'></div>
                            <div class="loginbtn"><a href="https://www.digeam.com/login">登入</a></div>
                            <p class="register">※沒有會員嗎?<a href="https://www.digeam.com/register"
                                    target="blank">前往註冊</a></p>
                        @endif

                        <div class="step2"></div>
                        <div class="step2checkbox">
                            <form action="" method="get" target="_blank">
                                <div>
                                    <select class='mobile_area' name="country">
                                        <option value="+886">台灣+886</option>
                                        <option value="+852">香港+852</option>
                                        <option value="+853">澳門+853</option>
                                    </select>
                                    <input type="text" name="phone_num" class='mobile'
                                        placeholder="請輸入電話號碼(不含符號)">
                                </div>

                                <p><input type="checkbox" id="checkbox" name="noticecheck">
                                    我已經閱讀且同意<a href="https://www.digeam.com/terms2" target="blank">隱私權政策</a>與活動相關注意事項
                                </p>
                            </form>
                        </div>
                        <div class="checkbtn check_p2" id="checkbtn">初出江湖</div>
                    </div>
                    <div class="p2awards">
                        <div class="awardbox"></div>
                        <div class="p2btns">
                            <div class="p2informationbtn">活動說明</div>
                            <div class="p2noticebtn">注意事項</div>
                        </div>
                    </div>
                </div>
                <div class="cloudmask"></div><!-- 這行一定要放在這區的最後一條 -->
            </div>

            <!-- 3結交名士 -->
            <div class="swiper-slide page3">
                <div class="bgclouds">
                    <div class="bgcloud1"></div>
                    <div class="bgcloud2"></div>
                </div>
                <div class="p3title"></div>
                <div class="p3main">
                    <div class="corner">
                        <div class="corner_LT"></div>
                        <div class="corner_RT"></div>
                        <div class="corner_LB"></div>
                        <div class="corner_RB"></div>
                    </div>
                    <div class="p3info">
                        <p>累計拜訪30次可任選【仙道盟主沈仲陽】、【七花獸百花仙靈】、【愛之紅娘】其中一位作為結義名士</p>
                        <div class="p3listbtns">名士一覽</div>
                    </div>
                    <div class="p3btns">
                        <div class="p3informationbtn">活動說明</div>
                        <div class="p3missionbtn">任務佈告</div>
                        <div class="p3noticebtn">注意事項</div>
                    </div>
                    <div class="lanternbox">
                        <div class="lantern_light"></div>
                        <div class="lantern"></div>
                        <div class="lantern_line"></div>
                        <p>距離<br>自選名士<br><span class='distance_30' data-val=0></span>/30</p>
                    </div>
                    <div class="card">
                        <div class="nocard">
                            <div class="card_bg"></div>
                            <div class="card_cloud1"></div>
                            <div class="card_cloud2"></div>
                            <div class="card_frame"></div>
                        </div>
                        <div class="nowcard"></div>
                        <div class="getcardbtn check_p3"></div>
                        <p>您尚可拜訪<span class='visit_frequency' data-val=0></span>次</p>
                    </div>
                    <div class="p3text">
                        <ul class="samplerules"></ul>
                        <div class="cardinfo"></div>
                    </div>
                    <div class="p4Gobtn check_p2">與他結義</div>
                </div>
                <div class="cloudmask"></div><!-- 這行一定要放在這區的最後一條 -->
            </div>

            <!-- 4熊貓賽跑 -->
            <div class="swiper-slide page4">
                <div class="bg4animate">
                    <div class="bamboo"></div>
                    <div class="cloud"></div>
                    <div class="leave1"></div>
                    <div class="leave2"></div>
                    <div class="leave3"></div>
                </div>
                <div class="p4title"></div>
                <div class="p4main">
                    <div class="p4info">
                        <p>每日00:00將會開啟新一輪的賽事，選擇下方熊貓進行比賽，累計猜對次數將可以獲得獎勵。</p>
                        <div class="p4btns">
                            <div class="p4informationbtn">活動說明</div>
                            <div class="p4noticebtn">注意事項</div>
                        </div>
                    </div>
                    <div class="pandas">
                        <div class="panda1"></div>
                        <div class="panda2"></div>
                        <div class="panda3"></div>
                    </div>
                    <div class="pandasValue">
                        <div class="panda1Value"></div>
                        <div class="panda2Value"></div>
                        <div class="panda3Value"></div>
                    </div>
                    <div class="pandaMenu">
                        <div class="panda1btn panda1btn_2"></div>
                        <div class="panda2btn"></div>
                        <div class="panda3btn"></div>
                    </div>
                    <div class="pandaGobtn">競猜支持</div>
                    <div class="p4awards">獎勵列表</div>
                    <div class="times">
                        <p>累計猜對:10次<br>累計競猜:20次</p>
                    </div>
                </div>
                <div class="cloudmask"></div><!-- 這行一定要放在這區的最後一條 -->
            </div>

            <!-- 5遊戲特色 -->
            <div class="swiper-slide page5">
                <div id="rainBox"></div>
                <div class="p5title"></div>
                <div class="p5slideBox">
                    <div class="p5slidebg"></div>
                    <div class="p5slider">
                        <div class="p5slide1">1</div>
                        <div class="p5slide2">2</div>
                        <div class="p5slide3">3</div>
                        <div class="p5slide4">4</div>
                    </div>
                    <div class="p5flowers">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="cloudmask"></div><!-- 這行一定要放在這區的最後一條 -->
            </div>

            <!-- 6職業介紹 -->
            <div class="swiper-slide page6">
                <div class="p6title"></div>
                <div class="roles">
                    <div class="humen">
                        <div class="human1"></div>
                        <div class="human2"></div>
                        <div class="human3"></div>
                        <div class="human4"></div>
                        <div class="human5"></div>
                    </div>
                    <div class="names">
                        <div class="name1"></div>
                        <div class="name2"></div>
                        <div class="name3"></div>
                        <div class="name4"></div>
                        <div class="name5"></div>
                    </div>
                    <div class="arm">劍</div>
                </div>
                <div class="bgclouds">
                    <div class="bgcloud1"></div>
                    <div class="bgcloud2"></div>
                </div>
                <div class="p6features p6feature1">
                    <div class="p6subtitle">職業特色</div>
                    <div class="p6text">神脈正統，天器傳人，善借五行之力，幻化出無形劍式，配合靈動的身法，給予敵人致命打擊。</div>
                </div>
                <div class="p6features p6feature2">
                    <div class="p6subtitle">團隊定位</div>
                    <div class="p6text">遠程法系輸出，可以控制大量敵人，並給予傷害，但是血防較為薄弱，容易被擊火擊殺。</div>
                </div>
                <div class="p6menu">
                    <div class="p6btn5"></div>
                    <div class="p6btn4"></div>
                    <div class="p6btn3"></div>
                    <div class="p6btn2"></div>
                    <div class="p6btn1 p6btn1_2"></div>
                </div>
                <div class="cloudmask"></div><!-- 這行一定要放在這區的最後一條 -->
            </div>

            <!-- 7活動規則 -->
            <div class="swiper-slide page7">
                <div class="p7title"></div>
                <ul class="p7rules"></ul>
                <div class="footer">
                    <div class="wrap">
                        <div class="digeamlogo"></div>
                        <div class="giantlogo"></div>
                        <div class="copyright">
                            <div>
                                <a href="https://www.digeam.com/terms">會員服務條款</a>
                                <a href="https://www.digeam.com/terms2">隱私條款</a>
                                <p>掘夢網股份有限公司©2023<br />Copyright©DiGeam Corporation.<br />All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="plus">
                            <div class="lv"></div>
                            <div class="footernotice">
                                <p>本遊戲為免費使用，部分內容涉及暴力情節。</p>
                                <p>遊戲內另提供購買虛擬遊戲幣、物品等付費服務。</p>
                                <p>請注意遊戲時間，避免沉迷。​</p>
                                <p>本遊戲服務區域包含台灣、香港、澳門。</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cloudmask"></div><!-- 這行一定要放在這區的最後一條 -->
            </div>
        </div>
    </div>

    <!-- 結交名士任務板 -->
    <div class="p3missionpop">
        <div class="p3missionpopframe">
            <div class="p3XX"></div>
            <div class="p3missionpoptitle"></div>
            <ul class="p3missionpopText">
                <li>
                    <div class="missiontext">每日首次登入頁面</div>
                    <div class="missiontimes">拜訪次數+1</div>
                    <div class="missionbtn" data-val='daily_login'></div>
                </li>
                <li>
                    <div class="missiontext">每日首次分享FB</div>
                    <div class="missiontimes">拜訪次數+2</div>
                    <div class="missionbtn" data-val='daily_FB'></div>
                </li>
                <li>
                    <div class="missiontext">FB粉絲團按讚追蹤<span>(僅一次)</span></div>
                    <div class="missiontimes">拜訪次數+2</div>
                    <div class="missionbtn" data-val='fb_fans_click'></div>
                </li>
                <li>
                    <div class="missiontext">進入官方DC群<span>(僅一次)</span></div>
                    <div class="missiontimes">拜訪次數+2</div>
                    <div class="missionbtn" data-val='join_dc'></div>
                </li>
                <li>
                    <div class="missiontext">進入CB活動頁面<span>(僅一次)</span></div>
                    <div class="missiontimes">拜訪次數+2</div>
                    <div class="missionbtn" data-val='go_cb'></div>
                </li>
                <li>
                    <div class="missiontext">進入官方網站<span>(僅一次)</span></div>
                    <div class="missiontimes">拜訪次數+2</div>
                    <div class="missionbtn" data-val='go_index'></div>
                </li>
                <li>
                    <div class="missiontext">進入OB活動頁面<span>(僅一次)</span></div>
                    <div class="missiontimes">拜訪次數+2</div>
                    <div class="missionbtn" data-val='go_ob'></div>
                </li>
            </ul>
        </div>
    </div>

    <!-- 結交名士結果彈窗 -->
    <div class="p3resultpop">
        <div class="p3resultpopframe">
            <div class="p3resultpoptitle">拜訪結果</div>
            <div class="result_new"></div>
            <div class="newinfo"></div>
            <div class="p3subtitle">本次獲得</div>
            <div class="result_now"></div>
            <div class="nowinfo"></div>
            <div class="p3subtitle">目前名士</div>
            <div class="p3resultbtns">
                <div class="choosenew">選擇本次獲得名士</div>
                <div class="keepnow">保留目前名士</div>
            </div>
        </div>
    </div>
    <!-- 結交名士-自選名士彈窗 -->
    <div class="p3choosepop">
        <div class="p3choosepopframe">
            <div class="p3choosepoptitle">自選名士</div>
            <div class="p3choosebtn">選擇名士</div>
            <div class="cards">
                <div class="card1_frame">
                    <div class="card1"></div>
                    <div class="card1info">
                        <table class="cardinfotable">
                            <tr>
                                <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center"
                                    colspan=2>七花獸百花仙靈</td>
                            </tr>
                            <tr>
                                <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                            </tr>
                            <tr>
                                <td>體質<span>+245</span></td>
                                <td>精神<span>+245</span></td>
                            </tr>
                            <tr>
                                <td>耐力<span>+245</span></td>
                                <td>罡氣<span>+4480</span></td>
                            </tr>
                            <tr>
                                <td>物理防禦<span>+204</span></td>
                                <td>法術防禦<span>+204</span></td>
                            </tr>
                            <tr>
                                <td>生命值<span>+10181</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                            </tr>
                            <tr>
                                <td colspan=2><span>煉獄火海</span></td>
                            </tr>
                            <tr>
                                <td colspan=2>對前方區域造成傷害，該區域中會出現火海持續燃燒10秒。</td>
                            </tr>
                        </table>
                    </div>
                    <div class="p3subtitle">七花獸百花仙靈</div>
                </div>
                <div class="card2_frame">
                    <div class="card2"></div>
                    <div class="card2info">
                        <table class="cardinfotable">
                            <tr>
                                <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center"
                                    colspan=2>仙道盟主沈仲陽</td>
                            </tr>
                            <tr>
                                <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                            </tr>
                            <tr>
                                <td>力量<span>+204</span></td>
                                <td>智力<span>+204</span></td>
                            </tr>
                            <tr>
                                <td>攻擊力<span>+285</span></td>
                                <td>罡氣攻擊<span>+244</span></td>
                            </tr>
                            <tr>
                                <td>物理攻擊<span>+244</span></td>
                                <td>法術攻擊<span>+244</span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                            </tr>
                            <tr>
                                <td colspan=2><span>兩儀反轉</span></td>
                            </tr>
                            <tr>
                                <td colspan=2>使用兩儀反轉後，所有受到的傷害將轉變為恢復生命，持續20秒。</td>
                            </tr>
                        </table>
                    </div>
                    <div class="p3subtitle">仙道盟主沈仲陽</div>
                </div>
                <div class="card3_frame">
                    <div class="card3"></div>
                    <div class="card3info">
                        <table class="cardinfotable">
                            <tr>
                                <td style="font-size: 19px;color: #FFF;text-shadow: 0 0 10px #103aa3;text-align: center"
                                    colspan=2>愛之紅娘</td>
                            </tr>
                            <tr>
                                <td colspan=2 style="color: #21345d;font-size: 16px;">卡片屬性</td>
                            </tr>
                            <tr>
                                <td>體質<span>+245</span></td>
                                <td>精神<span>+245</span></td>
                            </tr>
                            <tr>
                                <td>耐力<span>+245</span></td>
                                <td>罡氣<span>+4480</span></td>
                            </tr>
                            <tr>
                                <td>物理防禦<span>+204</span></td>
                                <td>法術防禦<span>+204</span></td>
                            </tr>
                            <tr>
                                <td>生命值<span>+10181</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan=2 style="color: #21345d;font-size: 16px;">羈絆技能</td>
                            </tr>
                            <tr>
                                <td colspan=2><span>快跑女孩</span></td>
                            </tr>
                            <tr>
                                <td colspan=2>將目標變為毫無還手之力的小女孩。</td>
                            </tr>
                        </table>
                    </div>
                    <div class="p3subtitle">愛之紅娘</div>
                </div>
            </div>
        </div>

    </div>

    {{-- 具有快顯功能表撰寫段落 --}}

    <!-- 大彈窗 -->
    <div class="pop">
        <div class="popframe">
            <div class="XX"></div>
            <div class="poptitle"></div>
            <div class="popTable"></div>
            <ul class="popText"></ul>
        </div>
    </div>

    <!-- 小彈窗 -->
    <div class="popS">
        <div class="popSframe">
            <div class="popStitle"></div>
            <div class="popSText"></div>
            <div class="popScheckBtn"></div>
        </div>
    </div>
    <!-- 熊貓賽跑影片窗 -->
    <div class="p4resultpop">
        <div class="p4resultpopframe">
            <video class="pandavideo" poster="/img/event/prereg/p4/panda_loading.jpg" autoplay muted>
            </video>
            <div class="booframe"></div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="js/event/prereg/main.js?v1.0" type="text/javascript"></script>
    <script src="js/event/prereg/text.js?v1.0" type="text/javascript"></script>
    <script src="js/event/prereg/rain.js?v1.0" type="text/javascript"></script>
    <script src="js/event/prereg/api.js?v1.0" type="text/javascript"></script>
</body>

</html>
