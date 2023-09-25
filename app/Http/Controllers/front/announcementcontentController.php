<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Model\Page;

class announcementcontentController extends Controller
{
    public function index($id)
    {
        if ($_SERVER['HTTP_CF_CONNECTING_IP'] == '211.23.144.219') {
            $page = Page::where('id', $id)->first();
            return view('front.announcementContent', ['page' => $page]);
        } else {
            $page = Page::where('id', $id)->where('open', 'Y')->first();
            if ($page) {
                return view('front.announcementContent', ['page' => $page]);
            } else {
                return redirect('/');
            }
        }
    }
}
