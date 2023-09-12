<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Model\Suspension_lists;

class suspensionController extends Controller
{
    public function index()
    {
        $user_list = Suspension_lists::orderBy('created_at', 'desc')->get();
        foreach ($user_list as $value) {
            $id = $value->user_id;
            $value->user_id = substr($id, 0, 1) . substr($id, 1, 1) . "***" . substr($id, -2, -1) . substr($id, -1);
            $name = $value->char_name;
            $name_len = mb_strlen($name);
            if ($name_len == 2) {
                $value->char_name = "*" . mb_substr($name, 1, 1);
            } elseif ($name_len == 3) {
                $value->char_name = "**" . mb_substr($name, 2, 2);
            } elseif ($name_len == 4) {
                $value->char_name = mb_substr($name, 0, 1) . "**" . mb_substr($name, 3, 3);
            } elseif ($name_len == 5) {
                $value->char_name = mb_substr($name, 0, 1) . "***" . mb_substr($name, -1);
            } else {
                $value->char_name = mb_substr($name, 0, 2) . "***" . mb_substr($name, -2);
            }
        }
        
        $last = Suspension_lists::orderBy('created_at', 'desc')->first();
        if ($last != null) {
            $last_time = $last->created_at;
        } else {
            $last_time = '';
        }
        return view('front.suspension', ['user_list' => $user_list, 'last_time' => $last_time]);
    }
}
