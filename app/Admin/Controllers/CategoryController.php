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
        $grid->model()->where('type', 'wiki')->orderby('parent_id', 'asc')->orderby('cate_id', 'asc');
        $grid->column('parent_id', __('父標題'))->display(function () {
            if ($this->parent_id != 0) {
                $cateName = Category::where('id', $this->parent_id)->first();
                return $cateName['title'];
            } else {
                return '無';
            }
        });
        $grid->column('title', __('標題'));
        $grid->column('cate_id', __('分類編號(不可重複)'));
        $grid->column('open', __('是否開啟'))->label(['N' => 'default', 'Y' => 'danger']);
        $grid->column('sort', __('順序'));
        $grid->disableRowSelector();
        $grid->disableExport();

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
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $cate = Category::where('open', 'Y')->where('type', 'wiki')->where('parent_id', 0)->pluck('title', 'id');
        $cate[0] = '無';
        $form = new Form(new Category());
        $form->select('parent_id', __('大標題'))->options($cate);
        $max_cateid = Category::where('type', 'wiki')->orderby('cate_id', 'desc')->first();
        $form->number('cate_id', __('標題編號(不可重複)'))->default($max_cateid->cate_id+1);
        $form->text('title', __('標題'));
        $form->text('open', __('是否開啟'))->default('N');
        $form->number('sort', __('排序'));
        $form->text('type', __('類型'))->default('wiki')->readonly();
        return $form;
    }
}
