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

Route::middleware(['setReturnUrl'])->group(function () {
    // 領獎專區
    Route::get('/reward', function () {
        return view('front/receiveAward');
    })->name('reward');
    // 序號兌換
    Route::get('/exchange', function () {
        return view('front/exchange');
    })->name('exchange');

});

// 官網
Route::get('/index', 'front\indexController@index')->name('index');
Route::get('/', 'front\indexController@index');
// 公告
Route::get('/announcement/{cate?}', 'front\announcementController@index')->name('announcement');
Route::get('announcementContent/{id}', 'front\announcementcontentController@index')->name('announcementContent');

// 遊戲規章
Route::get('/regulations', function () {
    return view('front/regulations');
})->name('regulations');

//停權名單
Route::get('/suspension', 'front\suspensionController@index')->name('suspension');

// launcher
Route::get('/launcher', 'front\indexController@launcher')->name('launcher');

// 百科
Route::get('/wiki/{id?}', 'front\wikiController@index')->name('wiki');
// Route::get('wikiSearch/{keyword?}', 'front\wikiController@search');
// 下載
Route::get('/download', function () {
    return view('front.download');
})->name('download');
// CBT
Route::get('/CBT', 'front\CBTController@index');
// Route::get('/CBT', function () {
//     return view('event/CBT');
// });
//後台圖片上傳
Route::post('ckeditor/upload', 'CkeditorUploadController@uploadImage');
Route::post('filePath', 'CkeditorUploadController@getImage')->name('filePath');
//obt
Route::get('/OBT', function () {
    return view('event/OBT');
});
    // 事前預約
Route::get('/prereg', function () {
        return redirect('/');
    });
Route::get('redis', 'RedisController@index');
Route::get('/20231116', function () {
        return view('event/20231116_index');
    });
    