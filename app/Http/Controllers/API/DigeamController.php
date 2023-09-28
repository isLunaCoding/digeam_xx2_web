<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Page;

class DigeamController extends Controller
{
    public function IndexNews()
    {
        //回傳公告
        $page = Page::select('id', 'cate_id', 'title', 'created_at')->where('type', 'announcement')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('main_sort', 'desc')->get();
        return $page;
    }
}
