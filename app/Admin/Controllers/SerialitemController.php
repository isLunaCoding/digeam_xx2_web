<?php

namespace App\Admin\Controllers;

use App\Model\serial_item;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;

class SerialitemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '道具設定';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        $grid = new Grid(new serial_item());

        $grid->model()
            ->where('cate_id', $explodeURL[$count - 2]);
        $grid->column('item_code', __('道具ID'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('itemcnt', __('數量'));
        $grid->column('isbind', __('是否綁定'))->using(['1' => '綁定', '0' => '不綁定']);
        $grid->disableRowSelector();
        $grid->disableExport();

        $grid->actions(function ($actions) {
            $actions->disableDelete();});
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
        $getCate = explode('/', URL::current());
        $id = $getCate[count($getCate) - 1];
        $show = new Show(serial_item::findOrFail($id));
        $show->field('id', __('編號'));
        $show->field('cate_id', __('分類'));
        $show->field('item_code', __('道具ID'));
        $show->field('item_name', __('道具名稱'));
        $show->field('itemcnt', __('道具數量'));
        $show->field('isbind', __('是否綁定'))->using(['1' => '綁定', '0' => '不綁定']);

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        $form = new Form(new serial_item());
        $form->text('cate_id', __('分類'))->default($explodeURL[$count - 3])->readonly();
        $form->text('item_code', __('道具ID'));
        $form->text('item_name', __('道具名稱'));
        $form->number('itemcnt', __('數量'))->default(1);
        $form->radio('isbind', __('是否綁定'))->options(['1' => '綁定', '0' => '不綁定']);
        return $form;
    }
    public function edit($type, Content $content)
    {
        // 切開網址,定義id
        $explodeUrl = explode('/', URL::current());
        $count = COUNT($explodeUrl);
        $id = $explodeUrl[$count - 2];
        return Admin::content(function (Content $content) use ($id) {

            $content->header('XX2百科編輯');
            $content->description('編輯');

            $content->body($this->form($id)->edit($id));
        });
    }
    public function update($type)
    {
        $explodeUrl = explode('/', URL::current());
        $count = COUNT($explodeUrl);
        $id = $explodeUrl[$count - 1];
        return $this->form()->update($id);
    }

    public function destroy($id)
    {
        $explodeUrl = explode('/', URL::current());
        $count = COUNT($explodeUrl);
        $id = $explodeUrl[$count - 1];
        $target = serial_item::where('id', $id)->first();
        $target->delete();
    }
}
