<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\shop;
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
        }
    }
    public function login($request)
    {

        $shop = shop::where('status', 1)->get();
        if ($request->user) {
            return response()->json([
                'status' => 1,
                'item' => $shop,
                'buy_list' => [],
                'char' => [],
            ]);
        } else {
            return response()->json([
                'status' => -99,
                'item' => $shop,
                'buy_list' => false,
                'char' => false,
            ]);
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
}
