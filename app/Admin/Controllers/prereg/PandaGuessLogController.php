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
use App\Model\event\PandaGuessLog;
use GuzzleHttp\Client;
class PandaGuessLogController extends AdminController
{
    public function index(Content $content){
        return $content
        ->header('熊貓賽跑答題Log')
        ->description('')
        ->body($this->grid($this));
    }

    protected function grid()
    {
        $grid = new Grid(new PandaGuessLog());
        $grid->model()->orderBy('created_at','desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('guess', __('玩家選項'));
        $grid->column('answer', __('答案'));
        $grid->column('result', __('結果'));
        $grid->column('created_at', __('答題時間'));
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
