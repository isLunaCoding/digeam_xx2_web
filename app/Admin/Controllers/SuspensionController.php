<?php

namespace App\Admin\Controllers;

use App\Model\Suspension_lists;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SuspensionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '停權名單';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Suspension_lists());

        $grid->column('user_id', __('帳號'));
        $grid->column('char_name', __('角色名稱'));
        $grid->column('description', __('說明'));
        $grid->column('punish', __('懲處結果'));
        $grid->column('created_at', __('建立時間'))->date();
        $grid->disableRowSelector();
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
        $show = new Show(Suspension_lists::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('帳號'));
        $show->field('char_name', __('角色名稱'));
        $show->field('description', __('說明'));
        $show->field('punish', __('懲處結果'));
        $show->field('created_at', __('建立時間'));
        $show->field('updated_at', __('上次更改時間'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Suspension_lists());
        $form->text('user_id', __('帳號'));
        $form->text('char_name', __('角色名稱'));
        $form->text('description', __('說明'));
        $form->text('punish', __('懲處結果'));
        return $form;
    }
}
