<?php

namespace App\Admin\Controllers;

use App\Model\shop;
use App\Model\shopItemList;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;
use URL;

class ShopController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商城管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    protected function grid()
    {
        $grid = new Grid(new shop());
        $grid->model()->orderBy('status', 'desc')->orderBy('sort', 'desc');
        $grid->column('id', __('編號'));
        $grid->column('title', __('商品名稱'));
        $grid->column('price', __('商品價格'));
        $grid->column('img', __('圖片'))->image();
        $grid->column('cate', __('分類'))->using(['1' => '熱門商品', '2' => '特別販售']);
        $grid->column('item_type', __('道具類型'))->using(['1' => '一般商品', '2' => '禮包', '3' => '機率商品']);
        $grid->column('limit_type', __('限購'))->using(['0' => '無限購', '1' => '全服限購', '2' => '帳號限購', '3' => '區間內全服限購', '4' => '區間內帳號限購']);
        $grid->column('status', __('是否上架'))->using(['1' => '上架', '0' => '未上架']);
        $grid->column('sort', __('排序'));
        $grid->column('set', __('道具設定'))->display(function () {
            if ($this->item_type == 3) {
                if ($this->status == 1) {
                    return '<p style=color:red>機率商品已上架<br>請下架後再設定</p>';
                } else {
                    return '<a href =/admin/' . $this->id . '/shop_item_list>道具設定</a>';
                }
            } else {
                return '<a href =/admin/' . $this->id . '/shop_item_list>道具設定</a>';
            }
        });
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

    /**
     * Make a form bufffilder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new shop());
        $form->text('id', __('ID'))->readOnly();
        $form->text('title', __('商品名稱'))->required();;
        $form->number('price', __('商品價格'))->required();;
        $form->select('cate', __('分類'))->options(['1' => '熱門商品', '2' => '特別販售'])->default(1);
        $form->select('item_type', __('道具類型'))->options(['1' => '一般商品', '2' => '禮包', '3' => '機率商品'])->default(1);
        $form->select('limit_type', __('限購'))->options(['0' => '無限購', '1' => '全服限購', '2' => '帳號限購', '3' => '區間內全服限購', '4' => '區間內帳號限購'])->default(0);
        $form->datetime('limit_start', __('區間開始時間'));
        $form->datetime('limit_end', __('區間結束時間'));
        $form->number('limit_count', __('限購數量'))->default(0);
        $form->image('img', __('圖片'))->move('upload/shop')->required();;
        $form->number('sort', __('排序'))->default(0);
        $form->select('status', __('上架狀態'))->options(['1' => '上架', '0' => '下架'])->default('0');
        $form->textarea('description', __('內文'))->required();;

        Admin::style('.description {width: 274.8px;}');
        Admin::style('.description {font-size: 17.6px ;}');

        $explodeURL = explode('/', URL::current());
        $count = Count($explodeURL);
        if ($explodeURL[$count - 1] == 'create') {
            $script = <<<SCRIPT
            $('.id').closest('.form-group').css('display','none')
            $('.status').closest('.form-group').css('display','none')
    SCRIPT;
            \Admin::script($script);
        }
        // 先判定是否為新增
        $form->saving(function (Form $form) {
            if ($form->id != null) {
                // 上架前先判斷是否有建立道具項目
                if ($form->status == 1) {
                    $check = shopItemList::where('shop_id', $form->id)->first();
                    if (!$check) {
                        $error = new MessageBag([
                            'title' => '錯誤',
                            'message' => '請先設定道具',
                        ]);
                        return back()->with(compact('error'));
                    }
                    // 機率商品先確認是否設定正確
                    if ($form->item_type == 3) {
                        $percentage = shopItemList::where('shop_id', $form->id)->sum('percentage');
                        if ($percentage != 100) {
                            $error = new MessageBag([
                                'title' => '錯誤',
                                'message' => '機率道具設定不是剛好100%,請確認道具設定狀況',
                            ]);
                            return back()->with(compact('error'));
                        }
                    }
                }
            }
            // 限購請填非0數字, 一般商品的限購數量請填0
            if ($form->limit_type == 0) {
                if ($form->limit_start || $form->limit_end) {
                    $error = new MessageBag([
                        'title' => '錯誤',
                        'message' => '非區間限購請勿輸入區間開始或區間結束時間',
                    ]);
                    return back()->with(compact('error'));
                }
                if ($form->limit_count != 0) {
                    $error = new MessageBag([
                        'title' => '錯誤',
                        'message' => '非限購的限購數量請填0',
                    ]);
                    return back()->with(compact('error'));
                }
            } else if ($form->limit_type == 1 || $form->limit_type == 2) {
                if ($form->limit_start || $form->limit_end) {
                    $error = new MessageBag([
                        'title' => '錯誤',
                        'message' => '非區間限購請勿輸入區間開始或區間結束時間',
                    ]);
                    return back()->with(compact('error'));
                }
                if ($form->limit_count <= 0) {
                    $error = new MessageBag([
                        'title' => '錯誤',
                        'message' => '限購商品的限購數量請勿填0或小於0',
                    ]);
                    return back()->with(compact('error'));
                }
                // 以下區間販售,需填時間
            } else {
                if ($form->limit_count <= 0) {
                    $error = new MessageBag([
                        'title' => '錯誤',
                        'message' => '限購商品的限購數量請勿填0或小於0',
                    ]);
                    return back()->with(compact('error'));
                }
                if (!$form->limit_start || !$form->limit_start) {
                    $error = new MessageBag([
                        'title' => '錯誤',
                        'message' => '區間販售請填入開始時間跟結束時間',
                    ]);
                    return back()->with(compact('error'));
                }
            }
        });
        return $form;
    }
}
