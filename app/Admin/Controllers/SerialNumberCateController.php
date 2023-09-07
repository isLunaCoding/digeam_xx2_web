<?php

namespace App\Admin\Controllers;

use App\Model\serial_number_cate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SerialNumberCateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'serial_number_cate';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new serial_number_cate());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('type', __('Type'));
        $grid->column('count', __('Count'));
        $grid->column('all_for_one', __('All for one'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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

        $form->text('title', __('Title'));
        $form->text('type', __('Type'));
        $form->number('count', __('Count'));
        $form->text('all_for_one', __('All for one'));

        return $form;
    }
}
