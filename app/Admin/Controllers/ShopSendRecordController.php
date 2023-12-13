<?php

namespace App\Admin\Controllers;

use App\Model\shopSendItemLog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Grid;

class ShopSendRecordController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商城發送紀錄';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new shopSendItemLog());
        $grid->model()
            ->orderBy('created_at', 'desc');

        $grid->column('user_id', __('帳號'));
        $grid->column('ip', __('ip'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('item_code', __('item_code'));
        $grid->column('count', __('發送數量'));
        $grid->column('char_name', __('發送角色'));
        $grid->column('server_id', __('伺服器'))->display(function () {
            return '十方鎮';
        });
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
