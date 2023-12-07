<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('prereg', 'API\event\preregController@index');
Route::get('service_api', 'Services\ServicesController@index');
Route::post('reward', 'API\rewardController@index');
Route::post('cbt', 'API\event\CBTController@index');
Route::post('exchange', 'API\SerialNumberController@index');
Route::post('digeamIndexNews', 'API\DigeamController@IndexNews')->name('IndexNews');
Route::post('addReward', 'API\rewardController@myCardEvent')->name('addReward');
Route::post('shop', 'API\ShopController@index')->name('Shop');
