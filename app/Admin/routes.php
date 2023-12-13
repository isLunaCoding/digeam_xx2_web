<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/prereg_user', 'prereg\PreregUserController');
    $router->resource('/draw_card_chance_log', 'prereg\DrawCardChanceLogController');
    $router->resource('/panda_guess_log', 'prereg\PandaGuessLogController');
    $router->resource('/buylog', 'cbt\BuyLogController');
    $router->resource('/playlog', 'cbt\PlayLogController');
    $router->resource('/playuser', 'cbt\PlayUserController');
    $router->resource('/report', 'cbt\ReportController');
    $router->resource('category', 'CategoryController');
    $router->resource('wiki', 'WikiController');
    $router->resource('announcement', 'AnnouncementController');
    $router->resource('suspension_lists', 'SuspensionController');
    $router->resource('image', 'ImageController');
    $router->resource('game_features', 'GameFeaturesController');
    $router->resource('serialnumbercate', 'SerialNumberCateController');
    $router->resource('{number}/serial_number', 'SerialNumberController');
    $router->resource('{id}/serial_item', 'SerialitemController');
    $router->resource('rewardLog', 'RewardLogController');
    $router->resource('launcherimg', 'launcherController');
    $router->resource('send', 'sendItemController');
    $router->resource('sendItemList', 'sendItemListController');
    $router->resource('sendItemLog', 'sendItemLogController');
    $router->resource('shop', 'ShopController');
    $router->resource('/shop_banner', 'ShopBannerController');
    $router->resource('/shop_buy_record', 'ShopBuyRecordController');
    $router->resource('/shop_user_record', 'ShopUserRecordController');
    $router->resource('/shop_send_record', 'ShopSendRecordController');
    $router->resource('{id}/shop_item_list', 'ShopItemListController');
});
