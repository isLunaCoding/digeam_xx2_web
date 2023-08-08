<?php

namespace App\Admin\Controllers\prereg;

use App\Model\event\DrawCardChance;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class DrawCardChanceLogController extends AdminController
{
    public function index(Content $content)
    {
        return $content
            ->header('任務完成Log')
            ->description('')
            ->body($this->grid($this));
    }

    protected function grid()
    {
        $grid = new Grid(new DrawCardChance());
        $grid->model()->orderBy('created_at', 'desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('add_chance', __('增加次數'));
        $grid->column('add_reason', __('完成任務'))->using(['daily_FB' => '每日首次分享FB', 'daily_login' => '每日首次登入頁面', 'fb_fans_click' => 'FB粉絲團按讚']);
        $grid->column('created_at', '完成時間');
        $grid->disableRowSelector();
        $grid->disableActions();
        $grid->disableRowSelector();
        $grid->disableCreateButton();
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('user_id', '帳號');
            $filter->between('created_at', '上傳時間')->datetime();
        });
        return $grid;
    }
}
