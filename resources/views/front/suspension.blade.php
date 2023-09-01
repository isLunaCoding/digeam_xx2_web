@extends('front.pageBase')

@section('title')
    <title>《仙俠世界貳》停權名單</title>
@endsection

@section('textTitle')
停權名單
@endsection




@section('otherCss2')
    <link rel="stylesheet" href="/css/event/homepage/pageSuspension.css">
@endsection




{{-- 顯示當前位置 --}}
@section('seat')
    <a href=""><span class="currentLocation">停權名單</span></a>
@endsection


{{-- 內文 --}}
@section('textBox')
    <div class="upBox">
        <div class="time">最後更新時間 : <span>2023/08/18 18:00:00</span></div>
    </div>
    <div class="downBox">
        <div class="tableBox">
            <table class="table">
                <thead>
                    <tr>
                        <th width="0.3%">停權日期</th>
                        <th width="0.3%">帳號/角色名稱</th>
                        <th width="5%">說明</th>
                        <th width="3%">懲處結果</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023/08/11</td>
                        <td>XWE0000000000000</td>
                        <td>Win7及其以上64位版</td>
                        <td>Win7及其以上64位版</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
