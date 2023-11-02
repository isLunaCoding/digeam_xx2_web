<?php

namespace App\Admin\Controllers;

use App\Model\sendItemLog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class sendItemLogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '寄送道具紀錄';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new sendItemLog());
        $grid->model()
        ->orderBy('created_at', 'desc');
        
        $grid->column('user_id', __('帳號'));
        $grid->column('char_name', __('角色名稱'));
        $grid->column('charid', __('角色ID'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('itemcnt', __('數量'));
        $grid->column('created_at', __('建立日期'));
        $grid->column('updated_at', __('更新日期'));
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

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(sendItemLog::findOrFail($id));

        $show->field('user_id', __('帳號'));
        $show->field('char_name', __('角色名稱'));
        $show->field('charid', __('角色ID'));
        $show->field('item_name', __('道具名稱'));
        $show->field('itemcnt', __('數量'));
        $show->field('created_at', __('建立日期'));
        $show->field('updated_at', __('更新日期'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new sendItemLog());

        $form->text('user_id', __('帳號'));
        $form->text('char_name', __('角色名稱'));
        $form->number('charid', __('角色ID'));
        $form->text('item_name', __('道具名稱'));
        $form->number('itemcnt', __('數量'));

        return $form;
    }
}
