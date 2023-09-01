<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Model\Page;

class announcementController extends Controller
{
    public function index($cate = 'new')
    {
        if ($cate == 'new') {
            $list = Page::where('type', 'announcement')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('main_sort', 'asc')->paginate(11);
        } elseif ($cate == 'activity') {
            $list = Page::where('type', 'announcement')->where('cate_id', 2)->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('main_sort', 'asc')->paginate(11);
        } else {
            $list = Page::where('type', 'announcement')->where('cate_id', 3)->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('main_sort', 'asc')->paginate(11);

        }
        //最新
        return view('front.announcement', [
            'list' => $list,
        ]);
    }
}
