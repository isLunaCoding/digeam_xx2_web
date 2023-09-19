<?php

namespace App\Admin\Controllers;

use App\Model\Image;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ImageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '首頁照片輪播管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Image());
        $grid->model()->where('type', 'index')->orderBy('status', 'desc')->orderBy('sort', 'asc');
        $grid->column('file_name', __('圖片'))->image();
        $grid->column('url', __('網址'));
        $grid->column('sort', __('排序'));
        $grid->column('status', __('是否開啟'))->using(['Y' => '開啟', 'N' => '關閉']);
        $grid->disableRowSelector();
        $grid->disableFilter();
        $grid->disableExport();
        $grid->actions(function ($actions) {
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
        $show = new Show(Image::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('file_name', __('File name'));
        $show->field('url', __('Url'));
        $show->field('type', __('Type'));
        $show->field('sort', __('Sort'));
        $show->field('status', __('Status'));
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

        $form = new Form(new Image());
        $form->image('file_name', __('圖片'))->uniqueName()->move('upload/index');
        $form->url('url', __('網址'));
        $form->select('status', __('狀態'))->options(['N' => '關閉', 'Y' => '開啟'])->default('N');
        $form->number('sort', __('排序'));
        $form->text('type', __('類型'))->default('index')->readonly();
        return $form;
    }
}
