<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\event\CBT_Buy_Log;
use App\Model\event\PandaGuessLog;
use App\Model\event\PreregUser;
use App\Model\Reward\package_item;
use App\Model\Reward\reward_content;
use App\Model\Reward\reward_event;
use App\Model\Reward\reward_getlog;
use App\Model\Reward\reward_group;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class rewardController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->type == 'login') {
            $result = rewardController::get_setting($request);
            return $result;
        } elseif ($request->type == 'char') {
            $result = rewardController::get_char($request);
            return $result;
        } elseif ($request->type == 'reward') {
            $result = rewardController::get_reward($request);
            return $result;
        } elseif ($request->type == 'show') {
            $result = rewardController::show_cont($request);
            return $result;
        } elseif ($request->type == 'search') {
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
        $user_id = $request->user_id;
        if ($user_id != '') {
            if ($user_id == 'xx2digeam01' || $user_id == 'xx2digeam02' || $user_id == 'xx2digeam03' || $user_id == 'xx2digeam04' || $user_id == 'minnn112') {
                //mycard1000
                if ((date('YmdHis') >= '20231006000000')) {
                    $db = \DB::connection('mysql');
                    $client = new Client();
                    $data = [
                        'user_id' => $user_id,
                        'sdate' => '2023-10-01 12:00:00',
                        'edate' => '2023-11-19 23:59:59',
                        'PromoCode' => 'E8048',
                    ];

                    $headers = [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ];

                    $res = $client->request('POST', 'https://webapi.digeam.com/xx2/getMyCardLog', [
                        'headers' => $headers,
                        'json' => $data,
                    ]);
                    $result = $res->getBody();
                    $result = json_decode($result);
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '8')->count();
                    while ($eventNum < $result) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',8,'mycard儲值回饋1000')";
                        $event_info = $db->statement($sql);
                        $eventNum++;
                    }
                    \DB::disconnect('mysql');
                }
                //mycard500
                if ((date('YmdHis') >= '20231006000000')) {
                    $db = \DB::connection('mysql');
                    $client = new Client();
                    $data = [
                        'user_id' => $user_id,
                        'sdate' => '2023-10-01 12:00:00',
                        'edate' => '2023-11-19 23:59:59',
                        'PromoCode' => 'E8052',
                    ];

                    $headers = [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ];

                    $res = $client->request('POST', 'https://webapi.digeam.com/xx2/getMyCardLog', [
                        'headers' => $headers,
                        'json' => $data,
                    ]);
                    $result = $res->getBody();
                    $result = json_decode($result);
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '7')->count();
                    while ($eventNum < $result) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',7,'mycard儲值回饋500')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
                        $eventNum++;
                    }
                    \DB::disconnect('mysql');
                }
                //熊貓
                if ((date('YmdHis') >= '20231006000000')) {
                    $db = \DB::connection('mysql');
                    //猜對次數
                    $successNum = PandaGuessLog::where('user_id', $user_id)->where('result', '正確')->count();

                    if ($successNum >= 1) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '12')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',12,'猜對次數1')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($successNum >= 3) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '13')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',13,'猜對次數3')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($successNum >= 5) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '14')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',14,'猜對次數5')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($successNum >= 7) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '15')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',15,'猜對次數7')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($successNum >= 10) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '16')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',16,'猜對次數10')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    //累積次數
                    $accumlateNum = PandaGuessLog::where('user_id', $user_id)->count();
                    if ($accumlateNum >= 5) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '17')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',17,'累積次數5')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($accumlateNum >= 10) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '18')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',18,'累積次數10')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($accumlateNum >= 15) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '19')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',19,'累積次數15')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($accumlateNum >= 20) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '20')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',20,'累積次數20')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($accumlateNum >= 30) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '30')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',30,'累積次數30')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    \DB::disconnect('mysql');
                }
                //初出江湖
                if ((date('YmdHis') >= '20231019120000')) {
                    $db = \DB::connection('mysql');
                    $user_info = PreregUser::where('user_id', $user_id)->where('user_mobile', '!=', '')->first();
                    if ($user_info != null) {
                        $event_infos = reward_getlog::where('group_id', '9')->where('user_id', $user_id)->count();
                        if ($event_infos == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',9,'九色神鹿')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',10,'寶石兌換券')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',11,'洪福齊天符')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    \DB::disconnect('mysql');
                }
                //綁定名士
                if ((date('YmdHis') >= '20231011120000') && (date('YmdHis') <= '20231231235959')) {
                    $celebrity = PreregUser::where('user_id', $user_id)->first();
                    $db = \DB::connection('mysql');
                    if ($celebrity != null) {
                        $event_infos = reward_getlog::where('group_id', '6')->where('user_id', $user_id)->count();
                        if ($event_infos == 0) {
                            $c = ['orange_1', 'orange_2', 'orange_3', 'purple_1', 'purple_2', 'purple_3', 'purple_4', 'purple_5', 'purple_6', 'blue_1', 'blue_2', 'blue_3', 'green_1', 'green_2', 'green_3', 'green_4', 'green_5', 'white_1', 'white_2', 'white_3'];
                            $c_name = ['七花獸百花仙靈', '仙道盟主沈仲陽', '愛之紅娘', '仙道盟訓誡長老', '仙道盟執法長老', '仙道盟傳功長老', '仙道盟掌刑長老', '天魔影煞', '天魔計都', '愛之月老', '吞靈獸', '齊天大聖', '不死冰骷髏', '不死霜骷髏', '開明獸', '冰麒麟', '寒冰巨甲', '愛之隨從', '愛之花童', '愛之禮官'];
                            $bind_c = $celebrity->keep_celebrity;
                            $now_c = $celebrity->celebrity;
                            if ($now_c != null) {
                                if ((date('YmdHis') < '20231026000000')) {
                                    if ($bind_c != null) {
                                        $index = array_search($bind_c, $c);
                                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',6,'" . $c_name[$index] . "')";
                                        $db->disableQueryLog();
                                        $event_info = $db->statement($sql);
                                    }
                                } else {
                                    if ($bind_c != null) {
                                        $index = array_search($bind_c, $c);
                                    } else {
                                        $index = array_search($now_c, $c);
                                    }
                                    $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',6,'" . $c_name[$index] . "')";
                                    $db->disableQueryLog();
                                    $event_info = $db->statement($sql);
                                }
                            }
                        }
                    }
                    \DB::disconnect('mysql');
                }
                //prereg禮包
                if ((date('YmdHis') >= '20231019000000')) {
                    // $id = MemberRecord::getUserInfo($user_id);
                    $db = \DB::connection('mysql');
                    $user_info = CBT_Buy_Log::where('user_id', $user_id)->where('price', '299')->count();
                    if ($user_info > 0) {
                        $event_infos = reward_getlog::where('group_id', '3')->where('user_id', $user_id)->count();
                        if ($event_infos == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',3,'靈氣初現禮包')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }

                    $user_info = CBT_Buy_Log::where('user_id', $user_id)->where('price', '999')->count();
                    if ($user_info > 0) {
                        $event_infos = reward_getlog::where('group_id', '4')->where('user_id', $user_id)->count();
                        if ($event_infos == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',4,'仙獸羈絆禮包')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }

                    $user_info = CBT_Buy_Log::where('user_id', $user_id)->where('price', '2690')->count();
                    if ($user_info > 0) {
                        $event_infos = reward_getlog::where('group_id', '5')->where('user_id', $user_id)->count();
                        if ($event_infos == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',5,'修真之寶禮包')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    \DB::disconnect('mysql');
                }
            }

        }

        if ($_SERVER['HTTP_CF_CONNECTING_IP'] != '211.23.144.219') {
            $event_lists = reward_event::where('is_open', 'Y')->where('start_date', '<', date('Y-m-d H:i:s'))->orderby('id', 'desc')->get();
        } else {
            $event_lists = reward_event::orderby('start_date', 'desc')->get();
        }

        foreach ($event_lists as $event_list) {
            if ((date('Y-m-d H:i:s') >= $event_list->start_date) && (date('Y-m-d H:i:s') < $event_list->end_date)) {
                $list .= "<li><a href='#boxDown'  onclick='show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            } else {
                if (date('Y-m-d H:i:s') < $event_list->start_date) {
                    $list .= "<li><a href='#boxDown'  onclick='show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "(未開始)</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
                }
                if (date('Y-m-d H:i:s') >= $event_list->end_date) {
                    $list .= "<li><a href='#boxDown'  onclick='show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "(已結束)</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
                }
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
            if ($event_id == 3) {
                //結交名士活動獎勵
                $got_log = 'Z';
                if ((date('Y-m-d H:i:s') >= $start_date) && (date('Y-m-d H:i:s') < $end_date)) {
                    $temp_results = reward_getlog::where('user_id', $user_id)->where('group_id', 6)->orderby('is_send', 'asc')->first();
                    $remaining_num = reward_getlog::where('user_id', $user_id)->where('group_id', 6)->where('is_send', 'N')->count();
                    if ($temp_results != null || $temp_results != '') {
                        if ($temp_results->is_send == 'Y') {
                            $got_log = 'Y';
                        } else {
                            //可以領取
                            $got_log = 'N';
                        }
                    }
                }
                $celebrity = PreregUser::where('user_id', $user_id)->first();
                // dd($celebrity);
                if ($celebrity != null) {
                    $c = ['orange_1', 'orange_2', 'orange_3', 'purple_1', 'purple_2', 'purple_3', 'purple_4', 'purple_5', 'purple_6', 'blue_1', 'blue_2', 'blue_3', 'green_1', 'green_2', 'green_3', 'green_4', 'green_5', 'white_1', 'white_2', 'white_3'];
                    $c_name = ['七花獸百花仙靈', '仙道盟主沈仲陽', '愛之紅娘', '仙道盟訓誡長老', '仙道盟執法長老', '仙道盟傳功長老', '仙道盟掌刑長老', '天魔影煞', '天魔計都', '愛之月老', '吞靈獸', '齊天大聖', '不死冰骷髏', '不死霜骷髏', '開明獸', '冰麒麟', '寒冰巨甲', '愛之隨從', '愛之花童', '愛之禮官'];
                    $bind_c = $celebrity->keep_celebrity;
                    $now_c = $celebrity->celebrity;
                    if ($now_c != null) {
                        if ((date('YmdHis') < '20231019120000')) {
                            $celebrity_name = '無';
                        } elseif ((date('YmdHis') < '20231026000000')) {
                            if ($bind_c != null) {
                                $index = array_search($bind_c, $c);
                                $celebrity_name = $c_name[$index];
                            } else {
                                $celebrity_name = '無';
                            }
                        } else {
                            if ($bind_c != null) {
                                $index = array_search($bind_c, $c);
                                $celebrity_name = $c_name[$index];
                            } else {
                                $index = array_search($now_c, $c);
                                $celebrity_name = $c_name[$index];
                            }
                        }
                    } else {
                        $celebrity_name = '無';
                    }
                    if ($request->event_id == 3) {
                        $content .= "<tr><td rowspan= 1 >綁定名士</td>" . "<td>" . $celebrity_name . "</td>" . "<td rowspan= 1>結交名士活動獎勵(綁定名士)</td>";
                        if ($got_log == 'Y') {
                            $content .= "<td><button class='cannotReceive'>領取</button></td><td>0</td></tr>";
                        } elseif ($celebrity_name == '無') {
                            $content .= "<td><button class='cannotReceive'>領取</button></td><td>0</td></tr>";
                        } elseif ($got_log == 'N') {
                            $content .= "<td ><button class='receive' onclick='get_reward(6)'>領取</button></td><td>" . $remaining_num . "</td></tr>";
                        } else {
                            $content .= "<td><button class='cannotReceive'>領取</button></td><td>0</td></tr>";
                        }
                    }
                }
            } else {
                foreach ($group_lists as $group) {
                    //不能領取
                    $got_log = 'Z';
                    if ((date('Y-m-d H:i:s') >= $start_date) && (date('Y-m-d H:i:s') < $end_date)) {
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
            $where = " where event_name like '%" . $keyword . "%' and is_open = 'Y' ";
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
            $where = " where is_open ='Y' ";
            //純時間搜尋
            if ($month == 0 && $year > 0) {
                $where .= " and start_date >= '" . $year . "-01-01 00:00:00' and " . $time;
            } elseif ($year == 0 && $month > 0) {
                $where .= " and ((Year(start_date) in ('" . date('Y') . "') and Month(start_date) in ('" . $month . "')) or (Year(end_date) in ('" . date('Y') . "') and Month(end_date) in ('" . $month . "'))and " . $time . ")";
            } elseif ($year == 0 && $month == 0) {
                $where .= " and " . $time;
            } else {
                $where .= " and ((Year(start_date) in ('" . $year . "') and Month(start_date) in ('" . $month . "')) or (Year(end_date) in ('" . $year . "') and Month(end_date) in ('" . $month . "')) ) and " . $time;
            }
        }
        $sql = "SELECT * FROM reward_event" . $where . $order;
        $db = \DB::connection('mysql');
        $db->disableQueryLog();
        $event_lists = $db->select($sql);

        foreach ($event_lists as $event_list) {
            if ((date('Y-m-d H:i:s') >= $event_list->start_date) && (date('Y-m-d H:i:s') < $event_list->end_date)) {
                $list .= "<li><a href='#boxDown'  onclick='show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            } elseif ((date('Y-m-d H:i:s') < $event_list->start_date)) {
                $list .= "<li><a href='#boxDown'  onclick='show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "(未開始)</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
            } else {
                $list .= "<li><a href='#boxDown'  onclick='show_cont(" . $event_list->id . ")' class='normal'><div class='awardTextBox'><div class='awardTextTitle'>" . $event_list->event_name . "(已結束)</div><div class='awardTextTime'>" . (new DateTime($event_list->start_date))->format('Y/m/d') . "~" . (new DateTime($event_list->end_date))->format('Y/m/d') . "</div></div></a><div class='awardLine'></div></li>";
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

        if ($content_id == 6) {
            $c_name = ['七花獸百花仙靈', '仙道盟主沈仲陽', '愛之紅娘', '仙道盟訓誡長老', '仙道盟執法長老', '仙道盟傳功長老', '仙道盟掌刑長老', '天魔影煞', '天魔計都', '愛之月老', '吞靈獸', '齊天大聖', '不死冰骷髏', '不死霜骷髏', '開明獸', '冰麒麟', '寒冰巨甲', '愛之隨從', '愛之花童', '愛之禮官'];
            $c_code = [14147, 14110, 14213, 14113, 14112, 14114, 14111, 14149, 14148, 14214, 14151, 14150, 14162, 14163, 14165, 14166, 14175, 14217, 14216, 14215];
            $info = reward_getlog::where('user_id', $user_id)->where('group_id', 6)->where('is_send', 'N')->orderby('is_send', 'asc')->first();
            $item_name = $info->remark;
            $index = array_search($item_name, $c_name);
            $item_code = $c_code[$index];
            $itemcnt = 1;
            $isbind = 1;
            $is_package = 'N';
            $title = '領獎區';
            $event = reward_event::where('id', 3)->first();
            $event_name = '綁定名士' . $item_name;
            $content = "領獎專區-" . $event_name;
        } else {
            $reward_content = reward_content::where('id', $content_id)->first();
            $event_group = reward_group::where('id', $reward_content->group_id)->first();
            $item_name = $reward_content->item_name;
            $item_code = $reward_content->item_code;
            $itemcnt = $reward_content->itemcnt;
            $isbind = $reward_content->isbind;
            $is_package = $reward_content->is_package;
            $title = '領獎區';
            $event = reward_event::where('id', $event_group->event_id)->first();
            $event_name = $event->event_name;
            $content = "領獎專區-" . $event_name;
        }

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
        $status = 0;
        if ($is_package == 'N') {
            //發獎API
            $ch = curl_init();
            $url = "https://xx2.digeam.com/api/service_api?type=athena_email&uid=" . $uid
                . "&zoneid=" . $server_id . "&charid=" . $charid . "&content=" . $content . "&title=" . $title . "&name=" . $char_name . "&itemid=" . $item_code . "&itemnum=" . $itemcnt . "&isbind=" . $isbind;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result3 = curl_exec($ch);
            curl_close($ch);
            $result3 = json_decode($result3);
            $status = $result3->status;
        } else {
            $item_lists = package_item::where('package_code', $item_code)->get();
            foreach ($item_lists as $item) {
                $ch = curl_init();
                $url = "https://xx2.digeam.com/api/service_api?type=athena_email&uid=" . $uid
                . "&zoneid=" . $server_id . "&charid=" . $charid . "&content=" . $content . "&title=" . $title . "&name=" . $char_name . "&itemid=" . $item->item_code . "&itemnum=" . $item->item_count . "&isbind=" . $item->isbind;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result3 = curl_exec($ch);
                curl_close($ch);
                $result3 = json_decode($result3);
                if ($result3->status != 0) {
                    $status = $result3->status;
                }}
        }
        if ($status == 0) {
            //確認發獎成功，更新的get_log
            if ($content_id == 6) {
                $log_info = reward_getlog::where('user_id', $user_id)->where('group_id', 6)->where('is_send', 'N')->orderby('is_send', 'asc')->first();
            } else {
                $log_info = reward_getlog::where('user_id', $user_id)->where('group_id', $event_group->id)->where('is_send', 'N')->orderby('is_send', 'asc')->first();
            }
            $log_info->server_id = $server_id;
            $log_info->char_name = $char_name;
            $log_info->charid = $charid;
            $log_info->item_name = $item_name;
            $log_info->is_send = 'Y';
            $log_info->item_code = $item_code;
            $log_info->user_ip = $real_ip;
            $log_info->remark = $event_name . "-" . $title;
            $log_info->save();
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
