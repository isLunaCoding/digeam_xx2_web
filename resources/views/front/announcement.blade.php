@extends('front.pageBase')

@section('title')
    <title>《仙俠世界貳》遊戲公告</title>
@endsection



@section('textTitle')
    遊戲公告
@endsection



@section('otherCss2')
    <link rel="stylesheet" href="/css/event/homepage/pageAnnouncement.css">
@endsection




{{-- 顯示當前位置 --}}
@section('seat')
    <a href=""><span class="currentLocation">最新公告</span></a>
@endsection


{{-- 內文 --}}
@section('textBox')
    <div class="tabBox">
        <button class="newsBtn newsBtnNA new" data-news="NA">NEW</button>
        <button class="newsBtn newsBtnNB activity" data-news="NB">活動</button>
        <button class="newsBtn newsBtnNC systemBox" data-news="NC">系統</button>
    </div>
    <div class="line"></div>
    <div class="newsContainer">
        <div class="textNA">
            <ul>
                <li class="textli">
                    <a class="TOP" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
                <li class="textli">
                    <a class="NEW" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                </li>
                <div class="newsLine"></div>
            </ul>
        </div>
        <div class="textNB">2</div>
        <div class="textNC">3</div>
    </div>
    <nav>這邊放頁碼</nav>
@endsection
