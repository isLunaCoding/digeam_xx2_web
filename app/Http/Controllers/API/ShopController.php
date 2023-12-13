<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\item_id;
use App\Model\shop;
use App\Model\shopItemList;
use App\Model\shopLog;
use App\Model\shopSendItemLog;
use App\Model\shopUserDepot;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'login') {
            $result = ShopController::login($request);
            return $result;
        } elseif ($request->type == 'item_desc') {
            $result = ShopController::item_desc($request);
            return $result;
        } elseif ($request->type == 'buy_item') {
            $result = ShopController::buy_item($request);
            return $result;
        } elseif ($request->type == 'get_item') {
            $result = ShopController::get_item($request);
            return $result;
        };
    }
    public function login($request)
    {
        $shop = shop::where('status', 1)->orderby('sort','desc')->get();
        if (!$request->user) {
            return response()->json([
                'status' => -99,
                'item' => $shop,
                'buy_list' => false,
                'char' => false,
                'point' => 0,
                'msg' => '未登入',
            ]);
        } else {
            $depot = shopUserDepot::where('user_id', $request->user)->where('count', '>', 0)->get();
            $client = new Client();
            $data = [
                'user_id' => $request->user,
            ];
    
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];
    
            $res = $client->request('POST', 'https://webapi.digeam.com/xx2/get_point', [
                'headers' => $headers,
                'json' => $data,
            ]);
            $result = $res->getBody();
            $point = json_decode($result);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://xx2.digeam.com/api/service_api?type=getinfo&account=" . $request->user);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            $result = json_decode($result);
            if ($result->status == 0) {
                $info = $result->account_info;
                $uid = $info->uid;
                //找角色名單
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://xx2.digeam.com/api/service_api?accid=" . $uid . "&zoneid=" . 1801 . "&type=getcharlist_3party");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result2 = curl_exec($ch);
                curl_close($ch);
                $result2 = json_decode($result2);
                if ($result2->status == 0) {
                    return response()->json([
                        'status' => 1,
                        'msg' => $result2->msg,
                        'char_list' => $result2->role_info,
                        'buy_list' => $depot,
                        'item' => $shop,
                        'point' => $point,
                        'msg' => '已登入',
                    ]);
                } else {
                    return response()->json([
                        'status' => 1,
                        'msg' => $result2->msg,
                        'char_list' => [],
                        'buy_list' => $depot,
                        'item' => $shop,
                        'point' => $point,
                        'msg' => '已登入',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 1,
                    'msg' => $result->msg,
                    'char_list' => [],
                    'buy_list' => $depot,
                    'item' => $shop,
                    'point' => $point,
                    'msg' => '已登入',
                ]);
            }
        }

    }
    public function item_desc($request)
    {
        $shop = shop::where('id', $request->item_id)->first();
        if ($shop) {
            return response()->json([
                'status' => 1,
                'item_info' => $shop,
                'msg' => '道具資訊讀取成功',
            ]);
        } else {
            return response()->json([
                'status' => -99,
                'msg' => '道具資訊讀取失敗',
            ]);
        }
    }
    public function buy_item($request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }
        // 沒登入
        if (!$request->user) {
            return response()->json([
                'status' => -99,
                'msg' => '請先登入',
            ]);
        }
        $shop_item = shop::where('id', $request->item_id)->first();
        // limit_type == 1 為全服限購 2為帳號限購 3 為區間內帳號限購 4為區間內伺服器限購
        if ($shop_item->limit_type != 0) {
            if ($shop_item->limit_type == 1) {
                $check = shopLog::where('item_id', $request->item_id)->count();
                if ($check >= $shop_item->limit_count) {
                    return response()->json([
                        'status' => -97,
                        'msg' => '限購道具數量不足',
                    ]);
                }
            } else if ($shop_item->limit_type == 2) {
                $check = shopLog::where('user_id', $request->user)->where('item_id', $request->item_id)->count();
                if ($check >= $shop_item->limit_count) {
                    return response()->json([
                        'status' => -97,
                        'msg' => '限購道具數量不足',
                    ]);
                }
            } else if ($shop_item->limit_type == 3) {
                $check = shopLog::where('item_id', $request->item_id)->whereBetween('created_at', [$request->limit_start, $request->limit_end])->count();
                if ($check >= $shop_item->limit_count) {
                    return response()->json([
                        'status' => -97,
                        'msg' => '限購道具數量不足',
                    ]);
                }
            } else if ($shop_item->limit_type == 4) {
                $check = shopLog::where('user_id', $request->user)->where('item_id', $request->item_id)->whereBetween('created_at', [$request->limit_start, $request->limit_end])->count();
                if ($check >= $shop_item->limit_count) {
                    return response()->json([
                        'status' => -97,
                        'msg' => '限購道具數量不足',
                    ]);
                }
            }
        }
        // 有登入,打api確認款項和扣款
        $client = new Client();
        $data = [
            'user_id' => $request->user,
            'price' => $shop_item->price,
            'count' => $request->count,
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        $res = $client->request('POST', 'https://webapi.digeam.com/xx2/shop_buy_item', [
            'headers' => $headers,
            'json' => $data,
        ]);
        $result = $res->getBody();
        $result = json_decode($result);
        // 錢不夠
        if ($result->status == -98) {
            return response()->json([
                'status' => -98,
                'msg' => '點數不足',
            ]);
        } else {
            // 判斷是否為抽包
            if ($shop_item->item_type == 3) {
                $get_present_item = shopItemList::where('shop_id', $shop_item->id)->get();
                $min = 0;
                $max = 100;
                for ($z = 0; $z < $request->count; $z++) {
                    for ($i = 1; $i <= 10000; $i++) {
                        $target = $min + mt_rand() / mt_getrandmax() * ($max - $min);
                    }
                    $item_probability_count = 0;
                    foreach ($get_present_item as $key => $value) {
                        $item_probability_count += $value['percentage'];
                        if ($item_probability_count > $target) {
                            $get = $value;
                            break;
                        };
                    }
                    // 記錄抽包結果,並且寫入倉庫
                    $newLog = new shopLog();
                    $newLog->user_id = $request->user;
                    $newLog->ip = $real_ip;
                    $newLog->item_id = $request->item_id . '-' . $get['id'];
                    $newLog->item_name = $shop_item->title . '-' . $get['item_name'];
                    $newLog->count = 1;
                    $newLog->item_price = $shop_item->price;
                    $newLog->total_price = $shop_item->price;
                    $newLog->user_xx2_origin_point = $result->user_xx2_origin_point;
                    $newLog->user_xx2_origin_b_point = $result->user_xx2_origin_b_point;
                    $newLog->user_xx2_update_point = $result->user_xx2_update_point;
                    $newLog->user_xx2_update_b_point = $result->user_xx2_update_b_point;
                    $newLog->save();

                    //找尋玩家倉庫是否有該道具
                    $search_depot = shopUserDepot::where('user_id', $request->user)->where('item_id', $request->item_id . '-' . $get['id'])->where('reason', $shop_item->title . '-' . $get['item_name'])->first();
                    if ($search_depot) {
                        $search_depot->count += $request->count;
                        $search_depot->save();
                    } else {
                        $new_depot_item = new shopUserDepot();
                        $new_depot_item->user_id = $request->user;
                        $new_depot_item->count = 1;
                        $new_depot_item->item_id = $request->item_id . '-' . $get['id'];
                        $new_depot_item->item_name = $shop_item->title . '-' . $get['item_name'];
                        $new_depot_item->reason = $shop_item->title . '-' . $get['item_name'];
                        $new_depot_item->save();
                    }
                }
                return response()->json([
                    'status' => 1,
                    'msg' => '購買成功',
                ]);
            }
            // 寫購買紀錄
            $newLog = new shopLog();
            $newLog->user_id = $request->user;
            $newLog->ip = $real_ip;
            $newLog->item_id = $request->item_id;
            $newLog->item_name = $shop_item->title;
            $newLog->count = $request->count;
            $newLog->item_price = $shop_item->price;
            $newLog->total_price = $result->total_item_price;
            $newLog->user_xx2_origin_point = $result->user_xx2_origin_point;
            $newLog->user_xx2_origin_b_point = $result->user_xx2_origin_b_point;
            $newLog->user_xx2_update_point = $result->user_xx2_update_point;
            $newLog->user_xx2_update_b_point = $result->user_xx2_update_b_point;
            $newLog->save();

            //找尋玩家倉庫是否有該道具
            $search_depot = shopUserDepot::where('user_id', $request->user)->where('item_id', $request->item_id)->where('reason', '商城購買')->first();
            if ($search_depot) {
                $search_depot->count += $request->count;
                $search_depot->save();
            } else {
                $new_depot_item = new shopUserDepot();
                $new_depot_item->user_id = $request->user;
                $new_depot_item->count = $request->count;
                $new_depot_item->item_id = $request->item_id;
                $new_depot_item->item_name = $shop_item->title;
                $new_depot_item->reason = '商城購買';
                $new_depot_item->save();
            }
            return response()->json([
                'status' => 1,
                'msg' => '購買成功',
            ]);
        }
    }
    public function get_item($request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }
        if (!$request->user) {
            return response()->json([
                'status' => -99,
                'msg' => '未登入',
            ]);
        }
        $check = shopUserDepot::where('user_id', $request->user)->where('item_id', $request->item_id)->first();
        if (!$check) {
            return response()->json([
                'status' => -97,
                'msg' => '玩家沒有獲得此道具',
            ]);
        }
        if ($check->count <= 0) {
            return response()->json([
                'status' => -96,
                'msg' => '此道具在資料庫剩餘數量小於或等於0',
            ]);
        }

        if ($check->count - $request->count < 0) {
            return response()->json([
                'status' => -98,
                'msg' => '倉庫剩餘道具量不足',
            ]);
        }
        $check_item_type = explode('-', $request->item_id);
        if (isset($check_item_type[1])) {
            $send = shopItemList::where('id', $check_item_type[1])->get();
        } else {
            $send = shopItemList::where('id', $request->item_id)->get();
        }
        // 找uid
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://xx2.digeam.com/api/service_api?type=getinfo&account=" . $request->user);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        if ($result->status == 0) {
            $info = $result->account_info;
            $uid = $info->uid;
        }
        // 找角色
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://xx2.digeam.com/api/service_api?accid=" . $uid . "&zoneid=" . 1801 . "&type=getcharlist_3party");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result_2 = curl_exec($ch);
        curl_close($ch);
        $result_2 = json_decode($result_2);
        foreach ($result_2->role_info as $value) {
            if ($value->charid == $request->char_id) {
                $char_name = $value->name;
                break;
            }
        }
        // 派獎
        foreach ($send as $value) {
            $ch = curl_init();
            $url = "https://xx2.digeam.com/api/service_api?type=athena_email&uid=" . $uid
            . "&zoneid=" . 1801 . "&charid=" . $request->char_id . "&content=" . '您於商城購買的道具已送達,請盡速領取！' . "&title=" . '網頁商城購買道具' . "&name=" . $char_name . "&itemid=" . $value['item_id'] . "&itemnum=" . $value['item_cnt'] * $request->count . "&isbind=" . $value['is_bind'];
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result_3 = curl_exec($ch);
            curl_close($ch);
            $result_3 = json_decode($result_3);
            $status = $result_3->status;
            if ($status == 0) {
                $check->count -= $request->count;
                $check->save();

                $newLog = new shopSendItemLog();
                $newLog->user_id = $request->user;
                $newLog->ip = $real_ip;
                $newLog->count = $request->count;
                $newLog->item_code = $value['item_code'];
                $newLog->item_id = $request->item_id;
                $newLog->item_name = $check->item_name;
                $newLog->server_id = 1801;
                $newLog->char_id = $request->char_id;
                $newLog->char_name = $char_name;
                $newLog->save();
                return response()->json([
                    'status' => 1,
                    'msg' => '發送成功',
                ]);
            } else {
                return response()->json([
                    'status' => -95,
                    'msg' => '發送失敗',
                ]);
            }
        }
    }
}
