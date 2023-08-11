<?php

namespace App\Admin\Controllers;

use App\Model\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '分類';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());
        $grid->model()->where('type','=','wiki')->orderBy('sort','asc');
        $grid->column('title', __('標題'));
        $grid->column('open', __('是否開啟'));
        $grid->column('sort', __('順序'));
        $grid->actions(function ($actions) {
            $actions->disableDelete();
        });
        $grid->disableExport();
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
        $show = new Show(Category::findOrFail($id));
        $show->field('title', __('標題'));
        $show->field('open', __('是否開啟'));
        $show->field('type', __('分類'));
        $show->field('sort', __('排序'));
        $show->field('created_at', __('建立時間'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->text('title', __('標題'));
        $form->text('open', __('是否開啟'))->default('N');
        $form->text('type', __('類型'))->default('wiki');
        $form->number('sort', __('排序'));

        return $form;
    }
}
