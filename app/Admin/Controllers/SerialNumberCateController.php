<?php

namespace App\Admin\Controllers;

use App\Model\serial_number;
use App\Model\serial_number_cate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class SerialNumberCateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '序號系統';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new serial_number_cate());
        $grid->model()->orderBy('created_at', 'desc');
        $grid->column('title', __('標題'))->editable();
        $grid->column('id', __('編號'));
        $grid->column('type', __('前贅詞'));
        $grid->column('all_for_one', __('種類'))->using(['N' => '一組序號一人用', 'Y' => '一組序號多人用']);
        $grid->column('count', __('序號產出數量'));
        $grid->column('remainder', __('可兌換次數(剩餘數量)'))->display(function () {
            $cate = serial_number_cate::where('type', $this->type)->first();
            if ($cate->all_for_one == 'N') {
                return '';
            } else {
                $used = serial_number::where('type', $this->type)->count();
                $not_use = $cate->remainder - $used + 1;
                return $cate->remainder . "(" . $not_use . ")";
            }
        });
        $grid->column('limit_times', __('同帳號可領取次數(0為無限)'))->display(function () {
            if ($this->limit_times == 0) {
                return '無限制';
            } else {
                return $this->limit_times;
            }
        })->editable();
        $grid->column('list', __('序號列表'))->display(function () {
            return '<a href =/admin/' . $this->type . '/serial_number>序號列表</a>';
        });
        $grid->column('list2', __('設定道具'))->display(function () {
            return '<a href =/admin/' . $this->id . '/serial_item>道具列表</a>';
        });
        $grid->column('start_date', __('開始日期'))->editable();
        $grid->column('end_date', __('截止日期'))->editable();
        $grid->disableRowSelector();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(serial_number_cate::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('type', __('Type'));
        $show->field('count', __('Count'));
        $show->field('all_for_one', __('All for one'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new serial_number_cate());
        $form->text('title', __('標題'));
        $form->text('type', __('前贅詞'));
        $form->select('all_for_one', __('狀態'))->options(['N' => '一組序號一人用', 'Y' => '一組序號多人用'])->default('N');
        $form->number('count', __('序號產出數量'))->default(1);
        $form->number('remainder', __('序號可用次數'))->default(1);
        $form->number('limit_times', __('同帳號可領取次數/0為無限制'))->default(0);
        $form->datetime('start_date', __('開始日期'));
        $form->datetime('end_date', __('結束日期'));

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });



        $form->saved(function (Form $form) {
            for ($i = 1; $i <= $form->count; $i++) {
                $charid = strtoupper(md5(uniqid(rand(), true)));
                $uuid = substr($charid, 0, 4)
                . substr($charid, 4, 4)
                . substr($charid, 8, 4);

                $new = new serial_number();
                $new->type = $form->type;
                $new->number = $form->type . "-" . $uuid;
                $new->status = 'N';
                $new->save();
            }
        });

        return $form;
    }

    // public function delete(){
    //     dd('123');
    // }

}
