<?php

namespace App\Http\Controllers\API\event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class preregController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'login') {

        } else if ($request->type == 'mobile_login ') {
            $result = preregController::MobileLogin($request);
            return $result;
        } else if ($request->type == 'play_ lottery') {

        } else if ($request->type == 'play_ keep  ') {

        } else if ($request->type == 'play_ choose') {

        } else if ($request->type == 'play_ contect') {

        } else if ($request->type == 'FB_share') {

        } else if ($request->type == 'FB_follow') {

        } else if ($request->type == 'discord') {

        } else if ($request->type == 'CBT_visit') {

        } else if ($request->type == 'index_visit') {

        } else if ($request->type == 'OBT_visit') {

        } else if ($request->type == 'play_panda') {

        }
    }

    public function MobileLogin($request){
        
    }
}
