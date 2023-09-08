<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\serial_number;
use App\Model\serial_number_cate;
use Illuminate\Http\Request;

class SerialNumberController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'exchange') {
            $result = SerialNumberController::get_exchange($request);
            return $result;
        }
    }

    public function get_exchange(Request $request)
    {
        // $user_id = $request->user_id;
        // $serial_num = $request->serial_num;
        // $zoneid = $request->sever_id;
        // $charid = $request->charid;
        // $char_name = $request->char_name;
        $serial_num = $request->serial_num;

        
        //先判斷為一組一人 或 一組多人換
        $serial_type = substr($serial_num, 0, 3);
        $find_cate = serial_number_cate::where('type', $serial_type)->first();
        if ($find_cate->type == $serial_type) {
            $type = $find_cate->all_for_one;
        } else {
            //序號錯誤
            return response()->json([
                'status' => -99,
            ]);
        }


        $find_num = serial_number::where('number', $serial_num)->first();

    }
}
