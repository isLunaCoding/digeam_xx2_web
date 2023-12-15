<?php

namespace App\Admin\Controllers;

use App\Model\shopFeedback;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class ShopFeedbackController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '回饋設定';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    protected function grid()
    {
        $grid = new Grid(new shopFeedback());
        $grid->model()->orderBy('start', 'asc');
        $grid->column('id', __('編號'));
        $grid->column('title', __('標題'));
        $grid->column('start', __('開始時間'));
        $grid->column('end', __('結束時間'));
        $grid->column('status', __('狀態'))->display(function () {
            if ($this->status == 1) {
                return '開啟';
            } else {
                return '關閉';
            }
        });
        $grid->column('set', __('道具設定'))->display(function () {
            return '<a href =/admin/' . $this->id . '/shop_feedback_item_list>回饋設定</a>';
        });
        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->actions(function ($actions) {

            // 去掉删除
            $actions->disableDelete();

            // 去掉查看
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

    /**
     * Make a form bufffilder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new shopFeedback());
        $form->text('title', __('標題'));
        $form->datetime('start', __('回饋開始時間'));
        $form->datetime('end', __('回饋結束時間'));
        $form->select('status', __('開啟狀態'))->options(['1' => '開啟', '0' => '關閉'])->default('0');
        $form->saving(function (Form $form) {
            $check_start = shopFeedback::whereBetween('start', [$form->start, $form->end])->first();
            $check_end = shopFeedback::whereBetween('end', [$form->start, $form->end])->first();
            // 結束時間比開始時間早
            if ($form->start >= $form->end) {
                $error = new MessageBag([
                    'title' => '錯誤',
                    'message' => '結束時間比開始時間早',
                ]);
                return back()->with(compact('error'));
            } else if ($check_start || $check_end) {
                $error = new MessageBag([
                    'title' => '錯誤',
                    'message' => '回饋時段與其他項目重疊',
                ]);
                return back()->with(compact('error'));
            }
        });
        return $form;
    }
}
