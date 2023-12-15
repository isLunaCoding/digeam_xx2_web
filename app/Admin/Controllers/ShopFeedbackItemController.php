<?php

namespace App\Admin\Controllers;

use App\Model\shopFeedback;
use App\Model\shopFeedbackItem;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;

class ShopFeedbackItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    public function index(Content $content)
    {
        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        $get_shop = shopFeedback::where('id', $explodeURL[$count - 2])->first();

        return $content
            ->header($get_shop->title)
            ->description('道具設定')
            ->body($this->grid($this));
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    protected function grid()
    {
        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        $grid = new Grid(new shopFeedbackItem());
        $grid->model()->where('feedback_id',$explodeURL[$count - 2])->orderBy('price', 'asc');
        $grid->column('id', __('編號'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('price', __('回饋金額'));
        $grid->column('item_code', __('Item_code'));
        $grid->column('item_cnt', __('數量'));
        $grid->column('is_bind', __('綁定'))->display(function () {
            if ($this->is_bind == 0) {
                return '不綁定';
            } else {
                return '綁定';
            }
        });

        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->actions(function ($actions) {
            // 去掉查看
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

    /**
     * Make a form bufffilder.
     *
     * @return Form
     */
    protected function form()
    {
        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        if ($explodeURL[$count - 1] == 'create') {
            $id = $explodeURL[$count - 3];
        } else {
            $id = $explodeURL[$count - 4];
        }

        $form = new Form(new shopFeedbackItem());
        $form->text('feedback_id', __('隸屬'))->default($explodeURL[$count - 3])->readonly();
        $form->number('price', __('回饋金額'))->default(1);
        $form->text('item_code', __('Item_code'));
        $form->text('item_name', __('道具名稱'));
        $form->number('item_cnt', __('數量'))->default(1);
        $form->radio('is_bind', __('是否綁定'))->options(['1' => '綁定', '0' => '不綁定']);
        return $form;
    }
}
