@extends('front.pageBase')

@section('title')
    <title>《仙俠世界貳》遊戲公告內容</title>
@endsection



@section('textTitle')
    遊戲公告
@endsection



@section('otherCss2')
    <link rel="stylesheet" href="/css/event/homepage/pageAnnouncementContent.css">
@endsection




{{-- 顯示當前位置 --}}
@section('seat')
    當前位置：
    <a href="">首頁</a>&gt;
    <a href=""><span class="currentLocation">最新公告</span></a>
@endsection


{{-- 內文 --}}
@section('textBox')
    <div class="upBox">
        <div class="title">這邊總之是標題</div>
        <div class="time">2023年08月18日 18:00</div>
    </div>
    <div class="line"></div>
    <div class="downBox">
        <p>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
            這邊總之就放內文<br>
        </p>
    </div>
@endsection
