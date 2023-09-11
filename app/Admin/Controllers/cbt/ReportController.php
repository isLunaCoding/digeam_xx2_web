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
use App\Model\event\CBT_Report;
use App\Admin\Excel\PostsExporter;
class ReportController extends AdminController
{
    public function index(Content $content){
        return $content
        ->header('BUG回報')
        ->description('清單')
        ->body($this->grid($this));
    }

    protected function grid()
    {
        $grid = new Grid(new CBT_Report());
        $grid->model()->orderBy('created_at','desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('title', __('問題分類'))->display(function(){
            if($this->title == 1) {
                return '系統及機制異常';
            }
            if($this->title == 2) {
                return '描述錯誤/錯字/亂碼';
            }
            if($this->title == 3) {
                return '其他';
            }
        });
        $grid->column('content', __('內容'));
        $grid->column('img', __('圖片'))->display(function(){
            if($this->img != '') {
                return '<img  src="/upload/report/'.$this->img.'" style="width:300px">';
            } else {
                return '無';
            }
        });
        $grid->column('user_ip', __('IP'));
        $grid->column('created_at', __('建立時間'))->date('Y-m-d H:i:s');



        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('user_id', '帳號');
            $filter->where(function ($query) {
                $query->where('content', 'like', "%".$this->input."%");
            }, '內容');
            $filter->equal('user_ip', 'IP');
        });

        $grid->actions(function($actions){
            $actions->disableView();
        });

        $grid->disableRowSelector();
        //$grid->disableExport();
        $grid->disableActions();
        $grid->disableCreateButton();
        // $grid->exporter(new PostsExporter());
        return $grid;
    }
}
