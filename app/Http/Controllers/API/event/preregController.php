<?php

namespace App\Http\Controllers\API\event;

use App\Http\Controllers\Controller;
use App\Model\event\DrawCardChance;
use App\Model\event\PandaGuessLog;
use App\Model\event\PreregUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            $result = preregController::PlayLottery($request);
            return $result;
        } else if ($request->type == 'play_keep') {
            $result = preregController::PlayKeep($request);
            return $result;
        } else if ($request->type == 'play_choose') {
            $result = preregController::PlayChoose($request);
            return $result;
        } else if ($request->type == 'play_choose_30') {
            $result = preregController::PlayChoose30($request);
            return $result;
        } else if ($request->type == 'play_contect') {

        } else if ($request->type == 'mission') {
            $result = preregController::mission($request);
            return $result;
        } else if ($request->type == 'play_panda') {
            $result = preregController::playPanda($request);
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

        $checkUser = PreregUser::where('user_id', $request->user)->first();
        if (!$checkUser) {
            $newUser = new PreregUser();
            $newUser->user_id = $request->user;
            $newUser->user_ip = $real_ip;
            $newUser->save();
        }
        $findUser = PreregUser::where('user_id', $request->user)->first();
        if ($findUser->celebrity != '') {
            $celebrity = explode('_', $findUser->celebrity);
        } else {
            $celebrity = null;
        }
        if ($findUser->keep_celebrity != '') {
            $keep_celebrity = $findUser->keep_celebrity;
        } else {
            $keep_celebrity = null;
        }

        $today = Carbon::today();
        $daily_login = DrawCardChance::where('user_id', $request->user)->where('add_reason','daily_login')->where('created_at','>',$today)->first();
        $daily_FB = DrawCardChance::where('user_id', $request->user)->where('add_reason','daily_FB')->where('created_at','>',$today)->first();
        $fb_fans_click = DrawCardChance::where('user_id', $request->user)->where('add_reason','fb_fans_click')->first();
        return response()->json([
            'status' => 1,
            'race_total_answer' => $findUser->race_total_answer,
            'visit_frequency' => $findUser->visit_frequency,
            'distance_30' => $findUser->distance_30,
            'celebrity' => $celebrity,
            'keep_celebrity' => $keep_celebrity,
            'race_total_answer' => $findUser->race_total_answer,
            'race_correct' => $findUser->race_correct,
            'user_mobile'=>$findUser->user_mobile,
            'daily_login'=>$daily_login,
            'daily_FB'=>$daily_FB,
            'fb_fans_click'=>$fb_fans_click,
        ]);
    }
    public function MobileLogin($request)
    {
        $checkPhoneAlreadyUser = PreregUser::where('user_mobile', $request->phone)->first();
        if ($checkPhoneAlreadyUser) {
            return response()->json([
                'status' => -98,
            ]);
        }
        $findUser = PreregUser::where('user_id', $request->user)->first();
        if ($findUser->user_mobile != '') {
            return response()->json([
                'status' => -99,
            ]);
        } else {
            $findUser->user_mobile = $request->phone;
            $findUser->pre_time = Carbon::now();
            $findUser->save();
            return response()->json([
                'status' => 1,
            ]);
        }
    }
    public function PlayLottery($request)
    {
        $checkUser = PreregUser::where('user_id', $request->user)->first();
        if ($checkUser->user_mobile == null) {
            return response()->json([
                'status' => -99,
            ]);
        }
        if ($checkUser->visit_frequency <= 0) {
            return response()->json([
                'status' => -98,
            ]);
        }
        for ($i = 0; $i < 100; $i++) {
            $getColor = rand(1, 100);
        }
        if ($getColor > 0 && $getColor <= 5) {
            $color = 'orange';
            $rand = rand(1, 3);
            $card = 'Ocard' . $rand;
        } else if ($getColor > 5 && $getColor <= 15) {
            $color = 'purple';
            $rand = rand(1, 6);
            $card = 'Pcard' . $rand;
        } else if ($getColor > 15 && $getColor <= 35) {
            $color = 'blue';
            $rand = rand(1, 3);
            $card = 'Bcard' . $rand;
        } else if ($getColor > 35 && $getColor <= 65) {
            $color = 'green';
            $rand = rand(1, 5);
            $card = 'Gcard' . $rand;
        } else {
            $color = 'white';
            $rand = rand(1, 3);
            $card = 'Wcard' . $rand;
        }
        $checkUser->visit_frequency -= 1;
        $checkUser->distance_30 += 1;
        $checkUser->save();
        if ($checkUser->celebrity == null) {
            return response()->json([
                'status' => 1,
                'color' => $color,
                'rand' => $rand,
            ]);
        } else {
            return response()->json([
                'celebrity' => $checkUser->celebrity,
                'status' => 1,
                'color' => $color,
                'rand' => $rand,
            ]);
        }
    }
    public function mission($request)
    {
        $checkUser = PreregUser::where('user_id', $request->user)->first();
        if ($checkUser->user_mobile == '') {
            return response()->json([
                'status' => -98,
            ]);
        }
        if ($request->mission_type != 'daily_login' && $request->mission_type != 'daily_FB') {
            $check = DrawCardChance::where('user_id', $request->user)->where('add_reason', $request->mission_type)->first();
            if ($check) {
                return response()->json([
                    'status' => -99,
                ]);
            } else {
                $checkUser->visit_frequency += 2;
                $checkUser->save();

                $new = new DrawCardChance();
                $new->user_id = $request->user;
                $new->add_chance = 2;
                $new->add_reason = $request->mission_type;
                $new->save();

                return response()->json([
                    'status' => 1,
                ]);
            }
        } else {
            $today = Carbon::today();
            $check = DrawCardChance::where('user_id', $request->user)->where('add_reason', $request->mission_type)->orderby('created_at', 'desc')->first();
            if ($check && ($check->created_at > $today)) {
                return response()->json([
                    'status' => -99,
                ]);
            } else {
                if ($request->mission_type == 'daily_login') {
                    $add = 1;
                } else {
                    $add = 2;
                }
                $checkUser->visit_frequency += $add;
                $checkUser->save();

                $new = new DrawCardChance();
                $new->user_id = $request->user;
                $new->add_chance = $add;
                $new->add_reason = $request->mission_type;
                $new->save();

                return response()->json([
                    'status' => 1,
                ]);
            }
        }
    }
    public function PlayChoose($request)
    {
        $checkUser = PreregUser::where('user_id', $request->user)->first();
        $checkUser->celebrity = $request->color . '_' . $request->rand;
        $checkUser->save();
        return response()->json([
            'status' => 1,
        ]);
    }
    public function PlayChoose30($request)
    {
        $checkUser = PreregUser::where('user_id', $request->user)->first();
        if($checkUser->visit_frequency>=0){
            $checkUser->celebrity = $request->color . '_' . $request->rand;
            $checkUser->visit_frequency -= 1;
            $checkUser->distance_30 -= 30;
            $checkUser->save();
            return response()->json([
                'status' => 1,
            ]);
        }else{
            return response()->json([
                'status' => -99,
            ]);
        }
    }
    public function PlayKeep($request)
    {
        $finUser = PreregUser::where('user_id', $request->user)->first();
        $finUser->keep_celebrity = $finUser->celebrity;
        $finUser->save();

        return response()->json([
            'status' => 1,
        ]);
    }
    public function playPanda($request)
    {
        $today = Carbon::today();
        $check = PandaGuessLog::where('user_id', $request->user)->where('created_at', '>', $today)->first();
        if (1>2) {
            return response()->json([
                'status' => -99,
            ]);
        } else {
            $findUser = PreregUser::where('user_id', $request->user)->first();
            if ($request->user_guess == $request->answer) {
                $findUser->race_total_answer += 1;
                $findUser->race_correct += 1;
                $findUser->save();
                $result = '正確';
            } else {
                $findUser->race_total_answer += 1;
                $findUser->save();
                $result = '錯誤';
            }

            $new = new PandaGuessLog();
            $new->user_id =$request->user;
            $new->guess =$request->user_guess;
            $new->answer =$request->answer;
            $new->result =$result;
            $new->save();
            return response()->json([
                'status' => 1,
            ]);
        }
    }
}
