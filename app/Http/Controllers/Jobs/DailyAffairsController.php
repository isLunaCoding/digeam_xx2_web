<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Model\change_point_log;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;

class DailyAffairsController extends Controller
{
    public function upgrade_xx2_news()
    {
        Log::info('公告排程更新');
        $client = new Client();
        $res = $client->request('POST', 'https://digeam.com/api/get_xx2_news');
    }
    public function upgrade_ChangePointLog()
    {
        $client = new Client();
        $res = $client->request('POST', 'https://digeam.com/api/get_xx2change_log');
        $result = $res->getBody();
        $result = json_decode($result);
        foreach ($result as $value) {
            $check = change_point_log::where('user_id', $value->user_id)->where('c_point', $value->c_point)->where('created_at', $value->created_at)->first();
            if (!$check) {
                $new = new change_point_log();
                $new->user_id = $value->user_id;
                $new->c_point = $value->c_point;
                $new->cb_point = $value->cb_point;
                $new->created_at = $value->created_at;
                $new->updated_at = $value->created_at;
                $new->save();
                Log::info('轉點紀錄更新');
            }
        }
    }
}
