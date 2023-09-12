@extends('front.pageBase')

@section('title')
    <title>《仙俠世界貳》序號兌換</title>
@endsection



@section('otherCss2')
    <link rel="stylesheet" href="/css/event/homepage/pageExchange.css">
@endsection



@section('textTitle')
    序號兌換
@endsection



{{-- 顯示當前位置 --}}
@section('seat')
    <a href=""><span class="currentLocation">序號兌換</span></a>
@endsection


{{-- 內文 --}}
@section('textBox')
    <div class="exchangePlayerInfo">
        @if (isset($_COOKIE['StrID']) && isset($_COOKIE['StrID']) != null)
            <p class="account">Hi,<span>{{ $_COOKIE['StrID'] }}</span></p>
            <form id="logout-form" action="https://www.digeam.com/logout" method="POST" style="display: none;">
                <input type="hidden" name="return_url" id="return_url"
                    value={{ base64_encode('https://xx2.digeam.com/exchange') }}>
            </form>
            <button class="logout" onclick="logout_dg()">登出</button>
        @else
            <p class="account">Hi,請先登入帳號<span></span></p>
            <a href="https://digeam.com/login">
                <button class="login">登入</button>
            </a>
        @endif

    </div>

    <div id="exchangeForm">
        <select name="server" id="server">
            <option value="" disabled selected>伺服器</option>
            <option value="1801">十方鎮</option>
        </select>
        <select name="character" id="character">
            <option value="" disabled selected>角色名稱</option>
        </select>
        <input type="text" name="serial_num" id="serial_num" placeholder="請輸入活動序號">
        <button class="submit" type="submit" onclick="ex_submit()">兌換</button>
    </div>

    <div class="exchangeLine"></div>
    <div class="exchangePoint">
        ※序號兌換後無法改變使用對象，兌換前請確認選擇的伺服器、角色無誤。<br>​
        ※<a href="">兌換序號由此查詢</a>
    </div>
@endsection


@section('script')
    <script src="/js/event/homepage/exchange.js"></script>
@endsection
