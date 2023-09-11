<?php

namespace App\Admin\Controllers\cbt;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use URL;
use App\Model\event\CBT_Play_Log;
use App\Admin\Excel\PostsExporter;
class PlayLogController extends AdminController
{
    public function index(Content $content){
        return $content
        ->header('一步登仙')
        ->description('紀錄')
        ->body($this->grid($this));
    }

    protected function grid()
    {
        $grid = new Grid(new CBT_Play_Log());
        $grid->model()->orderBy('created_at','desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('user_ip', __('IP'));
        $grid->column('created_at', __('建立時間'))->date('Y-m-d H:i:s');



        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('user_id', '帳號');
            $filter->equal('user_ip', 'IP');
        });

        $grid->actions(function($actions){
            $actions->disableView();
        });

        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableActions();
        $grid->disableCreateButton();
        // $grid->exporter(new PostsExporter());
        return $grid;
    }
}
