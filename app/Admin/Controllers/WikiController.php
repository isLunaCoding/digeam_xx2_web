<?php

namespace App\Admin\Controllers;

use App\Model\Category;
use App\Model\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WikiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '百科文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());
        $grid->model()->where('type','=','wiki')->orderBy('sec_sort','asc');
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
        $show = new Show(Page::findOrFail($id));

        $show->field('title', __('Title'));
        $show->field('cate_id', __('類別'));
        $show->field('content', __('內文'));
        $show->field('open', __('是否開啟'));
        $show->field('main_sort', __('排序'));
        $show->field('sec_sort', __('次要排序'));
        $show->field('created_at', __('建立日期'));
        $show->field('updated_at', __('上次更新日期'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $cate = category::where('open', 'Y')->where('type', 'wiki')->pluck('title', 'id');
        $cate[0] = '無';
        $form = new Form(new Page());
        $form->text('title', __('標題'));
        $form->select('cate_id', __('類別'))->options($cate);
        $form->ckeditor('content', __('內文'));
        $form->text('type', __('類型'))->default('wiki')->readonly();
        $form->radio('open', __('是否開啟'))->options(['Y' => '是', 'N'=> '否'])->default('N');
        $form->number('main_sort', __('排序'));
        $form->number('sec_sort', __('次要排序'));

        return $form;
    }
}
