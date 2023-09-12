@extends('front.pageBase')

@section('title')
    <title>《仙俠世界貳》領獎專區</title>
@endsection

@section('textTitle')
    領獎專區
@endsection




@section('otherCss2')
    <link rel="stylesheet" href="/css/event/homepage/pageReceiveAward.css">
@endsection




{{-- 顯示當前位置 --}}
@section('seat')
    <a href=""><span class="currentLocation">領獎專區</span></a>
@endsection




{{-- 內文 --}}
@section('textBox')
    <div id="serchForm">
        <div class="serchBox">
            <input type="text" name="keyword" id="keyword" placeholder="請輸入活動關鍵字">
            <select name="year" id="year">
                <option value="0" selected>&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <?php
                        $nowyear = date('Y');
                        for ($i=2023;$i<=$nowyear+1;$i++) {
                    ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                        }
                    ?>
            </select>
            <select name="month" id="month">
                <option value="0" selected>&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <?php
                        for ($i=1;$i<=12;$i++) {
                    ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                        }
                    ?>
            </select>
            <a href="javascript:keywordWall();" class="submit" type="submit">搜尋</a>
        </div>
    </div>

    <div class="awardTitleBox">
        <div class="actionName">活動名稱</div>
        <div class="actionTime">領獎時間</div>
    </div>
    <div class="awardTitleContent">
        <ul class="awardList">
        </ul>
    </div>
    <nav>
        <ul class="pagination">
        </ul>
    </nav>
@endsection

@section('boxDown')
    <div class="boxDown" id="boxDown">
        <div class="emptyBox"></div>
        <div class="awardActionContent">
            <img src="img/event/homepage/awardTriangle.png" alt="">
            <div class="actionTitle show_title"></div>
            <div class="boxBG">
                <div class="playerInfo">
                    @if (isset($_COOKIE['StrID']) && isset($_COOKIE['StrID']) != null)
                        <form id="logout-form" action="https://www.digeam.com/logout" method="POST" style="display: none;">
                            <input type="hidden" name="return_url" id="return_url"
                                value={{ base64_encode('https://xx2.digeam.com/reward') }}>
                        </form>
                        <p class="account">Hi,<span>{{ $_COOKIE['StrID'] }}</span></p>
                        <form id="playerFrorm" action="process2.php" method="post">
                            <label for="server"></label>
                            <select name="server" id="server" required>
                                <option value="0" disabled selected>請選擇伺服器</option>
                                <option value="1801">十方鎮</option>
                            </select>
                            <select name="character" id="character" required>
                                <option value="0" disabled selected>請選擇角色</option>
                            </select>
                        </form>
                            <button class="logout" onclick="logout_dg()">登出</button>
                    @else
                        <p class="account"><span></span></p>
                        @php
                            $_COOKIE_DOMAIN = '.digeam.com';
                            SetCookie('return_url', base64_encode('https://xx2.digeam.com/reward'), 0, '/', $_COOKIE_DOMAIN);
                        @endphp
                        <a class="login" href="https://digeam.com/login">登入</a>
                    @endif
                </div>
                <div class="actionInfo">
                    <table class="actionTable">
                        <thead>
                            <tr>
                                <td width="0.4%">名稱</td>
                                <td width="0.6%">獎勵</td>
                                <td width="1.8%">說明</td>
                                <td width="0.1%">領取狀態</td>
                                <td width="0.2%">剩餘次數</td>
                            </tr>
                        </thead>
                        <tbody class="show_content">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="/js/event/homepage/receive.js"></script>
@endsection
