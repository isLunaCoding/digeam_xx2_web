<?php

namespace App\Admin\Controllers\prereg;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use URL;
use App\Model\event\DrawCardChance;
use GuzzleHttp\Client;
class DrawCardChanceLogController extends AdminController
{
    public function index(Content $content){
        return $content
        ->header('任務完成Log')
        ->description('')
        ->body($this->grid($this));
    }

    protected function grid()
    {
        $grid = new Grid(new DrawCardChance());
        $grid->model()->orderBy('created_at','desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('add_chance', __('增加次數'));
        $grid->column('add_reason', __('完成任務'));
        $grid->column('created_at', '完成時間');
        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableActions();
        $grid->disableRowSelector();
        $grid->disableCreateButton();
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('user_id', '帳號');
            $filter->between('created_at','上傳時間')->datetime();
        });
        return $grid;
    }
}
