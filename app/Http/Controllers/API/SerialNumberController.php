<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\serial_item;
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
        $user_id = $request->user_id;
        $serial_num = $request->serial_num;
        $server_id = $request->sever_id;
        $charid = $request->charid;
        $char_name = $request->char_name;

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        //判斷序號type
        $type = substr($serial_num, 0, 3);
        $find_cate = serial_number_cate::where('type', $type)->first();
        if ($find_cate != '' || $find_cate != null) {
            if ($find_cate->type == $type) {
                $cate = $find_cate->type;
                $serial_type = $find_cate->all_for_one;
                $limit_times = $find_cate->limit_times;
            } else {
                //序號錯誤
                return response()->json([
                    'status' => -99,
                ]);
            }
        } else {
            return response()->json([
                'status' => -99,
            ]);
        }
        //兌換時間檢查
        $sdate = $find_cate->start_date;
        $edate = $find_cate->end_date;
        if ($sdate == "0000-00-00 00:00:00" || $sdate == null) {
        } else {
            if ($sdate > date('Y-m-d H:i:s') || $edate < date('Y-m-d H:i:s')) {
                return response()->json([
                    'status' => -98,
                ]);
            }
        }
        //萬用序號剩餘次數
        if ($serial_type == 'Y') {
            //兌換數量查詢
            $total_num = $find_cate->remainder;
            $used = serial_number::where('number', $serial_num)->count();
            $remainder = $total_num - $used + 1;
            if ($remainder <= 0) {
                return response()->json([
                    'status' => -96,
                ]);
            }
        }
        //是否有領取次數限制
        if ($limit_times != 0) {
            $find_record = serial_number::where('type', $cate)->where('user_id', $user_id)->count();
            if ($find_record >= $limit_times) {
                return response()->json([
                    'status' => -94,
                ]);
            }
        }
        //序號是否被使用過
        if ($serial_type == 'N') {
            //檢查是否有此序號
            $find_num = serial_number::where('number', $serial_num)->first();
            if ($find_num != '' || $find_num != null) {
                if ($find_num->number == $serial_num) {
                } else {
                    return response()->json([
                        'status' => -99,
                    ]);
                }
            } else {
                return response()->json([
                    'status' => -99,
                ]);
            }
            //檢查狀態
            if ($find_num->status == 'Y') {
                return response()->json([
                    'status' => -97,
                ]);
            }
        } else {
            $find_num = serial_number::where('number', $serial_num)->orderBy('id', 'asc')->first();
            if ($find_num != '' || $find_num != null) {
                if ($find_num->number == $serial_num) {
                } else {
                    return response()->json([
                        'status' => -99,
                    ]);
                }
            } else {
                return response()->json([
                    'status' => -99,
                ]);
            }
        }

        //發獎 找出uid
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://xx2.digeam.com/api/service_api?type=getinfo&account=" . $user_id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        if ($result->status == 0) {
            $info = $result->account_info;
            $uid = $info->uid;
        }
        //發獎API
        $status = 0;
        $item_lists = serial_item::where('cate_id', $find_cate->id)->get();
        foreach ($item_lists as $value) {
            $item_code = $value->item_code;
            $itemcnt = $value->itemcnt;
            $isbind = $value->isbind;
            $content = '序號兌換-' . $find_cate->title;
            $title = '序號';
            $ch = curl_init();
            $url = "https://xx2.digeam.com/api/service_api?type=athena_email&uid=" . $uid
                . "&zoneid=" . $server_id . "&charid=" . $charid . "&content=" . $content . "&title=" . $title . "&name=" . $char_name . "&itemid=" . $item_code . "&itemnum=" . $itemcnt . "&isbind=" . $isbind;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result3 = curl_exec($ch);
            curl_close($ch);
            $result3 = json_decode($result3);
            if ($result3->status != 0) {
                $status = $result3->status;
            }
        }
        if ($status == 0) {
            if ($serial_type == 'Y') {
                $createlog = new serial_number();
                $createlog->type = $find_num->type;
                $createlog->number = $find_num->number;
                $createlog->status = 'Y';
                $createlog->user_id = $user_id;
                $createlog->user_ip = $real_ip;
                $createlog->save();
            } else {
                $find_num->status = 'Y';
                $find_num->user_id = $user_id;
                $find_num->user_ip = $real_ip;
                $find_num->save();
            }
            return response()->json([
                'status' => 1,
            ]);
        } else {
            return response()->json([
                'status' => -95,
            ]);
        }
    }
}
