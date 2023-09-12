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
                        <a href={{ route('index') }}><img src="/img/event/wiki/LOGO.png"></a>

                        <div class="serch">
                            <form id="serchForm" action="" method="GET">
                                <input type="text" name="keyword" placeholder="搜尋...">
                            </form>
                        </div>

                    </nav>
                    <nav class="iconBox">
                        <a href="https://discord.gg/gpXjMWGd"><img src="/img/event/wiki/social_icon_dc.png"></a>
                        <a href="https://www.facebook.com/DiGeamXianXia2"><img src="/img/event/wiki/social_icon_fb.png"></a>
                    </nav>
                </div>

                <div class="mainBox">
                    <menu class="menu">
                        <div class="menuBox">

                            @foreach ($sec_cate as $value)
                                {{-- 只有大標題有內文 --}}
                                @if ($value['count'] != 0 && $value['parent_id'] == 0)
                                    <ul class="frontTitle">
                                        <a
                                            href="{{ route('wiki', $all_page[$value['cate_id']][0]['id']) }}">{{ $value['title'] }}</a>
                                    </ul>
                                @endif

                                {{-- 是大標題還有中標題 --}}
                                @if ($value['count'] == 0 && $value['parent_id'] == 0)
                                    <ul class="frontTitle">
                                        {{ $value['title'] }}
                                        @foreach ($sec_cate as $value2)
                                            @if ($value2['parent_id'] == $value['id'])
                                                {{-- 只到中標題 --}}
                                                @if ($value2['count'] == 0)
                                                    <li class="liMiddle"><a
                                                            href="{{ route('wiki') }}">{{ $value2['title'] }}</a>
                                                    </li>
                                                @elseif($value2['count'] == 1)
                                                    <li class="liMiddle"><a
                                                            href="{{ route('wiki', $all_page[$value2['cate_id']][0]['id']) }}">{{ $value2['title'] }}</a>
                                                    </li>
                                                @else
                                                    <li class="liMiddle"><a href="">{{ $value2['title'] }}</a>
                                                        <ul>
                                                            @for ($i = 0; $i < $value2['count']; $i++)
                                                                <li class="liSamll"><a
                                                                        href="{{ route('wiki', $all_page[$value2['cate_id']][$i]['id']) }}">{{ $all_page[$value2['cate_id']][$i]['title'] }}</a>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                    </li>
                                @endif
                            @endforeach
                        </div>
                    </menu>
                    <div class="rightBox">
                        <div class="mainTextBox">
                            @if ($type == 'content')
                                <div class="title">{{ $page['title'] }}</div>
                                <div class="line"></div>
                                <div class="text">{!! $page['content'] !!}</div>
                            @endif
                            @if ($type == 'search' && count($result) != 0)
                                @for ($i = 0; $i < count($result); $i++)
                                    <div class="title">{{ $result[$i]['title'] }}</div>
                                    <div class="line"></div>
                                    <div class="text2">{!! $result[$i]['content'] !!}</div>
                                    <button class="continueBtn"
                                        onclick="location.href='{{ route('wiki', $result[$i]['id']) }}'">繼續閱讀
                                        →</button>
                                @endfor
                            @endif
                            @if ($type == 'search' && count($result) == 0)
                                <div class="title">找不到</div>
                                <div class="line"></div>
                                <div class="text2">抱歉，沒東西符合你的搜尋條件。請試試其他不同關鍵字。</div>
                            @endif
                        </div>

                        <footer class="footer">
                            <div class="footerBox">
                                <div class="footerbox_logo">
                                    <a href="https://www.digeam.com/index"><img class="digeamlogo" src="/img/event/wiki/logo_digeam.png"></a>
                                    <img class="giantlogo" src="/img/event/wiki/GIANT_logo.png">
                                </div>
                                <div class="copyright">
                                    <a href="https://www.digeam.com/terms">會員服務條款</a>
                                    <a href="https://www.digeam.com/terms2">隱私條款</a>
                                    <p>掘夢網股份有限公司©2023 Copyright©DiGeam Corporation.<br>All Rights Reserved.</p>
                                </div>
                                <div class="plus">
                                    <img class="plus15" src="/img/event/wiki/15plus.png">
                                    <p>本遊戲為免費使用，部分內容涉及暴力情節。
                                        請注意遊戲時間，避免沉迷。​<br>
                                        遊戲內另提供購買虛擬遊戲幣、物品等付費服務。<br>
                                        <span class="blue">本遊戲服務區域包含台灣、香港、澳門。</span>
                                    </p>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>


            </div>
        </div>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        // menu點擊、hover
        $(document).ready(function() {
            $('.frontTitle').on('click', function() {
                var liMiddle = $(this).find('.liMiddle');
                liMiddle.slideToggle();

                liMiddle.one('mouseenter', function() {
                    var liSamll = $(this).find('.liSamll');
                    liSamll.slideToggle();

                    liSamll.on('click', function(event) {
                        event.preventDefault();
                        var link = $(this).find('a').attr('href');

                        setTimeout(function() {
                            window.location.href = link;
                        }, 500);

                    })
                });
            });
        });

        // serch 按下enter發送資訊
        $(document).ready(function() {
            $('#serchForm input[name="serch"]').on('keypress', function(event) {
                if (event.which === 13) {
                    event.preventDefault();
                    $('#serchForm').submit();
                }
            });
        });
    </script>

</body>

</html>
