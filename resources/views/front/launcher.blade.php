<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    {{-- <script src="/js/event/launcher/jquery-1.7.2.js" type="text/javascript"></script> --}}
    <script src="/js/event/launcher/js.js?v=2.4" type="text/javascript"></script>
    <script src="/js/event/homepage/swiper.js"></script>
    <link href="/css/event/launcher/launcher.css?v=2.4" rel="stylesheet" type="text/css" />
</head>

<body scroll="no">
    <div class="launch">
        <ul class="notice">
            <div class="carouselBox">
                <div class="container" id="DPic">
                    <ul class="num" id="UNum">
                        <li class>
                            <a href=""></a>
                        </li>
                        <li class>
                            <a href=""></a>
                        </li>
                        <li class>
                            <a href=""></a>
                        </li>
                        <li class>
                            <a href=""></a>
                        </li>
                        <li class>
                            <a href=""></a>
                        </li>
                        <li class>
                            <a href=""></a>
                        </li>
                        <li class>
                            <a href=""></a>
                        </li>
                        <li class>
                            <a href=""></a>
                        </li>
                    </ul>
                    <div class="container2">
                        <ul class="slider slider2" id="UPic" data-val="8">
                            <li>
                                <a href='' target='_blank'>
                                    <img src='upload/game_features/section3_BN002.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img  src='upload/game_features/section3_BN002.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img  src='upload/game_features/section3_BN002.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img  src='upload/game_features/section3_BN002.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img  src='upload/game_features/section3_BN002.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img  src='upload/game_features/section3_BN002.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img  src='upload/game_features/section3_BN002.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img  src='upload/game_features/section3_BN002.jpg'>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="tabs">
                <div class="menubox">
                    <ul class="codeDemoUL" id="ulMenu_indexnew">
                        <li class="codeDemomouseOnMenu"
                            onmouseover="showDiv('indexnew',1,3);this.className='codeDemomouseOnMenu'">NEW</li>
                        <li class="codeDemomouseOutMenu"
                            onmouseover="showDiv('indexnew',2,3);this.className='codeDemomouseOnMenu'">活動</li>
                        <li class="codeDemomouseOutMenu"
                            onmouseover="showDiv('indexnew',3,3);this.className='codeDemomouseOnMenu'">系統</li>
                    </ul>
                    <a class='more' target="_blank" href="https://rco.digeam.com/announcement">More</a>
                </div>
                <div class="line"></div>
                <div id="newlist">
                    <div class="codeDemoDiv" id="divCodeindexnew_1">
                        <div class="newslist2">
                            <ul>
                                <li>
                                    <a href="" class="new">
                                        <div class="textBox">
                                            <div class="textTitle">仙俠世界貳》事前預約開放中！</div>
                                            <div class="textTime">2023/09/18</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="top">
                                        <div class="textBox">
                                            <div class="textTitle">11255555555511111111111111111《仙俠世界貳》事前預約開放中！</div>
                                            <div class="textTime">2023/09/18</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="normal">
                                        <div class="textBox">
                                            <div class="textTitle">《仙俠世界貳》事前預約開放中！</div>
                                            <div class="textTime">2023/09/18</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="normal">
                                        <div class="textBox">
                                            <div class="textTitle">《仙俠世界貳》事前預約開放中！</div>
                                            <div class="textTime">2023/09/18</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="normal">
                                        <div class="textBox">
                                            <div class="textTitle">《仙俠世界貳》事前預約開放中！</div>
                                            <div class="textTime">2023/09/18</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="codeDemoDiv" id="divCodeindexnew_2" style="display:none">
                        <div class="newslist2">
                            <ul>
                                <li><a href="" target="_blank"></a><span></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="codeDemoDiv" id="divCodeindexnew_3" style="display:none">
                        <div class="newslist2">
                            <ul>
                                <li><a href="" target="_blank"></a><span></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</body>

</html>

<script>
    countIMG = $('#UPic').data('val');
    console.log(countIMG);

    function showDiv(C, B, D) {
        for (var A = 1; A <= D; A++) {
            document.getElementById("divCode" + C + "_" + String(A)).style.display = "none"
        }
        document.getElementById("divCode" + C + "_" + B).style.display = "block";
        for (var A in document.getElementById("ulMenu_" + C).getElementsByTagName("LI")) {
            document.getElementById("ulMenu_" + C).getElementsByTagName("LI")[A].className = "codeDemomouseOutMenu"
        }
    }
    $(document).ready(function() {
        LoadPicRun("DPic", "UPic", "UNum", 566, countIMG);
    });
</script>
