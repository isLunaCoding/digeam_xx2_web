<?php

namespace App\Admin\Controllers;

use App\Model\shopUserDepot;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Grid;

class ShopUserRecordController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '玩家道具持有資訊';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new shopUserDepot());
        $grid->model()
            ->orderBy('created_at', 'desc');

        $grid->column('user_id', __('帳號'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('count', __('剩餘數量'));
        $grid->column('reason', __('獲得途徑'));
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
