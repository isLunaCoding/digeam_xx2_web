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
        <a href="#" class="newsBtn newsBtnNA new" data-news="NA">NEW</a>
        <a href="#"  class="newsBtn newsBtnNB activity" data-news="NB">活動</a>
        <a href="#"  class="newsBtn newsBtnNC systemBox" data-news="NC">系統</a>
    </div>
    <div class="line"></div>
    <div class="newsContainer">
        <div class="text textNA">
            <ul>
                <li class="textli">
                    <a class="TOP" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="NEW" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>
                <li class="textli">
                    <a class="normal" href="">
                        <div class="newsTextBox">
                            <div class="newsTextTitle">【系統】 01/30(五) 測試內容非正式525563255635</div>
                            <div class="newsTextTime">2023/08/21</div>
                        </div>
                    </a>
                    <div class="newsLine"></div>
                </li>

            </ul>
        </div>
        <div class="text textNB">2</div>
        <div class="text textNC">3</div>
    </div>
    <nav>
        <ul class="pagination">
            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">‹</span>
            </li>
            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="">2</a></li>
            <li class="page-item">
                <a class="page-link" href="" rel="next" aria-label="Next »">›</a>
            </li>
        </ul>
    </nav>
@endsection

@section('script')
    <script>
        $(".newsContainer .text").hide();
        $(".newsContainer .textNA").show();
        $(".new").addClass("active");
        $(".tabBox .newsBtn").on("click", function() {
            $(".newsContainer .text").hide();
            $(".newsBtn").removeClass("active");
            $(this).addClass("active");
            $(".newsContainer .text").hide();
            $(".text" + this.dataset.news + "").show();
        });
    </script>
@endsection
