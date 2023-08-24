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
Route::get('/announcement', function () {
    return view('front/announcement');
});



//後台圖片上傳
Route::post('ckeditor/upload', 'CkeditorUploadController@uploadImage');
Route::post('filePath', 'CkeditorUploadController@getImage')->name('filePath');