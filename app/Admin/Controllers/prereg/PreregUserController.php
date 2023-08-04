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
use App\Model\event\PreregUser;
use GuzzleHttp\Client;
class PreregUserController extends AdminController
{
    public function index(Content $content){
        return $content
        ->header('事前預約玩家清單')
        ->description('')
        ->body($this->grid($this));
    }

    protected function grid()
    {
        $grid = new Grid(new PreregUser());
        $grid->model()->orderBy('created_at','desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('user_mobile', __('預約電話'));
        $grid->column('pre_time', __('預約時間'));
        $grid->column('user_ip', __('IP'));
        $grid->column('visit_frequency', '名士拜訪剩餘次數');
        $grid->column('celebrity', '當前名士');
        $grid->column('keep_celebrity', '綁定名士');
        $grid->column('race_total_answer', '熊貓賽跑參與題數');
        $grid->column('race_correct', '熊貓賽跑答對題數');
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
