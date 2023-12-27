<script>
    if (document.documentMode) {
        alert('建議使用Edge或者Chrome瀏覽器進行瀏覽')
    }
    // $("#loading").show();
    // document.getElementById("loading").style('display','block');
    document.getElementById("loading").style.display = "block";
</script>

<!DOCTYPE html>
<html lang="zh-TW" class="html">

<head>
    <meta charset="UTF-8">

    {{-- 網頁標題 --}}
    @yield('title')

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="Digeam 掘夢網,線上遊戲,免費遊戲,3D">
    <meta property="og:type" content="website">
    <meta property="og:description" content="玄幻仙俠MMORPG《仙俠世界貳》獨創飛行模式，高自由度捏臉系統，開啟縱橫三界修真之旅，遨遊雲煙飄渺的靈耀大陸。" />
    <meta property="og:url" content="https://xx2.digeam.com/">{{-- 官網連結 --}}
    <meta property="article:author" content="https://www.facebook.com">
    <meta property="og:image" content="/img/event/homepage/thumbnail_1200x628.jpg" />
    <meta property="og:description" content="網頁敘述">
    <meta property="og:site_name" content="網站名稱">
    <meta name="description" content="玄幻仙俠MMORPG《仙俠世界貳》獨創飛行模式，高自由度捏臉系統，開啟縱橫三界修真之旅，遨遊雲煙飄渺的靈耀大陸。" />
    <link rel="icon" href="/img/event/prereg/favicon.ico" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/event/homepage/indexStyle.css?v=1.0.2">
    <link rel="stylesheet" href="/css/event/homepage/pop.css">
<style>
    .navBox .iconBox{
        left: 5%;
    }
</style>
    {{-- 分頁專用CSS --}}
    @yield('otherCss')

</head>

<body>
    <div class="wrap">
        <div class="main">
            <div id="loading">
                <div class="loadBox">
                    <p>頁面加載中，請稍等</p>
                    <div class="spinner"></div>
                </div>
            </div>

            <div class="mask" id="pop1">
                <div class="popBG">
                    <button onclick="_close()" class="popX">X</button>
                    <div class="popBox">
                        <div class="popTitle">技能介紹</div>
                        <div class="popContainer">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section1">
                <header class="logo"><img src="/img/event/homepage/LOGO.png"></header>
                <div class="navBox">
                    @yield('backHome')
                    <nav>
                        <ul class="menuBox">
                            <li class="menu menu1" data-menuaction="menu1_open">
                                <a href={{ route('announcement') }}>遊戲公告</a>
                                <ul class="menu1_open" data-menuaction="menu1_open">
                                    <li><a href={{ route('announcement', 'new') }}>最新消息</a></li>
                                    <li><a href={{ route('announcement', 'activity') }}>活動情報</a></li>
                                    <li><a href={{ route('announcement', 'system') }}>系統公告</a></li>
                                </ul>
                            </li>
                            <li class="menu menu2"><a href={{ route('wiki') }}>遊戲百科</a></li>
                                <li class="menu menu2"><a href={{ route('webmall') }}>網頁商城</a></li>
                            {{-- <li class="menu menu2"><a>敬請期待</a></li> --}}
                            <li class="menu menu3" data-menuaction="menu3_open">
                                <a href="https://www.facebook.com/DiGeamXianXia2">玩家社群</a>
                                <ul class="menu3_open" data-menuaction="menu3_open">
                                    <li><a href="https://www.facebook.com/DiGeamXianXia2">FB粉絲團</a></li>
                                    <li><a href="https://discord.gg/2ZRW3hacJ2">Discord</a></li>
                                </ul>
                            </li>
                            {{-- <li class="menu menu4"><a href="">排行榜</a></li> --}}
                            <li class="menu menu5"><a href={{ route('download') }}>下載專區</a></li>
                            <li class="menu menu6" data-menuaction="menu6_open">
                                <a href="">會員中心</a>
                                <ul class="menu6_open" data-menuaction="menu6_open">
                                    <li><a href="https://www.digeam.com/register">註冊會員</a></li>
                                    <li><a href={{ route('suspension') }}>停權名單</a></li>
                                    <li><a href="https://www.digeam.com/cs/faq">FAQ</a></li>
                                    <li><a href={{ route('regulations') }}>遊戲規章</a></li>
                                    <li><a href="https://www.digeam.com/cs">聯繫客服</a></li>
                                    <li><a href={{ route('reward') }}>領獎專區</a></li>
                                    <li><a href={{ route('exchange') }}>序號兌換</a></li>
                                </ul>
                            </li>
                            <li class="menu menu7 "><a href="https://www.digeam.com/member/billing">儲值中心</a></li>
                        </ul>
                    </nav>
                    <nav class="iconBox">
                        <ul>
                            <li><a href="https://www.youtube.com/@officialdigeam/videos"><img
                                        src="/img/event/homepage/social_icon_yt.png"></a></li>
                            <li><a href="https://discord.gg/2ZRW3hacJ2"><img
                                        src="/img/event/homepage/social_icon_dc.png"></a></li>
                            <li><a href="https://www.facebook.com/DiGeamXianXia2"><img
                                        src="/img/event/homepage/social_icon_fb.png"></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="sectionBG">
                    @yield('section1Container')
                </div>
            </div>

            @yield('section2')
            @yield('section3')
            @yield('sectionPage')

            <footer class="footer">
                <div class="footerBox">
                    <div class="footerbox_logo">
                        <a href="https://www.digeam.com/index"><img class="digeamlogo"
                                src="/img/event/homepage/footer/digeam_logo.webp"></a>
                        <img class="giantlogo" src="/img/event/homepage/footer/GIANT_logo.webp">
                    </div>
                    <div class="copyright">
                        <a href="https://www.digeam.com/terms">會員服務條款</a>
                        <a href="https://www.digeam.com/terms2">隱私條款</a>
                        <p>掘夢網股份有限公司©2023<br>Copyright©DiGeam Corporation.<br>All Rights Reserved.</p>
                    </div>
                    <div class="plus">
                        <img class="plus15" src="/img/event/homepage/footer/15plus.webp">
                        <p>本遊戲為免費使用，部分內容設計暴力情節及不當言語情節。<br>
                            遊戲內另提供購買虛擬遊戲幣、物品等付費服務。<br>
                            請注意遊戲時間，避免沉迷。​<br>
                            <span class="blue">本遊戲服務區域包含台灣、香港、澳門。</span>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="/js/event/homepage/view.js?v=1.0.1"></script>
    <script src="/js/event/homepage/main.js"></script>
    @yield('script')

</body>

</html>

<script>
    $(window).on('load', function() {
        $("#loading").hide();
    });
</script>
