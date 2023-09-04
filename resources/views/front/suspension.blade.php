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
        <div class="time">最後更新時間 : <span>{{ $last_time }}</span></div>
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
                    @foreach ($user_list as $value)
                        <tr>
                            <td>{{ date('Y/m/d', strtotime($value->created_at)) }}</td>
                            <td>{{ $value->user_id }}/{{ $value->char_name }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->punish }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
