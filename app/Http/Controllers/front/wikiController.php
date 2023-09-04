<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Page;

class wikiController extends Controller
{
    public function index($id = 38)
    {
        if (isset($_GET['keyword']) && $_GET['keyword'] != null) {
            $lists = Category::where('type', 'wiki')->where('open', 'Y')->orderby('parent_id', 'asc')->orderby('sort', 'asc')->get();
            $sec_lists = $lists->groupby('parent_id');
            $sec_cate = [];
            $in_array = [];
            foreach ($lists as $value) {
                if (!in_array($value->cate_id, $in_array)) {
                    $all = Page::where('type', 'wiki')->where('open', 'Y')->get();
                    $count = 0;
                    foreach ($all as $value2) {
                        if ($value2->cate_id == $value->cate_id) {
                            $count++;
                        }
                    }
                    if ($value->parent_id == 0) {
                        $sec_cate[$value->cate_id]['title'] = $value->title;
                        $sec_cate[$value->cate_id]['id'] = $value->id;
                        $sec_cate[$value->cate_id]['cate_id'] = $value->cate_id;
                        $sec_cate[$value->cate_id]['parent_id'] = $value->parent_id;
                        $sec_cate[$value->cate_id]['count'] = $count;
                        array_push($in_array, $value->cate_id);
                    } else {
                        $sec_cate[$value->cate_id]['title'] = $value->title;
                        $sec_cate[$value->cate_id]['cate_id'] = $value->cate_id;
                        $sec_cate[$value->cate_id]['parent_id'] = $value->parent_id;
                        $sec_cate[$value->cate_id]['count'] = $count;
                        array_push($in_array, $value->cate_id);
                    }
                }
            }
            $all = Page::where('type', 'wiki')->where('open', 'Y')->orderby('main_sort', 'asc')->get();
            $all_page = $all->groupby('cate_id');

            $keyword = $_GET['keyword'];
            $fix_keyword = wikiController::RemoveSpecialChar($keyword);
            $result = Page::where('type', 'wiki')->where('open', 'Y')->where(function ($query) use ($keyword, $fix_keyword) {
                $query->where('title', 'like', $keyword)->orWhere('content', 'like', "%" . $fix_keyword . "%");
            })->paginate(10);
            return view('front.wiki', ['type' => 'search', 'sec_cate' => $sec_cate, 'all_page' => $all_page, 'result' => $result]);
        } else {
            $lists = Category::where('type', 'wiki')->where('open', 'Y')->orderby('parent_id', 'asc')->orderby('sort', 'asc')->get();
            $sec_lists = $lists->groupby('parent_id');
            $sec_cate = [];
            $in_array = [];
            foreach ($lists as $value) {
                if (!in_array($value->cate_id, $in_array)) {
                    $all = Page::where('type', 'wiki')->where('open', 'Y')->get();
                    $count = 0;
                    foreach ($all as $value2) {
                        if ($value2->cate_id == $value->cate_id) {
                            $count++;
                        }
                    }
                    if ($value->parent_id == 0) {
                        $sec_cate[$value->cate_id]['title'] = $value->title;
                        $sec_cate[$value->cate_id]['id'] = $value->id;
                        $sec_cate[$value->cate_id]['cate_id'] = $value->cate_id;
                        $sec_cate[$value->cate_id]['parent_id'] = $value->parent_id;
                        $sec_cate[$value->cate_id]['count'] = $count;
                        array_push($in_array, $value->cate_id);
                    } else {
                        $sec_cate[$value->cate_id]['title'] = $value->title;
                        $sec_cate[$value->cate_id]['cate_id'] = $value->cate_id;
                        $sec_cate[$value->cate_id]['parent_id'] = $value->parent_id;
                        $sec_cate[$value->cate_id]['count'] = $count;
                        array_push($in_array, $value->cate_id);
                    }
                }
            }
            $all = Page::where('type', 'wiki')->where('open', 'Y')->orderby('main_sort', 'asc')->get();
            $all_page = $all->groupby('cate_id');
            $page = Page::where('id', $id)->first();
            // dd($sec_cate,$all_page);
            return view('front.wiki', ['type' => 'content', 'sec_cate' => $sec_cate, 'all_page' => $all_page, 'page' => $page]);
        }

    }
    //去除特殊符號
    public function RemoveSpecialChar($str)
    {
        $res = $str;
        $res = preg_replace('/[\@\.\%\_\;\^><\" "]+/', '', $str);
        return $res;
    }

}
