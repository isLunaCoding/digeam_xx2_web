<?php

namespace App\Admin\Controllers;

use App\Model\shopLog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ShopBuyRecordController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商城購買紀錄';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new shopLog());
        $grid->model()
            ->orderBy('created_at', 'desc');

        $grid->column('user_id', __('帳號'));
        $grid->column('ip', __('ip'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('item_price', __('商品價格'));
        $grid->column('count', __('購買數量'));
        $grid->column('total_price', __('總金額'));
        $grid->column('user_xx2_origin_point', __('原持有點數'));
        $grid->column('user_xx2_origin_b_point', __('原持有紅利'));
        $grid->column('user_xx2_update_point', __('購買後點數'));
        $grid->column('user_xx2_update_b_point', __('購買後紅利'));
        $grid->column('created_at', __('建立日期'));
        $grid->column('updated_at', __('更新日期'));
        $grid->disableRowSelector();
        $grid->disableActions();
        $grid->disableCreation();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
        });
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('user_id', '帳號');
        });
        return $grid;
    }
}
