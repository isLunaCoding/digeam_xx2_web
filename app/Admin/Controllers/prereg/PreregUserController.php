<?php

namespace App\Admin\Controllers\prereg;

use App\Model\event\PreregUser;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class PreregUserController extends AdminController
{
    public function index(Content $content)
    {
        return $content
            ->header('事前預約玩家清單')
            ->description('')
            ->body($this->grid($this));
    }

    protected function grid()
    {
        $array = ['k5832241', 'sex687459', 'ffdigeam10', 'jason860121', 'digeamkotw24', 'digeamdpotw08', 'jacky0996', 'raeyang02', 'digeamdpotw07', 'digeamktotw24', 'digeamsrotw07', 'hauyi1984 ', 'hauyi1234 ', 'hauyi5555', 'mo0408rris', 'xx2digeam09', 'xx2digeam10', 'xx2digeam11', 'xx2digeam12', 'xx2digeam13', 'vicky811104', 'cogi1230', 'sean123362000', 'ken9957ken', 'digeamdpotw06', 'ffdigeam01', 'ffdigeam02', 'ffdigeam03', 'ffdigeam04', 'ffdigeam05', 'zhenhuile0802', 'jefferykuo0906', 'digeamsrotw03', 'digeamsrotw04', 'digeamsrotw05', 'digeamsrotw06', 'digeamsrotw07', 'beebee14', 'ghostsoul2', 'ghostsoul3', 'ghostsoul4', 'misty0521', 'misty05211'];

        $grid = new Grid(new PreregUser());
        $grid->model()->whereNotIn('user_id', $array)->where('user_mobile', '!=', '')->orderBy('created_at', 'desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('user_mobile', __('預約電話'));
        $grid->column('pre_time', __('預約時間'));
        $grid->column('user_ip', __('IP'));
        $grid->column('visit_frequency', '名士拜訪剩餘次數');
        $grid->column('celebrity', '當前名士')->using([
            'orange_1' => '七花獸百花仙靈', 'orange_2' => '仙道盟主沈仲陽', 'orange_3' => '愛之紅娘',
            'purple_1' => '仙道盟訓誡長老', 'purple_2' => '仙道盟執法長老', 'purple_3' => '仙道盟傳功長老', 'purple_4' => '仙道盟掌刑長老', 'purple_5' => '天魔影煞', 'purple_6' => '天魔計都',
            'blue_1' => '愛之月老', 'blue_2' => '吞靈獸', 'blue_3' => '齊天大聖',
            'green_1' => '不死冰骷髏', 'green_2' => '不死霜骷髏', 'green_3' => '開明獸', 'green_4' => '冰麒麟', 'green_5' => '寒冰巨甲',
            'white_1' => '愛之隨從', 'white_2' => '愛之花童', 'white_3' => '愛之禮官',
        ]);
        $grid->column('keep_celebrity', '綁定名士')->using([
            'orange_1' => '七花獸百花仙靈', 'orange_2' => '仙道盟主沈仲陽', 'orange_3' => '愛之紅娘',
            'purple_1' => '仙道盟訓誡長老', 'purple_2' => '仙道盟執法長老', 'purple_3' => '仙道盟傳功長老', 'purple_4' => '仙道盟掌刑長老', 'purple_5' => '天魔影煞', 'purple_6' => '天魔計都',
            'blue_1' => '愛之月老', 'blue_2' => '吞靈獸', 'blue_3' => '齊天大聖',
            'green_1' => '不死冰骷髏', 'green_2' => '不死霜骷髏', 'green_3' => '開明獸', 'green_4' => '冰麒麟', 'green_5' => '寒冰巨甲',
            'white_1' => '愛之隨從', 'white_2' => '愛之花童', 'white_3' => '愛之禮官',
        ]);
        $grid->column('race_total_answer', '熊貓賽跑參與題數');
        $grid->column('race_correct', '熊貓賽跑答對題數');
        $grid->disableRowSelector();
        $grid->disableActions();
        $grid->disableRowSelector();
        $grid->disableCreateButton();
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('user_id', '帳號');
            $filter->between('created_at', '上傳時間')->datetime();
        });
        return $grid;
    }
}
