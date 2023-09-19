<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Model\Page;

class announcementcontentController extends Controller
{
    public function index($id)
    {
        $page = Page::where('id', $id)->where('open', 'Y')->first();
        if ($page) {
            return view('front.announcementContent', ['page' => $page]);
        } else {
            return redirect('/');
        }
    }
}
