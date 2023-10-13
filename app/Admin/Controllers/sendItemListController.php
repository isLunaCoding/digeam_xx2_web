<?php

namespace App\Admin\Controllers;

use App\Model\sendItem;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class sendItemListController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '道具清單';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new sendItem());

        // $grid->column('id', __('編號'));
        $grid->column('cate_id', __('分類'));
        $grid->column('item_code', __('道具ID'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('itemcnt', __('數量'));
        $grid->column('isbind', __('是否綁定'));
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
        $show = new Show(sendItem::findOrFail($id));

        $show->field('id', __('編號'));
        $show->field('item_code', __('道具ID'));
        $show->field('item_name', __('道具名稱'));
        $show->field('itemcnt', __('數量'));
        $show->field('isbind', __('是否綁定'));
        $show->field('created_at', __('建立日期'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new sendItem());
        $form->number('cate_id', __('分類'));
        $form->text('item_code', __('道具ID'));
        $form->text('item_name', __('道具名稱'));
        $form->number('itemcnt', __('數量'))->default(1);
        $form->radio('isbind', __('是否綁定'))->options(['1' => '綁定', '0' => '不綁定']);

        return $form;
    }
}
