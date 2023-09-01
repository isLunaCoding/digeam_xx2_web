<?php

namespace App\Admin\Controllers;

use App\Model\Page;
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
    protected $title = '公告管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());
        $grid->model()
            ->where('type', 'announcement')
            ->orderBy('open', 'desc')
            ->orderBy('top', 'desc')
            ->orderBy('new', 'desc')
            ->orderBy('created_at', 'desc')
            ->orderBy('main_sort', 'asc');
        $grid->column('title', __('Title'));
        $grid->column('cate_id', __('Cate id'))->using(['1' => '最新', '2' => '活動', '3' => '系統']);
        $grid->column('open', __('Open'));
        $grid->column('top', __('置頂'))->label(['N' => 'default', 'Y' => 'danger']);
        $grid->column('new', __('最新'))->label(['N' => 'default', 'Y' => 'danger']);
        $grid->column('main_sort', __('排序'));
        $grid->column('created_at', __('發佈時間'));
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

        $show->field('title', __('標題'));
        $show->field('cate_id', __('分類'));
        $show->field('content', __('內容'));
        $show->field('open', __('是否開啟'));
        $show->field('top', __('是否置頂'));
        $show->field('new', __('是否最新'));
        $show->field('type', __('類型'));
        $show->field('main_sort', __('排序/日期相同由小到大'));
        $show->field('created_at', __('發布日期'));
        $show->field('updated_at', __('上次更新時間'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Page());
        $form->text('title', __('Title'));
        $form->select('cate_id', __('Cate id'))->options(['1' => '最新', '2' => '活動', '3' => '系統'])->default(5);
        $form->text('type', __('類型'))->default('announcement')->readonly();
        $form->ckeditor('content', __('內文'));
        $form->datetime('created_at', __('發佈日期'))->default(date('Y-m-d H:i:s'));
        $form->radio('open', __('開啟'))->options(['N' => '否', 'Y' => '是']);
        $form->radio('top', __('置頂'))->options(['N' => '', 'Y' => 'top']);
        $form->radio('new', __('最新'))->options(['N' => '', 'Y' => 'new']);
        $form->number('main_sort', __('排序/日期相同時由小到大'));

        //如果需要置頂且發布日期小於現在,將舊的置頂移除
        $form->saving(function (Form $form) {
            if ($form->top == 'Y' && $form->created_at <= date('Y-m-d H:i:s')) {
                $old_top = Page::where('top', 'Y')->first();
                if ($old_top != '' && $old_top->title != $form->title) {
                    $old_top->top = 'N';
                    $old_top->save();
                }
            }
        });
        return $form;
    }
}
