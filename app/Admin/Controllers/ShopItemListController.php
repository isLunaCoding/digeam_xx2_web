<?php

namespace App\Admin\Controllers;

use App\Model\Shop;
use App\Model\shopItemList;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use URL;

class ShopItemListController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    public function index(Content $content)
    {
        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        $get_shop = Shop::where('id', $explodeURL[$count - 2])->first();

        $this->shop_id = $get_shop->id;
        $this->item_name = $get_shop->title;
        $this->item_type = $get_shop->item_type;
        if ($this->item_type != 3) {
            $desc = '道具設定';
        } else {
            $sum = shopItemList::where('shop_id', $explodeURL[$count - 2])->sum('percentage');
            $desc = '此機率商品已設定機率-:' . $sum . '%';
        }
        return $content
            ->header($this->item_name)
            ->description($desc)
            ->body($this->grid($this));
    }
    protected function grid()
    {
        $grid = new Grid(new shopItemList());
        $grid->model()->where('shop_id', $this->shop_id);
        $grid->column('item_code', __('道具ID'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('item_cnt', __('數量'));
        $grid->column('is_bind', __('是否綁定'));

        if ($this->item_type == 1) {
            $countItem = shopItemList::where('shop_id', $this->shop_id)->count();
            if ($countItem > 0) {
                $grid->disableCreation();
            }
        } else {
            if ($this->item_type == 3) {
                $grid->column('percentage', __('機率'));
            }
        }
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
        $show = new Show(shopItemList::findOrFail($id));

        $show->field('id', __('編號'));
        $show->field('item_code', __('道具ID'));
        $show->field('item_name', __('道具名稱'));
        $show->field('item_cnt', __('數量'));
        $show->field('is_bind', __('是否綁定'));
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

        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        if ($explodeURL[$count - 1] == 'create') {
            $id = $explodeURL[$count - 3];
        } else {
            $id = $explodeURL[$count - 4];
        }
        $get_shop = Shop::where('id', $id)->first();
        $form = new Form(new shopItemList());
        $form->text('shop_id', __('隸屬'))->default($explodeURL[$count - 3])->readonly();
        $form->text('item_code', __('道具ID'));
        $form->text('item_name', __('道具名稱'));
        $form->number('item_cnt', __('數量'))->default(1);
        $form->text('percentage', __('機率'));
        $form->radio('is_bind', __('是否綁定'))->options(['1' => '綁定', '0' => '不綁定']);
        if (isset($get_shop['item_type']) && $get_shop['item_type'] != 3) {
            $script = <<<SCRIPT
            $('.percentage').closest('.form-group').css('display','none')
    SCRIPT;
            \Admin::script($script);
        }

        $form->saving(function (Form $form) {
            // // 前贅詞檢查
            // $get_shop = Shop::where('id', $form->shop_id)->first();
            // if ($get_shop['item_type'] == 3) {
            //     $percentage = shopItemList::where('shop_id', $form->shop_id)->sum('percentage');
            //     if ($percentage + $form->percentage > 100) {
            //         $error = new MessageBag([
            //             'title' => '錯誤',
            //             'message' => '機率設定超過100%',
            //         ]);
            //         return back()->with(compact('error'));
            //     }
            // }
        });
        return $form;
    }

    public function edit($type, Content $content)
    {
        // 切開網址,定義id
        $explodeUrl = explode('/', URL::current());
        $count = COUNT($explodeUrl);
        $id = $explodeUrl[$count - 2];
        return Admin::content(function (Content $content) use ($id) {
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
}
