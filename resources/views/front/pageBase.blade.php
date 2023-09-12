@extends('front.head')

{{-- 網頁各自名稱 --}}
@section('title')
@endsection


@section('otherCss')
    <link rel="stylesheet" href="/css/event/homepage/pageBase.css">
    @yield('otherCss2')
@endsection



@section('backHome')
    <a class="backHome" href={{ route('index') }}>&#9668; &nbsp; 回到首頁</a>
@endsection


{{-- 分頁共用樣式 --}}
@section('sectionPage')
    <div class="sectionPage">
        <div class="sectionBG">
            <div class="container">
                <div class="btnBoxLeft">
                    <a target="_blank" class="buttonDownload" href="{{ route('download') }}"><img
                        src="/img/event/homepage/buttonDownload.jpg"></a>
                <div class="btnBox2">
                    <a class="register" target="_blank" href="https://www.digeam.com/register">
                        <img src="/img/event/homepage/imgRegister.png">
                        帳號註冊
                    </a>
                    <a class="addValue" target="_blank" href="https://www.digeam.com/member/billing">
                        <img src="/img/event/homepage/imgAddValue.png">
                        儲值中心
                    </a>
    
                    <div class="btnBox3">
                        <a class="OTP" target="_blank" href="https://www.digeam.com/member/enable">
                            <img src="/img/event/homepage/imgOTP.png">
                            OTP申請
                        </a>
                        <div class="line"></div>
                        <a class="customerService" target="_blank" href="https://www.digeam.com/cs">
                            <img src="/img/event/homepage/imgCustomerService.png">
                            聯繫客服
                        </a>
                    </div>
    
                </div>
                </div>
                <div class="boxRight">
                    <div class="textTitle">
                        {{-- 網頁分類大標題 --}}
                        @yield('textTitle')
                    </div>
                    <div class="textBox">
                        <div class="seat">
                            當前位置：
                            <a href={{ route('index') }}>首頁</a>&gt;
                            @yield('seat')
                        </div>
                        {{-- 內文 --}}
                        @yield('textBox')
                    </div>
                </div>
            </div>
            @yield('boxDown')
        </div>
    </div>
@endsection
