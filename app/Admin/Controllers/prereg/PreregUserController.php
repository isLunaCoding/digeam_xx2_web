<?php

namespace App\Admin\Controllers\prereg;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use URL;
use App\Model\event\PreregUser;
use GuzzleHttp\Client;
class PreregUserController extends AdminController
{
    public function index(Content $content){
        return $content
        ->header('事前預約玩家清單')
        ->description('')
        ->body($this->grid($this));
    }

    protected function grid()
    {
        $array = ['k5832241','sex687459','ffdigeam10','jason860121','digeamkotw24','digeamdpotw08','jacky0996','raeyang02','digeamdpotw07','digeamktotw24','digeamsrotw07','hauyi1984 ','hauyi1234 ','hauyi5555','mo0408rris','xx2digeam09','xx2digeam10','xx2digeam11','xx2digeam12','xx2digeam13','vicky811104','cogi1230','sean123362000','ken9957ken','digeamdpotw06','ffdigeam01','ffdigeam02','ffdigeam03','ffdigeam04','ffdigeam05','zhenhuile0802','jefferykuo0906','digeamsrotw03','digeamsrotw04','digeamsrotw05','digeamsrotw06','digeamsrotw07','beebee14','ghostsoul2','ghostsoul3','ghostsoul4','misty0521','misty05211'];
        
        $grid = new Grid(new PreregUser());
        $grid->model()->whereNotIn('user_id',$array)->where('user_mobile','!=','')->orderBy('created_at','desc');
        $grid->column('user_id', __('帳號'));
        $grid->column('user_mobile', __('預約電話'));
        $grid->column('pre_time', __('預約時間'));
        $grid->column('user_ip', __('IP'));
        $grid->column('visit_frequency', '名士拜訪剩餘次數');
        $grid->column('celebrity', '當前名士');
        $grid->column('keep_celebrity', '綁定名士');
        $grid->column('race_total_answer', '熊貓賽跑參與題數');
        $grid->column('race_correct', '熊貓賽跑答對題數');
        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableActions();
        $grid->disableRowSelector();
        $grid->disableCreateButton();
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('user_id', '帳號');
            $filter->between('created_at','上傳時間')->datetime();
        });
        return $grid;
    }
}
