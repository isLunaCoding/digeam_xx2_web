<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\item_id;
use App\Model\shop;
use App\Model\shopLog;
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
                'point'=>0,
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
                    ]);
                } else {
                    return response()->json([
                        'status' => 1,
                        'msg' => $result2->msg,
                        'char_list' => [],
                        'buy_list' => $depot,
                        'item' => $shop,
                        'point' => $point,
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
            ]);
        } else {
            return response()->json([
                'status' => -99,
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
                    ]);
                }
            } else if ($shop_item->limit_type == 2) {
                $check = shopLog::where('user_id', $request->user)->where('item_id', $request->item_id)->count();
                if ($check >= $shop_item->limit_count) {
                    return response()->json([
                        'status' => -97,
                    ]);
                }
            } else if ($shop_item->limit_type == 3) {
                $check = shopLog::where('item_id', $request->item_id)->whereBetween('created_at', [$request->limit_start, $request->limit_end])->count();
                if ($check >= $shop_item->limit_count) {
                    return response()->json([
                        'status' => -97,
                    ]);
                }
            } else if ($shop_item->limit_type == 4) {
                $check = shopLog::where('user_id', $request->user)->where('item_id', $request->item_id)->whereBetween('created_at', [$request->limit_start, $request->limit_end])->count();
                if ($check >= $shop_item->limit_count) {
                    return response()->json([
                        'status' => -97,
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
            ]);
        } else {
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

    }
}
