<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Model\Page;

class announcementcontentController extends Controller
{
    public function index($id)
    {
        if (isset($id)) {
            $page = Page::where('id', $id)->first();
            return view('front.announcementContent', ['page' => $page]);
        } else {
            return redirect('/');
        }

    }
}
