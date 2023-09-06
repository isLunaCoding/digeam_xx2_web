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
    {{-- <p class="account">Hi,<span>XWE0000000000000</span></p>
    <button class="logout">登出</button> --}}
    <p class="account">Hi,請先登入帳號<span></span></p>
    <button class="login">登入</button>
</div>

    <form id="exchangeForm" action="process1.php" method="post">
        <select name="server" id="server">
            <option value="" disabled selected>伺服器</option>
            <option value="1801">1801</option>
        </select>
        <select name="character" id="character">
            <option value="" disabled selected>角色名稱</option>
            {{-- <option value="123">123</option> --}}
        </select>
        <input type="text" name="serial_num" id="serial_num" placeholder="請輸入活動序號">
        <button class="submit" type="submit" onclick="ex_submit()">兌換</button>
    </form>

    <div class="exchangeLine"></div>
    <div class="exchangePoint">
        ※序號兌換後無法改變使用對象，兌換前請確認選擇的伺服器、角色無誤。<br>​
        ※<a href="">兌換序號由此查詢</a>
    </div>
@endsection


@section('script')
    <script src="/js/event/homepage/exchange.js"></script>
@endsection