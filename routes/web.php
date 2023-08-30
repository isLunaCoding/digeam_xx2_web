<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['setReturnUrl'])->group(function () {
    // 事前預約
    Route::get('/prereg', function () {
        return view('event/prereg_index');
    });
});

// 官網
Route::get('/index', function () {
    return view('front/index');
});
// 公告
Route::get('/announcement', function () {
    return view('front/announcement');
});
Route::get('/announcementContent', function () {
    return view('front/announcementContent');
});
// 領獎專區
Route::get('/receiveAward', function () {
    return view('front/receiveAward');
});
// 序號兌換
Route::get('/exchange', function () {
    return view('front/exchange');
});
// 下載
Route::get('/download', function () {
    return view('front/download');
});
// 遊戲規章
Route::get('/regulations', function () {
    return view('front/regulations');
});
// 百科
Route::get('/wiki', function () {
    return view('front/wiki');
});



//後台圖片上傳
Route::post('ckeditor/upload', 'CkeditorUploadController@uploadImage');
Route::post('filePath', 'CkeditorUploadController@getImage')->name('filePath');