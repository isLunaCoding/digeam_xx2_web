<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <link href="/css/event/launcher/common.css" rel="stylesheet" type="text/css">
    <link href="/css/event/launcher/news_style.css" rel="stylesheet" type="text/css">
    <script src="/js/event/launcher/jquery.min.js"></script>
    <script src="/js/event/launcher/jquery.SuperSlide.2.1.1.js"></script>
    <script src="/js/event/launcher/news.js?v=1.0.1"></script>
</head>

<body scroll="no">
    <div class="index-container">
        <!-- 圖片 -->
        <div id="slideBox" class="slideBox">
            <div class="item-wrapper">
                <ul>
                    @foreach ($images as $image)
                        <li style="display: none;"><a href={{ $image['url'] }} title="" target="_blank"><img
                                    src={{ $image['file_name'] }}></a></li>
                    @endforeach

                </ul>
            </div>
            <div class="hd">
                <ul>
                    <li class="">1</li>
                    <li class="">2</li>
                    <li class="">3</li>
                    <li class="">4</li>
                    <li class="on">5</li>
                    <li class="">6</li>
                    <li class="">7</li>
                    <li class="">8</li>
                </ul>
            </div>
            <!--template::ssi_p2p_focus_v3.tpl-->
        </div>
        <!-- 新闻内容 -->
        <div class="news-container">
            <!-- 链接 -->
            <div class="head">
                <a href="javascript:;">NEW</a>
                <a href="javascript:;">活動</a>
                <a href="javascript:;">系統</a>
                <a class="more" href="https://xx2.digeam.com/announcement/new">More</a>
            </div>
            <div class="line"></div>
            <!-- 内容 -->
            <div class="context">
                <ul class="swiper-slide" style="display: none;">
                    @foreach ($NA as $value)
                        @if ($value['top'] == 'Y')
                            <li class="even">
                                <span class="colum1">TOP</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @elseif($value['new'] == 'Y')
                            <li class="even">
                                <span class="colum1">NEW</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @else
                            <li class="even">
                                <span class="colum1 blue">&#9656</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <ul class="swiper-slide" style="display: none;">
                    @foreach ($NB as $value)
                        @if ($value['top'] == 'Y')
                            <li class="even">
                                <span class="colum1">TOP</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @elseif($value['new'] == 'Y')
                            <li class="even">
                                <span class="colum1">NEW</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @else
                            <li class="even">
                                <span class="colum1 blue">&#9656</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <ul class="swiper-slide" style="display: none;">
                    @foreach ($NC as $value)
                        @if ($value['top'] == 'Y')
                            <li class="even">
                                <span class="colum1">TOP</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @elseif($value['new'] == 'Y')
                            <li class="even">
                                <span class="colum1">NEW</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @else
                            <li class="even">
                                <span class="colum1 blue">&#9656</span>
                                <span class="colum2"><a href="{{ $value['url'] }}"
                                        target="_blank">{{ $value['title'] }}</a></span>
                                <span class="colum3">{{ date('Y/m/d', strtotime($value['created_at'])) }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
