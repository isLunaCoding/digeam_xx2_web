@extends('front.pageBase')

@section('title')
    <title>《仙俠世界貳》下載專區</title>
@endsection



@section('otherCss2')
    <link rel="stylesheet" href="/css/event/homepage/pageDownload.css">
@endsection



@section('textTitle')
    下載專區
@endsection



{{-- 顯示當前位置 --}}
@section('seat')
    <span class="currentLocation">下載專區</span>
@endsection


{{-- 內文 --}}
@section('textBox')
    <div class="downloadBox">
        <div class="btn1">
            <a href="https://download.digeam.com/download/s1/xx2/TheMythicalRealm2.exe" class="downloadBtn">下載器 (推薦)</a>
        </div>
        <div class="line"></div>
        <div class="btn2">
            <a href="https://download.digeam.com/download/s1/xx2/rar/TheMythicalRealm2.part1.rar" class="downloadBtn">官網下載_1</a>
            <a href="https://download.digeam.com/download/s1/xx2/rar/TheMythicalRealm2.part2.rar" class="downloadBtn">官網下載_2</a>
            <a href="https://download.digeam.com/download/s1/xx2/rar/TheMythicalRealm2.part3.rar" class="downloadBtn">官網下載_3</a>
            <a href="https://download.digeam.com/download/s1/xx2/rar/TheMythicalRealm2.part4.rar" class="downloadBtn">官網下載_4</a>
            <a href="https://download.digeam.com/download/s1/xx2/rar/TheMythicalRealm2.part5.rar" class="downloadBtn">官網下載_5</a>
        </div>

        <br>
        <br>
        <br>
        <br>
        <ul>
            <p class="ulTitle">遊戲下載說明</p>
            <li>點擊上方連結，選擇下載器或官網下載其中一種方式下載即可。</li>
            <li>安裝前，請確認硬碟內的空間有大於50GB。</li>
            <li>若使用官網下載，請將part1~part5放置到同一資料夾進行解壓縮後，點選Launcher開啟遊戲。</li>
            <li>若下載或安裝有發生任何問題，請透過客服中心聯絡我們。</li>
        </ul>
        <br>
        <p class="tableTitle">硬體需求</p>
        <div class="tableBox">
            <table class="table">
                <thead>
                    <tr>
                        <th width="0.5%">項目</th>
                        <th width="2.5%">最低配備</th>
                        <th width="2%">推薦配備</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>作業系統</td>
                        <td>Win7及其以上64位版</td>
                        <td>Win7及其以上64位版</td>
                    </tr>
                    <tr>
                        <td>CPU</td>
                        <td>主頻1.8G以上</td>
                        <td>主頻3.0G以上</td>
                    </tr>
                    <tr>
                        <td>記憶體</td>
                        <td>4G或更多的內存容量</td>
                        <td>16G或更多的內存容量</td>
                    </tr>
                    <tr>
                        <td>顯示卡</td>
                        <td>nVIDIA GTX650VAMD 6500以上</td>
                        <td>nVIDIA GTX960AMD R9以上</td>
                    </tr>
                    <tr>
                        <td>硬碟空間</td>
                        <td>50GB以上磁盤剩余空間</td>
                        <td>50GB以上磁盤剩余空間</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
