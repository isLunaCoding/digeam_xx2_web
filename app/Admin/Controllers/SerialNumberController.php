<?php

namespace App\Admin\Controllers;

use App\Model\serial_number;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use URL;

class SerialNumberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '序號清單';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        $grid = new Grid(new serial_number());

        $grid->model()
            ->where('type', $explodeURL[$count - 2])
            ->orderBy('status', 'desc');

        $grid->column('number', __('序號'));
        $grid->column('status', __('狀態'))->using(['N' => '未使用', 'Y' => '已使用']);
        $grid->column('user_id', __('使用帳號'));
        $grid->column('user_ip', __('ip'));
        $grid->column('updated_at', __('更新時間'))->date('Y-m-d');

        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableActions();

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
        $show = new Show(serial_number::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('Type'));
        $show->field('number', __('Number'));
        $show->field('status', __('Status'));
        $show->field('user_id', __('User id'));
        $show->field('start_date', __('Start date'));
        $show->field('end_date', __('End date'));
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
        $form = new Form(new serial_number());

        $form->text('type', __('Type'));
        $form->text('number', __('Number'));
        $form->text('status', __('Status'));
        $form->text('user_id', __('User id'));
        $form->datetime('start_date', __('Start date'))->default(date('Y-m-d H:i:s'));
        $form->datetime('end_date', __('End date'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
