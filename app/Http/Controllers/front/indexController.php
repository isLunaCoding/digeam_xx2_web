<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Page;

class indexController extends Controller
{
    public function index()
    {
        //最新
        $NA = Page::where('type', 'announcement')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderby('new', 'desc')->orderBy('created_at', 'desc')->limit(7)->get();
        //活動
        $NB = Page::where('cate_id', 2)->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->limit(7)->get();
        //系統
        $NC = Page::where('cate_id', 3)->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->limit(7)->get();

        $images = Image::where('type', 'index')->where('status', 'Y')->orderBy('sort', 'asc')->get();
        $game_features = Image::where('type', 'game_features')->where('status', 'Y')->orderBy('sort', 'asc')->get();

        return view('front/index', ['NA' => $NA, 'NB' => $NB, 'NC' => $NC, 'images' => $images, 'game_features' => $game_features]);
    }
    public function launcher()
    {
        //最新
        $NA = Page::where('type', 'announcement')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderby('new', 'desc')->orderBy('created_at', 'desc')->limit(6)->get();
        //活動
        $NB = Page::where('cate_id', 2)->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->limit(6)->get();
        //系統
        $NC = Page::where('cate_id', 3)->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->limit(6)->get();

        $images = Image::where('type', 'launcher')->where('status', 'Y')->orderBy('sort', 'asc')->get();
        return view('front/launcher', ['NA' => $NA, 'NB' => $NB, 'NC' => $NC, 'images' => $images]);}
}
