<script>
    if (document.documentMode) {
        alert('建議使用Edge或者Chrome瀏覽器進行瀏覽')
    }
</script>

<!DOCTYPE html>
<html lang="zh-TW" class="html">

<head>
    <meta charset="UTF-8">

    <title>《仙俠世界貳》遊戲百科</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Digeam 掘夢網,線上遊戲,免費遊戲,3D">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">{{-- 官網連結 --}}
    <meta property="og:title" content="">
    <meta property="article:author" content="https://www.facebook.com">

    {{-- 連結縮圖 --}}
    @yield('thumbnail')

    <link rel="icon" href="/img/event/prereg/favicon.ico" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="/css/event/homepage/wiki.css">

</head>

<body>
    <div class="wrap">

        <div class="main">
            <div class="mainBG">
                <div class="topBox">
                    <nav class="leftBox">
                        <ul>
                            <li><a href="#"><img src="/img/event/wiki/LOGO.png"></a></li>
                            <li>
                                <div class="serch">
                                    <form id="serchForm" action=".php" method="post">
                                        <input type="text" name="serch" placeholder="搜尋...">
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <nav class="iconBox">
                        <ul>
                            <li><a href="#"><img src="/img/event/wiki/social_icon_fb.png"></a></li>
                            <li><a href="#"><img src="/img/event/wiki/social_icon_dc.png"></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="mainBox">
                    <menu class="menu">
                        <ul>
                            <li><a href="">回到官網</a></li>
                            <li>
                                <a href="">大標題</a>
                                <ul>
                                    <li>
                                        <a href="">中標題</a>
                                        <ul>
                                            <li><a href="">小標題</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </menu>
                    <div class="mainTextBox">
                        {{-- <footer class="footer">
                            <div class="footerBox">
                                <div class="footerbox_logo">
                                    <img class="digeamlogo" src="/img/event/wiki/logo_digeam.png">
                                    <img class="giantlogo" src="/img/event/wiki/GIANT_logo.png">
                                </div>
                                <div class="copyright">
                                    <a href="https://www.digeam.com/terms">會員服務條款</a>
                                    <a href="https://www.digeam.com/terms2">隱私條款</a>
                                    <p>掘夢網股份有限公司©2023<br>Copyright©DiGeam Corporation.<br>All Rights Reserved.</p>
                                </div>
                                <div class="plus">
                                    <img class="plus15" src="/img/event/wiki/15plus.png">
                                    <p>本遊戲為免費使用，部分內容涉及暴力情節。<br>
                                        遊戲內另提供購買虛擬遊戲幣、物品等付費服務。<br>
                                        請注意遊戲時間，避免沉迷。​<br>
                                        <span class="blue">本遊戲服務區域包含台灣、香港、澳門。</span>
                                    </p>
                                </div>
                            </div>
                        </footer> --}}
                    </div>
                </div>
                

            </div>
        </div>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</body>

</html>
