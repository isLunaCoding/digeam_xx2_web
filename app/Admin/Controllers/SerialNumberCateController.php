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

        $grid->column('title', __('標題'));
        $grid->column('type', __('前贅詞'));
        $grid->column('all_for_one', __('種類'))->using(['N' => '一組序號一人用', 'Y' => '一組序號多人用']);
        $grid->column('count', __('序號產出數量'));
        $grid->column('remainder', __('剩餘次數(多人用)'))->display(function () {
            $cate = serial_number_cate::where('type', $this->type)->first();
            if ($cate->all_for_one == 'N') {
                return '';
            } else {
                return $cate->remainder;
            }
        });

        $grid->column('list', __('序號列表'))->display(function () {
            return '<a href =/admin/' . $this->type . '/serial_number>序號列表</a>';
        });

        $grid->column('start_date', __('開始日期'));
        $grid->column('end_date', __('截止日期'));
        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableActions();
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
        $form->number('remainder', __('序號可用次數'))->default(0);
        $form->datetime('start_date', __('開始日期'));
        $form->datetime('end_date', __('結束日期'));

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });

        $form->saving(function (Form $form) {
            // 前贅詞檢查
            if (mb_strlen($form->type) != 3) {
                $error = new MessageBag([
                    'title' => '錯誤',
                    'message' => '前贅詞請設定3個字元',
                ]);
                return back()->with(compact('error'));
            };
            //大寫檢查

            $type = $form->type;
            $num = 0;
            for ($i = 0; $i < mb_strlen($form->type); $i++) {
                $char = ord($type[$i]);
                if ($char > 96 && $char < 123) {
                    $num++;
                }
            }
            if ($num > 0) {
                $error = new MessageBag([
                    'title' => '錯誤',
                    'message' => '含有小寫字母',
                ]);
                return back()->with(compact('error'));
            };

            // 序號產出數量檢查
            if ($form->all_for_one == 'Y') {
                if ($form->count != 1) {
                    $error = new MessageBag([
                        'title' => '錯誤',
                        'message' => '一組多人使用序號請設定數量為"1"',
                    ]);
                    return back()->with(compact('error'));
                }
            }
            //可兌換次數檢查
            if ($form->all_for_one == 'N') {
                if ($form->remainder != 0) {
                    $error = new MessageBag([
                        'title' => '錯誤',
                        'message' => '一組一人序號可用次數為"0"',
                    ]);
                    return back()->with(compact('error'));
                }
            }

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
}
