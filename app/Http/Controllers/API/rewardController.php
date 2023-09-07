<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Reward\reward_content;
use App\Model\Reward\reward_event;
use App\Model\Reward\reward_getlog;
use App\Model\Reward\reward_group;
use DateTime;
use Illuminate\Http\Request;

class rewardController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->type == 'login') {
            $result = rewardController::get_setting($request);
            return $result;
        } else if ($request->type == 'char') {
            $result = rewardController::get_char($request);
            return $result;
        } else if ($request->type == 'reward') {
            $result = rewardController::get_reward($request);
            return $result;
        } else if ($request->type == 'show') {
            $result = rewardController::show_cont($request);
            return $result;
        } else if ($request->type == 'search') {
            $result = rewardController::search($request);
            return $result;
        }
    }
    public function get_char(Request $request)
    {
        $account = $request->user_id;
        $zoneid = $request->server_id;
        //未登入
        if ($account == '' || $account == null) {
            return response()->json([
                'status' => -99,
            ]);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://xx2.digeam.com/api/service_api?type=getinfo&account=" . $account);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        if ($result->status == 0) {
            $info = $result->account_info;
            $uid = $info->uid;
            //找角色名單
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://xx2.digeam.com/api/service_api?accid=" . $uid . "&zoneid=" . $zoneid . "&type=getcharlist_3party");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result2 = curl_exec($ch);
            curl_close($ch);
            $result2 = json_decode($result2);
            if ($result2->status == 0) {
                return response()->json([
                    'status' => 1,
                    'char_list' => $result2->role_info,
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'msg' => $result2->msg,
                    'char_list' => [],
                ]);
            }
        } else {
            return response()->json([
                'status' => 1,
                'msg' => $result->msg,
                'char_list' => [],
            ]);
        }
    }
    public function get_setting(Request $request)
    {
        $list = '';
        $event_lists = reward_event::where('is_open', 'Y')->where('start_date', '<', date('Y-m-d H:i:s'))->orderby('created_at', 'desc')->get();
        foreach ($event_lists as $event_list) {
            if ((date('Y-m-d H:i:s') >= $event_list->start_date) && (date('Y-m-d H:i:s') < $event_list->end_date)) {
                $list .= "<li><a href='javascript:show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            } elseif ((date('Y-m-d H:i:s') < $event_list->start_date)) {
                $list .= "<li><a href='javascript:show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "(未開始)</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            } else {
                $list .= "<li><a href='javascript:show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "(已結束)</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            }
        }
        return response()->json([
            'status' => 1,
            'list' => $list,
        ]);
    }
    public function show_cont(Request $request)
    {
        $content = '';
        $user_id = $request->user_id;
        $event_id = $request->event_id;
        $event = reward_event::where('id', $event_id)->first();
        $start_date = $event->start_date;
        $end_date = $event->end_date;
        $group_lists = reward_group::where('event_id', $event_id)->get();
        if ($user_id == null) {
            foreach ($group_lists as $group) {
                $content_lists = reward_content::where('group_id', $group->id)->get();
                $i = 0;

                foreach ($content_lists as $content_list) {
                    if ($i == 0) {
                        $content .= "<tr><td rowspan=" . $group->tablecnt . ">" . $group->title . "</td>";
                    }
                    $content .= "<td>" . $content_list->item_name . "</td>";
                    if ($i == 0) {
                        $content .= "<td rowspan=" . $group->tablecnt . ">" . $group->remark . "</td>";
                    }
                    $content .= "<td><button class='cannotReceive'>領取</button></td><td>0</td></tr>";
                    $i++;
                }
            }
            return response()->json([
                'status' => -99,
                'title' => $event->event_name,
                'content' => $content,
            ]);
        } else {
            foreach ($group_lists as $group) {
                //不能領取
                $got_log = 'Z';
                $temp_results = reward_getlog::where('user_id', $user_id)->where('group_id', $group->id)->orderby('is_send', 'asc')->first();
                $remaining_num = reward_getlog::where('user_id', $user_id)->where('group_id', $group->id)->where('is_send', 'N')->count();
                if ($temp_results != null || $temp_results != '') {
                    if ($temp_results->is_send == 'Y') {
                        $got_log = 'Y';
                    } else {
                        //可以領取
                        $got_log = 'N';
                    }
                }
                $content_lists = reward_content::where('group_id', $group->id)->get();
                $i = 0;
                foreach ($content_lists as $content_list) {
                    if ($i == 0) {
                        $content .= "<tr><td rowspan=" . $group->tablecnt . ">" . $group->title . "</td>";
                    }
                    $content .= "<td>" . $content_list->item_name . "</td>";
                    if ($i == 0) {
                        $content .= "<td rowspan=" . $group->tablecnt . ">" . $group->remark . "</td>";
                    }

                    if ($got_log == 'Y') {
                        $content .= "<td><button class='cannotReceive'>領取</button></td><td>0</td></tr>";
                    } elseif ($got_log == 'N') {
                        $content .= "<td ><button class='receive' onclick='get_reward(" . $content_list->id . ")'>領取</button></td><td>" . $remaining_num . "</td></tr>";

                    } else {
                        $content .= "<td><button class='cannotReceive'>領取</button></td><td>0</td></tr>";
                    }
                    $i++;
                }

            }

            return response()->json([
                'status' => 1,
                'title' => $event->event_name,
                'content' => $content,
            ]);
        }

    }
    public function search(Request $request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }
        $keyword = $request->keyword;
        $year = $request->year;
        $month = $request->month;
        $list = '';
        $order = " order by created_at desc";
        $time = " start_date  < '" . date('Y-m-d H:i:s') . "' ";
        if ($keyword != null || $keyword != '') {
            $where = " where event_name like '%" . $keyword . "%'";
            if ($year == 0 && $month == 0) {
                $where .= " and " . $time;
                //純關鍵字搜尋
            } elseif ($year == 0 && $month != 0) {
                //關鍵字+月份搜尋
                $where .= " and ((Year(start_date) in ('" . date('Y') . "') and Month(start_date) in ('" . $month . "')) or (Year(end_date) in ('" . date('Y') . "') and Month(end_date) in ('" . $month . "'))) and " . $time;
            } elseif ($month == 0 && $year != 0) {
                //關鍵字+年分搜尋
                $where .= " and start_date >= '" . $year . "-01-01 00:00:00' and " . $time;
            } else {
                $where .= " and ((Year(start_date) in ('" . $year . "') and Month(start_date) in ('" . $month . "')) or (Year(end_date) in ('" . $year . "') and Month(end_date) in ('" . $month . "'))) and " . $time;
            }
        } else {
            $where = '';
            //純時間搜尋
            if ($month == 0 && $year > 0) {
                $where .= " where start_date >= '" . $year . "-01-01 00:00:00' and " . $time;
            } elseif ($year == 0 && $month > 0) {
                $where .= " where (Year(start_date) in ('" . date('Y') . "') and Month(start_date) in ('" . $month . "')) or (Year(end_date) in ('" . date('Y') . "') and Month(end_date) in ('" . $month . "')) and " . $time;
            } elseif ($year == 0 && $month == 0) {
                $where .= " where " . $time;
            } else {
                $where .= " where ((Year(start_date) in ('" . $year . "') and Month(start_date) in ('" . $month . "')) or (Year(end_date) in ('" . $year . "') and Month(end_date) in ('" . $month . "')) ) and " . $time;
            }
        }
        $sql = "SELECT * FROM reward_event" . $where . $order;
        // dd($sql);
        $db = \DB::connection('mysql');
        $db->disableQueryLog();
        $event_lists = $db->select($sql);

        foreach ($event_lists as $event_list) {
            if ((date('Y-m-d H:i:s') >= $event_list->start_date) && (date('Y-m-d H:i:s') < $event_list->end_date)) {
                $list .= "<li><a href='javascript:show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            } elseif ((date('Y-m-d H:i:s') < $event_list->start_date)) {
                $list .= "<li><a href='javascript:show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "(未開始)</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            } else {
                $list .= "<li><a href='javascript:show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "(已結束)</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            }
        }

        return response()->json([
            'status' => 1,
            'list' => $list,
        ]);
    }
    public function get_reward(Request $request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        $content_id = $request->content_id;
        $user_id = $request->user_id;
        $char_name = $request->char_name;
        $charid = $request->charid;
        $server_id = $request->server_id;

        $reward_content = reward_content::where('id', $content_id)->first();
        $event_group = reward_group::where('id', $reward_content->group_id)->first();
        $item_name = $reward_content->item_name;
        $item_code = $reward_content->item_code;
        $is_package = $reward_content->is_package;
        $title = $event_group->title;
        $event = reward_event::where('id', $event_group->event_id)->first();
        $event_name = $event->event_name;
        $content = "領獎專區";
        //找出uid
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
        
        $ch = curl_init();
        $url = "https://xx2.digeam.com/api/service_api?type=athena_email&uid=" . $uid
            . "&zoneid=" . $server_id . "&charid=" . $charid . "&content=" . $content . "&title=" . $title . "&name=" . $char_name . "&itemid=50001&itemnum=1&isbind=1";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result3 = curl_exec($ch);
        curl_close($ch);
        $result3 = json_decode($result3);

        if ($result3->status == 0) {
            //確認發獎成功，更新的get_log
            $log_info = reward_getlog::where('user_id', $user_id)->where('group_id', $event_group->id)->where('is_send', 'N')->orderby('is_send', 'asc')->first();
            $log_id = $log_info->id;
            $db = \DB::connection('mysql');
            $sql = "update reward_getlog set server_id ='" . $server_id . "',char_name = '" . $char_name . "', charid = '" . $charid . "',item_name ='" . $item_name . "', is_send = 'Y', item_code = '" . $item_code . "',user_ip = '" . $real_ip . "',remark ='" . $event_name . "-" . $title . "' where id =" . $log_id;
            $db->disableQueryLog();
            $event_info = $db->statement($sql);
            return response()->json([
                'status' => 1,
            ]);
        } else {
            return response()->json([
                'status' => -99,
            ]);
        }

    }

}
