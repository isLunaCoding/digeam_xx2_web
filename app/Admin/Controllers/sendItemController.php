<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use URL;
use Illuminate\Http\Request;
class sendItemController extends AdminController
{

    public function index(Content $content)
    {
        return $content
            ->header('寄送道具系統')
            ->description('請確認發送的帳號')
            ->body($this->grid($this));
    }

    public function grid(){
        return view('admin.sendItem');
    }
}
