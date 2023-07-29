<?php

namespace App\Http\Controllers\API\event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\event\PreregUser;
class preregController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'login') {
            $result = preregController::login($request);
            return $result;
        } else if ($request->type == 'mobile_login') {
            $result = preregController::MobileLogin($request);
            return $result;
        } else if ($request->type == 'play_lottery') {

        } else if ($request->type == 'play_keep  ') {

        } else if ($request->type == 'play_choose') {

        } else if ($request->type == 'play_contect') {

        } else if ($request->type == 'FB_share') {

        } else if ($request->type == 'FB_follow') {

        } else if ($request->type == 'discord') {

        } else if ($request->type == 'CBT_visit') {

        } else if ($request->type == 'index_visit') {

        } else if ($request->type == 'OBT_visit') {

        } else if ($request->type == 'play_panda') {

        }
    }

    public function login($request){
        if($request->user == null){
            return response()->json([
                'status' => -99,
            ]);
        }
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        $checkUser = PreregUser::where('user_id',$request->user)->first();
        if(!$checkUser){
            $newUser = new PreregUser();
            $newUser->user_id = $request->user;
            $newUser->user_ip = $real_ip;
            $newUser->save();
        }
        $findUser = PreregUser::where('user_id',$request->user)->first();
        return response()->json([
            'status' => 1,
        ]);
    }
    public function MobileLogin($request){
        $checkPhoneAlreadyUser = PreregUser::where('user_mobile',$request->phone)->first();
        if($checkPhoneAlreadyUser){
            return response()->json([
                'status' => -98,
            ]);
        }
        $findUser = PreregUser::where('user_id',$request->user)->first();
        if($findUser->user_mobile !=''){
            return response()->json([
                'status' => -99,
            ]);
        }else{
            $findUser->user_mobile = $request->phone;
            $findUser->save();
            return response()->json([
                'status' => 1,
            ]);
        }
    }
}
