<?php

namespace App\Admin\Controllers;

use App\Model\Category;
use App\Model\page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AnnouncementController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '公告文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new page());
        $grid->model()->where('type', '=', 'announcement')->orderBy('sec_sort', 'asc');
        $grid->column('title', __('標題'));
        $grid->column('cate_id', __('類別'))->display(function () {
            if ($this->cate_id != 0) {
                $cateName = Category::where('id', $this->cate_id)->first();
                return $cateName['title'];
            }
        });
        $grid->column('open', __('是否開啟'));
        $grid->column('main_sort', __('排序'));
        $grid->column('sec_sort', __('次要排序'));
        $grid->actions(function ($actions) {
            //關閉show(view)
            $actions->disableView();
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
        $show = new Show(page::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('cate_id', __('Cate id'));
        $show->field('content', __('Content'));
        $show->field('open', __('Open'));
        $show->field('top', __('Top'));
        $show->field('new', __('New'));
        $show->field('type', __('Type'));
        $show->field('main_sort', __('Main sort'));
        $show->field('sec_sort', __('Sec sort'));
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
        $form = new Form(new page());
        $form->text('title', __('標題'));
        $form->number('cate_id', __('類別'));
        $form->textarea('content', __('內文'));
        $form->radio('open', __('是否開啟'))->options(['Y' => '是', 'N' => '否'])->default('N');
        $form->text('type', __('類型'))->default('announcement')->readonly();
        $form->number('main_sort', __('排序'));
        $form->number('sec_sort', __('次要排序'));
        $form->radio('top', __('Top'))->options(['Y' => '是', 'N' => '否'])->default('N');
        $form->radio('new', __('New'))->options(['Y' => '是', 'N' => '否'])->default('N');
        return $form;
    }
}
