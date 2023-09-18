<?php

namespace App\Http\Controllers\API\event;

use App\Http\Controllers\Controller;
use App\Model\event\CBT_Buy_Log;
use App\Model\event\CBT_Report;
use App\Model\event\CBT_Play_Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CBTController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'login') {
            $result = CBTController::login($request);
            return $result;
        } else if ($request->type == 'buy_gift') {
            $result = CBTController::buy_gift($request);
            return $result;
        } else if ($request->type == 'play') {
            $result = CBTController::play($request);
            return $result;
        } else if ($request->type == 'report') {
            $result = CBTController::report($request);
            return $result;
        }
    }

    public function login($request)
    {
        if ($request->user == null) {
            return response()->json([
                'status' => -99,
            ]);
        }
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        $client = new Client(['verify' => false]);
        $res = $client->request('POST', 'http://testapi.digeam.com/billing/get_balance', [
            'form_params' => [
                'user_id' => $request->user,
                'user_ip' => '192.168.0.41',
                'game_service' => 'CGAMEXX2018',
                'server_id' => '1899',
                'char_id' => 0,
            ],
        ]);
        $reqbody = $res->getBody();
        $reqbody = json_decode($reqbody);
        //$result = $reqbody->RetVal;
        if ($reqbody->RetVal == '0') {
            $points = intval($reqbody->game_point);
        } else {
            $points = 0;
        }

        $checkPlayToday = CBT_Play_Log::where('user_id', $request->user)->whereBetween('created_at', [date('Y-m-d').' 00:00:00', date('Y-m-d').' 23:59:59'])->first();
        if (!$checkPlayToday) {
            $play_status = -99;
        } else {
            $play_status = 1;
        }

        $play_times = CBT_Play_Log::where('user_id', $request->user)->count();
        
        $checkGift299 = CBT_Buy_Log::where([['user_id', '=', $request->user],['package_name', '=', '靈氣初現禮包']])->first();
        if (!$checkGift299) {
            $gift299_status = -99;
        } else {
            $gift299_status = 1;
        }

        $checkGift999 = CBT_Buy_Log::where([['user_id', '=', $request->user],['package_name', '=', '仙獸羈絆禮包']])->first();
        if (!$checkGift999) {
            $gift999_status = -99;
        } else {
            $gift999_status = 1;
        }

        $checkGift2690 = CBT_Buy_Log::where([['user_id', '=', $request->user],['package_name', '=', '修真之寶禮包']])->first();
        if (!$checkGift2690) {
            $gift2690_status = -99;
        } else {
            $gift2690_status = 1;
        }

        return response()->json([
            'status' => 1,
            'user' => $request->user,
            'points' => $points,
            'play_status' => $play_status,
            'play_times' => $play_times,
            'gift299_status' => $gift299_status,
            'gift999_status' => $gift999_status,
            'gift2690_status' => $gift2690_status,
        ]);
    }

    public function buy_gift($request)
    {
        if ($request->user == null) {
            return response()->json([
                'status' => -99,
            ]);
        }
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        $client = new Client(['verify' => false]);
        $res = $client->request('POST', 'http://testapi.digeam.com/billing/get_balance', [
            'form_params' => [
                'user_id' => $request->user,
                'user_ip' => '192.168.0.41',
                'game_service' => 'CGAMEXX2018',
                'server_id' => '1899',
                'char_id' => 0,
            ],
        ]);
        $reqbody = $res->getBody();
        $reqbody = json_decode($reqbody);
        //$result = $reqbody->RetVal;
        if ($reqbody->RetVal == '0') {
            $points = intval($reqbody->game_point);
        } else {
            $points = 0;
        }

        if(($request->gift != 299)&&($request->gift != 999)&&($request->gift != 2690)) {
            return response()->json([
                'status' => -98,
            ]);
        }

        if($points < $request->gift) {
            return response()->json([
                'status' => -97,
            ]);
        }

        if($request->gift == 299) {
            $package_name = '靈氣初現禮包';
        }

        if($request->gift == 999) {
            $package_name = '仙獸羈絆禮包';
        }

        if($request->gift == 2690) {
            $package_name = '修真之寶禮包';
        }

        $checkGift = CBT_Buy_Log::where([['user_id', '=', $request->user],['package_name', '=', $package_name]])->count();
        if($checkGift > 0) {
            return response()->json([
                'status' => -96,
            ]);
        }

        $client = new Client(['verify' => false]);
        $res = $client->request('POST', 'http://testapi.digeam.com/billing/purchase', [
            'form_params' => [
                'user_id' => $request->user,
                'user_ip' => '192.168.0.41',
                'game_service' => 'CGAMEXX2018',
                'purchase_name' => $package_name,
                'purchase_cnt' => 1,
                'unit_price' => $request->gift,
                'total_price' => $request->gift,
                'server_id' => '1899',
                'char_id' => 0,
            ],
        ]);
        $reqbody = $res->getBody();
        $reqbody = json_decode($reqbody);
        //$result = $reqbody->RetVal;
        if ($reqbody->RetVal == '0') {
            $createLog = new CBT_Buy_Log();
            $createLog->user_id = $request->user;
            $createLog->package_name = $package_name;
            $createLog->price = $request->gift;
            $createLog->user_ip = $real_ip;
            $createLog->save();

            return response()->json([
                'status' => 1,
            ]);
        } else {
            return response()->json([
                'status' => $reqbody->RetVal,
            ]);
        }
    }

    public function play($request)
    {
        if ($request->user == null) {
            return response()->json([
                'status' => -99,
            ]);
        }
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        //$checkPlayToday = CBT_Play_Log::where('user_id', $request->user)->whereBetween('created_at', [date('Y-m-d').' 00:00:00', date('Y-m-d').' 23:59:59'])->count();
        //if ($checkPlayToday > 0) {
        //    return response()->json([
        //        'status' => -98,
        //    ]);
        //}

        $createLog = new CBT_Play_Log();
        $createLog->user_id = $request->user;
        $createLog->user_ip = $real_ip;
        $createLog->save();

        return response()->json([
            'status' => 1,
        ]);
    }

    public function report($request)
    {
        if ($request->user == null) {
            return response()->json([
                'status' => -99,
            ]);
        }
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        if ($request->bug_report == null) {
            return response()->json([
                'status' => -97,
            ]);
        }

        if ($request->bug_report_txt == null) {
            return response()->json([
                'status' => -96,
            ]);
        }

        if (($request->bug_report_img != 'null')&&($request->bug_report_img != '')) {
            $setDay = date('Y-m-d-h-i-s');
            $image = $request->bug_report_img;
            $ifPng = explode('data:image/png;base64', $request->bug_report_img);
            $ifJpg = explode('data:image/jpeg;base64', $request->bug_report_img);

            //echo count($ifPng).' '.count($ifJpg);

            if (count($ifPng) == 2) {
                $image = str_replace('data:image/png;base64,', '', $image);
                $imageName = $setDay.'-'.$request->user.'-report.png';
            } elseif (count($ifJpg) == 2) {
                $image = str_replace('data:image/jpeg;base64,', '', $image);
                $imageName =  $setDay.'-'.$request->user.'-report.jpg';
            } else {
                return response()->json([
                    'status' => -98,
                ]);
            }

            $image = str_replace(' ', '+', $image);
            \File::put(public_path() . '/upload/report/' . $imageName, base64_decode($image));

            $newCbtEvent = new CBT_Report();
            $newCbtEvent->user_id = $request->user;
            $newCbtEvent->title = $request->bug_report;
            $newCbtEvent->content = $request->bug_report_txt;
            $newCbtEvent->img = $imageName;
            $newCbtEvent->user_ip = $real_ip;
            $newCbtEvent->save();
            return response()->json([
                'status' => 1,
            ]);
        }else{
            $newCbtEvent = new CBT_Report();
            $newCbtEvent->user_id = $request->user;
            $newCbtEvent->title = $request->bug_report;
            $newCbtEvent->content = $request->bug_report_txt;
            $newCbtEvent->user_ip = $real_ip;
            $newCbtEvent->save();
            return response()->json([
                'status' => 1,
            ]);
        }
    }
}
