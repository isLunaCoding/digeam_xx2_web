<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <script src="/js/event/launcher/jquery-1.7.2.js" type="text/javascript"></script>
    <script src="/js/event/launcher/js.js" type="text/javascript"></script>
    <link href="/css/event/launcher/launcher.css?v=2.3" rel="stylesheet" type="text/css" />
</head>

<body scroll="no">
    <div class="launch">
        <ul class="notice">
            <li class="carouselBox">
                <div class="container" id="DPic">
                    <div class="container2">
                        <ul class="slider slider2" id="UPic" data-val="3">
                            <li>
                                <a href='' target='_blank'>
                                    <img src='/img/event/launcher/20231003-1.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img src='/img/event/launcher/20231003-2.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img src='/img/event/launcher/20231003-1.jpg'>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="num" id="UNum">
                        @for ($i = 1; $i <= 3; $i++)
                            <li class>
                                <a href>{{ $i }}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </li>
            <li>
                <div id="tabs">
                    <div class="menubox">
                        <ul class="codeDemoUL" id="ulMenu_indexnew">
                            <li class="codeDemomouseOnMenu"
                                onmouseover="showDiv('indexnew',1,3);this.className='codeDemomouseOnMenu'">NEW</li>
                            <li class="codeDemomouseOutMenu"
                                onmouseover="showDiv('indexnew',2,3);this.className='codeDemomouseOnMenu'">活動</li>
                            <li class="codeDemomouseOutMenu"
                                onmouseover="showDiv('indexnew',3,3);this.className='codeDemomouseOnMenu'">系統</li>
                            {{-- <li style="border: 0px !important;margin-left:10px"><a class='more' target="_blank"
                                    href="https://rco.digeam.com/announcement">+More</a></li> --}}
                        </ul>
                        <a class='more' target="_blank" href="https://rco.digeam.com/announcement">More</a>

                    </div>
                    <div class="line"></div>
                    <div id="newlist">
                        <div class="codeDemoDiv" id="divCodeindexnew_1">
                            <div class="newslist2">
                                <ul>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="codeDemoDiv" id="divCodeindexnew_2" style="display:none">
                            <div class="newslist2">
                                <ul>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="codeDemoDiv" id="divCodeindexnew_3" style="display:none">
                            <div class="newslist2">
                                <ul>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>

<script>
    countIMG = $('#UPic').data('val')

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
