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
    <form id="serchForm" action="process1.php" method="post">
        <div class="serchBox">
            <input type="text" name="input1" placeholder="請輸入活動關鍵字">
            <select name="year" id="year">
                <option value="" disabled selected>&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="123">123</option>
            </select>
            <select name="month" id="month">
                <option value="" disabled selected>&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="123">123</option>
            </select>
            <button class="submit" type="submit">搜尋</button>
        </div>
    </form>

    <div class="awardTitleBox">
        <div class="actionName">活動名稱</div>
        <div class="actionTime">領獎時間</div>
    </div>
    <div class="awardTitleContent">
        <ul>
            <li>
                <a class="normal" href="">
                    <div class="awardTextBox">
                        <div class="awardTextTitle">8/11 ~ 8/31 活動名稱123</div>
                        <div class="awardTextTime">2023/08/21 ~ 2023/09/01</div>
                    </div>
                </a>
                <div class="awardLine"></div>
            </li>
            <li>
                <a class="normal" href="">
                    <div class="awardTextBox">
                        <div class="awardTextTitle">8/11 ~ 8/31 活動名稱123</div>
                        <div class="awardTextTime">2023/08/21 ~ 2023/09/01</div>
                    </div>
                </a>
                <div class="awardLine"></div>
            </li>
            <li>
                <a class="normal" href="">
                    <div class="awardTextBox">
                        <div class="awardTextTitle">8/11 ~ 8/31 活動名稱123</div>
                        <div class="awardTextTime">2023/08/21 ~ 2023/09/01</div>
                    </div>
                </a>
                <div class="awardLine"></div>
            </li>
            <li>
                <a class="normal" href="">
                    <div class="awardTextBox">
                        <div class="awardTextTitle">8/11 ~ 8/31 活動名稱123</div>
                        <div class="awardTextTime">2023/08/21 ~ 2023/09/01</div>
                    </div>
                </a>
                <div class="awardLine"></div>
            </li>
            <li>
                <a class="normal" href="">
                    <div class="awardTextBox">
                        <div class="awardTextTitle">8/11 ~ 8/31 活動名稱123</div>
                        <div class="awardTextTime">2023/08/21 ~ 2023/09/01</div>
                    </div>
                </a>
                <div class="awardLine"></div>
            </li>
        </ul>
    </div>
@endsection

@section('boxDown')
    <div class="boxDown">
        <div class="emptyBox"></div>
        <div class="awardActionContent">
            <img src="img/event/homepage/awardTriangle.png" alt="">
            <div class="actionTitle">8/11 ~ 8/31 活動名稱123</div>
            <div class="boxBG">
                <div class="playerInfo">
                    <p class="account">Hi,<span>XWE0000000000000</span></p>
                    <form id="playeFrorm" action="process2.php" method="post">
                        <label for="server"></label>
                        <select name="server" id="server">
                            <option value="" disabled selected>請選擇伺服器</option>
                            <option value="123">123</option>
                        </select>
                        <select name="character" id="character">
                            <option value="" disabled selected>請選擇角色</option>
                            <option value="123">123</option>
                        </select>
                    </form>
                    <button class="logout">登出</button>
                    {{-- <button class="login">登入</button> --}}
                </div>
                <div class="actionInfo">
                    <table class="actionTable">
                        <thead>
                            <tr>
                                <td>名稱</td>
                                <td>獎勵</td>
                                <td>說明</td>
                                <td>領取狀態</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>名稱</td>
                                <td>獎勵</td>
                                <td>說明</td>
                                <td>
                                    <button class="receive">領取</button>
                                </td>
                            </tr>
                            <tr>
                                <td>名稱</td>
                                <td>獎勵</td>
                                <td>說明</td>
                                <td>
                                    <button class="cannotReceive">領取</button>
                                </td>
                            </tr>
                            <tr>
                                <td>名稱</td>
                                <td>獎勵</td>
                                <td>說明</td>
                                <td>
                                    已領取
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
