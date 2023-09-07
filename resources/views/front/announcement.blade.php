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
        <a href="{{ route('announcement', 'new') }}" class="newsBtn newsBtnNA new " data-news="NA">NEW</a>
        <a href="{{ route('announcement', 'activity') }}" class="newsBtn newsBtnNB activity" data-news="NB">活動</a>
        <a href="{{ route('announcement', 'system') }}" class="newsBtn newsBtnNC systemBox" data-news="NC">系統</a>
    </div>
    <div class="line"></div>
    <div class="newsContainer">
        <div class="text textNA">
            <ul>
                @foreach ($list as $key => $value)
                    <li class="textli">
                        @if ($value['top'] == 'Y')
                            <a class="TOP" href="{{ route('announcementContent', [$value->id]) }}">
                            @elseif($value['new'] == 'Y')
                                <a class="NEW" href="{{ route('announcementContent', [$value->id]) }}">
                                @else
                                    <a class="normal" href="{{ route('announcementContent', [$value->id]) }}">
                        @endif
                        <div class="newsTextBox">
                            @if ($value['cate_id'] == 3)
                                <div class="newsTextTitle">【系統】 {{ $value['title'] }}</div>
                            @else
                                <div class="newsTextTitle">【活動】 {{ $value['title'] }}</div>
                            @endif
                            <div class="newsTextTime">{{ date('Y/m/d', strtotime($value->created_at)) }}</div>
                        </div>
                        </a>
                        <div class="newsLine"></div>
                @endforeach
            </ul>
        </div>
        <div class="text textNB"></div>
        <div class="text textNC"></div>
    </div>
    <nav>
        <ul class="pagination">
            {!! $list->links() !!}
        </ul>
    </nav>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;

            if (currentUrl.includes("/announcement/activity")) {
                $(".systemBox").removeClass("active");
                $(".new").removeClass("active");
                $(".activity").addClass("active");
            } else if (currentUrl.includes("/announcement/new")) {
                $(".systemBox").removeClass("active");
                $(".activity").removeClass("active");
                $(".new").addClass("active");
            } else if (currentUrl.includes("/announcement/system")) {
                $(".new").removeClass("active");
                $(".activity").removeClass("active");
                $(".systemBox").addClass("active");
            }

            $(".newsTab .newsBtn").on("click", function() {
                $(".newsContainer .text").hide();
                $(".newsBtn").removeClass("active");
                $(this).addClass("active");
                $(".newsContainer .text").hide();
                $(".text" + this.dataset.news + "").show();
            });
        });
    </script>
@endsection
