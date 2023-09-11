<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Model\UUID;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'getinfo') {
            $result = ServicesController::getinfo($request);
            return $result;
        } else if ($request->type == 'athena_email') {
            $result = ServicesController::athena_email($request);
            return $result;
        } else if ($request->type == 'getcharlist_3party') {
            $result = ServicesController::getcharlist_3party($request);
            return $result;
        }
    }

    public function getinfo($request)
    {
        $url = 'http://tw-apis.sdk.mobileztgame.com/dbaccess/getinfo';

        if ($request->account == null) {
            return response()->json([
                'status' => -99,
                'msg' => '帳號未輸入',
            ]);
        }

        $client = new Client(['verify' => false]);
        $res = $client->request('GET', $url . '?account=' . $request->account . '&httptype=0');
        $reqbody = $res->getBody();
        $result_str = explode('|', $reqbody);
        if ($result_str[0] == '0') {
            $account_info = [];
            $account_array = explode('&', substr($result_str[1], 1));
            foreach ($account_array as $array) {
                $temp_array = explode('=', $array);
                $account_info[$temp_array[0]] = $temp_array[1];
            }
            return response()->json([
                'status' => 0,
                'msg' => '讀取成功',
                'account_info' => $account_info,
            ]);
        } else {
            return response()->json([
                'status' => -98,
                'msg' => '請先登入遊戲，並創立角色',
            ]);
        }
    }

    public function getcharlist_3party($request)
    {
        $url = 'http://tw-apis.sdk.mobileztgame.com/char/getcharlist_3party';

        if ($request->accid == null) {
            return response()->json([
                'status' => -99,
                'msg' => '帳號未輸入',
            ]);
        }

        if ($request->zoneid == null) {
            return response()->json([
                'status' => -98,
                'msg' => '請選擇伺服器',
            ]);
        }

        $client = new Client(['verify' => false]);
        $res = $client->request('GET', $url . '?accid=' . $request->accid . '&zoneid=' . $request->zoneid);
        $reqbody = $res->getBody();
        $result_str = json_decode(trim($reqbody), true);
        $role_info = [];
        $i = 0;

        if($result_str['ZoneRoles'][1]) {
            foreach ($result_str['ZoneRoles'][1] as $roles) {
                $role_info[$i]['acclogin'] = $roles['acclogin'];
                $role_info[$i]['charid'] = $roles['charid'];
                $role_info[$i]['name'] = $roles['name'];
                $role_info[$i]['type'] = $roles['type'];
                $i++;
            }
        }
        return response()->json([
            'status' => 0,
            'msg' => '讀取成功',
            'role_info' => $role_info,
        ]);
    }

    public function athena_email($request)
    {
        $url = 'http://tw-apis.sdk.mobileztgame.com/infotrade/athena_email';

        if ($request->uid == null) {
            return response()->json([
                'status' => -99,
                'msg' => '帳號未輸入',
            ]);
        }

        if ($request->charid == null) {
            return response()->json([
                'status' => -98,
                'msg' => '請選擇角色',
            ]);
        }

        if ($request->title == null) {
            return response()->json([
                'status' => -97,
                'msg' => '郵件標題未輸入(限32字內)',
            ]);
        }

        if ($request->content == null) {
            return response()->json([
                'status' => -96,
                'msg' => '郵件內容未輸入(限256字內)',
            ]);
        }

        if ($request->name == null) {
            return response()->json([
                'status' => -95,
                'msg' => '角色名稱未輸入(限32字內)',
            ]);
        }

        if ($request->itemid == null) {
            return response()->json([
                'status' => -94,
                'msg' => 'Item ID未輸入',
            ]);
        }

        if ($request->itemnum == null) {
            return response()->json([
                'status' => -93,
                'msg' => 'Item數量未輸入',
            ]);
        }

        if ($request->isbind == null) {
            return response()->json([
                'status' => -92,
                'msg' => '請選擇道具是否綁定',
            ]);
        }

        $uuid = UUID::create(); //生成uuid
        $tid = date('YmdHis') . strtoupper(substr($uuid, 8, 9));

        $client = new Client(['verify' => false]);
        $res = $client->request('GET', $url . '?gametype=45&zoneid=' . $request->zoneid . '&uid=' . $request->uid . '&charid=' . $request->charid . '&content=' . $request->content . '&title=' . $request->title . '&name=' . $request->name . '&tid=' . $tid . '&itemtype=7&itemid=' . $request->itemid . '&itemnum=' . $request->itemnum . '&isbind=' . $request->isbind . '&itemlvel=0&httptype=0');
        $reqbody = $res->getBody();
        $result_str = explode('|', $reqbody);
        return response()->json([
            'status' => $result_str[0],
        ]);
    }
}
