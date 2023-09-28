<?php

namespace App\Admin\Controllers;

use App\Model\Reward\reward_getlog;
use App\Model\Reward\reward_group;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RewardLogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '領獎紀錄';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new reward_getlog());
        $grid->model()
        ->orderBy('created_at', 'desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('char_name', __('角色'));
        $grid->column('charid', __('角色ID'));
        $grid->column('item_name', __('道具名稱'));
        $grid->column('is_send', __('是否領取'))->using(['N' => '未領取', 'Y' => '已領取']);
        $grid->column('group_id', __('類別'))->display(function () {
            $group = reward_group::where('id', $this->group_id)->first();
            if ($group != null) {
                return $group->title;
            } else {
                return '綁定名士';
            }
        });
        $grid->column('remark', __('標記'));
        $grid->column('user_ip', __('ip'));
        $grid->column('updated_at', __('更新日期'));

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('user_id', '帳號');
        });

        $grid->disableRowSelector();
        $grid->disableActions();
        $grid->disableCreateButton();
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
        $show = new Show(reward_getlog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('server_id', __('Server id'));
        $show->field('char_name', __('Char name'));
        $show->field('charid', __('Charid'));
        $show->field('item_name', __('Item name'));
        $show->field('item_code', __('Item code'));
        $show->field('is_send', __('Is send'));
        $show->field('group_id', __('Group id'));
        $show->field('remark', __('Remark'));
        $show->field('user_ip', __('User ip'));
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
        $form = new Form(new reward_getlog());

        $form->text('user_id', __('User id'));
        $form->number('server_id', __('Server id'));
        $form->text('char_name', __('Char name'));
        $form->number('charid', __('Charid'));
        $form->text('item_name', __('Item name'));
        $form->number('item_code', __('Item code'));
        $form->text('is_send', __('Is send'))->default('N');
        $form->number('group_id', __('Group id'));
        $form->text('remark', __('Remark'));
        $form->text('user_ip', __('User ip'));

        return $form;
    }
}
