<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\change_point_log;
use App\Model\event\CBT_Buy_Log;
use App\Model\event\PandaGuessLog;
use App\Model\event\PreregUser;
use App\Model\Reward\package_item;
use App\Model\Reward\reward_content;
use App\Model\Reward\reward_event;
use App\Model\Reward\reward_getlog;
use App\Model\Reward\reward_group;
use App\Model\Reward\reward_send_log;
use App\Model\sendItem;
use App\Model\sendItemLog;
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
        } elseif ($request->type == 'send') {
            $result = rewardController::send($request);
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

            //四海轉點回饋2

            if ($_SERVER['HTTP_CF_CONNECTING_IP'] == '211.23.144.219') {
                if ((date('YmdHis') >= '20231114120000') && (date('YmdHis') <= '20231130235959')) {
                    $db = \DB::connection('mysql');
                    $c_point = change_point_log::where('user_id', $user_id)->whereBetween('created_at', ['2023-11-14 12:00:00', '2023-11-22 23:59:59'])->sum('c_point');
                    $cb_point = change_point_log::where('user_id', $user_id)->whereBetween('created_at', ['2023-11-14 12:00:00', '2023-11-22 23:59:59'])->sum('cb_point');
                    $event_pay = $c_point + $cb_point;
                    // $event_pay = 50000;
                    if ($event_pay >= 1000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '30')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',30,'1000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($event_pay >= 3000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '31')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',31,'3000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($event_pay >= 5000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '32')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',32,'5000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($event_pay >= 8000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '33')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',33,'8000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($event_pay >= 10000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '34')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',34,'10000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($event_pay >= 15000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '35')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',35,'15000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($event_pay >= 20000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '36')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',36,'20000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($event_pay >= 30000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '37')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',37,'30000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    if ($event_pay >= 50000) {
                        $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '38')->count();
                        if ($eventNum == 0) {
                            $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',38,'50000')";
                            $db->disableQueryLog();
                            $event_info = $db->statement($sql);
                        }
                    }
                    \DB::disconnect('mysql');
                }
            }
            //四海轉點回饋1
            if ((date('YmdHis') >= '20231101120000') && (date('YmdHis') <= '20231231235959')) {
                $db = \DB::connection('mysql');
                $c_point = change_point_log::where('user_id', $user_id)->whereBetween('created_at', ['2023-11-01 12:00:00', '2023-11-08 12:00:00'])->sum('c_point');
                $cb_point = change_point_log::where('user_id', $user_id)->whereBetween('created_at', ['2023-11-01 12:00:00', '2023-11-08 12:00:00'])->sum('cb_point');
                $event_pay = $c_point + $cb_point;
                if ($event_pay >= 1000) {
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '28')->count();
                    if ($eventNum == 0) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',28,'1000')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
                    }
                }
                if ($event_pay >= 3000) {
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '29')->count();
                    if ($eventNum == 0) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',29,'3000')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
                    }
                }
                \DB::disconnect('mysql');
            }

            //轉點回饋
            if ((date('YmdHis') >= '20231019150000') && (date('YmdHis') <= '20231126100000')) {
                $c_point = change_point_log::where('user_id', $user_id)->whereBetween('created_at', ['2023-10-19 10:00:00', '2023-11-16 10:00:00'])->sum('c_point');
                $cb_point = change_point_log::where('user_id', $user_id)->whereBetween('created_at', ['2023-10-19 10:00:00', '2023-11-16 10:00:00'])->sum('cb_point');
                $event_pay = $c_point + $cb_point;
                $db = \DB::connection('mysql');
                if ($event_pay >= 10000) {
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '22')->count();
                    if ($eventNum == 0) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',22,'10000')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
                    }
                }
                if ($event_pay >= 25000) {
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '23')->count();
                    if ($eventNum == 0) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',23,'25000')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
                    }
                }
                if ($event_pay >= 45000) {
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '24')->count();
                    if ($eventNum == 0) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',24,'45000')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
                    }
                }
                if ($event_pay >= 66666) {
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '25')->count();
                    if ($eventNum == 0) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',25,'66666')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
                    }
                }
                //可循環
                $round = (integer) ($event_pay / 30000);
                $check_cnt = reward_getlog::where('user_id', $user_id)->where('group_id', '26')->count();
                while ($round > $check_cnt) {
                    $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',26,'30000')";
                    $db->disableQueryLog();
                    $event_info = $db->statement($sql);
                    $check_cnt += 1;
                }
                \DB::disconnect('mysql');
            }
            //修仙啟程40等
            if ((date('YmdHis') >= '20231019150000') && (date('YmdHis') <= '20231231235959')) {
                $user_lists = ['minnn112', 'a01002413', 'a02043388', 'xx2digeam08', 'xx2digeam04', 'a0264717', 'a0903351033', 'a0909583100', 'a0918816792', 'a0955860093', 'a0975595290', 'a0987437629', 'a0989197695', 'a1152017a', 'a147854789', 'a1597321', 'a24914051', 'a3707680', 'a68526852', 'a69876987', 'a82628068', 'a8511234', 'a8765536876', 'a93036567', 'a9424552754', 'aaa199409', 'abcoe0000', 'alone0222', 'amzxcvbnm28', 'andeoz2017', 'andeoz2023', 'andychoi0722', 'andylinhappy1', 'angeltstk001', 'aorll096game', 'appyd8295', 'as7589420', 'asd10502245', 'asdf20707', 'asdfgh0101', 'asdjkl10633', 'aszx27913', 'auster1983', 'azsx7957893', 'baby8521', 'back512pace', 'backhan1', 'bb2273512', 'bcg203575484', 'bergers08', 'bergers25', 'beyine28530', 'bnm357159', 'boss321654', 'cang2j694', 'cclin5688', 'ckj800702', 'ckwei0909', 'ckwei090909', 'clouds1368285', 'convenient0418', 'cuu00239', 'digeamdpotw07', 'diou5209', 'domon123', 'dryadh65077', 'e0917222289', 'e09294192127540', 'e5210341', 'e570316i', 'easoncck1996', 'edwin0802', 'egg605011', 'eilen6427', 'eli850808', 'elvisjoy1983', 'ernie0982', 'et2592256', 'eva25290', 'f19960301', 'facjackie27618', 'feicuan0213', 'feicuanlin0925', 'forever20jerry', 'fy20612345', 'fy20672321', 'g0933298862', 'gch74317', 'gin8321800', 'gn00654068', 'gn01819576', 'gogo0730', 'goodgodno3', 'gtoksshe88', 'h37856240', 'hansting185200', 'hao740889', 'hatsuyuk1', 'hchs310169', 'hieiue89', 'himhim789', 'hn883327', 'hoya86823', 'hunter0214hunter', 'ice134963', 'ivesqfly1', 'ja45790522', 'james52127', 'janice51244', 'janicetsao520', 'jen40170', 'jerry831113', 'jimmy0827', 'jlps88313', 'joe755067', 'joker4367', 'jpsakura95173', 'justgiveme014064', 'jyyling91', 'k228165566', 'kafuumori2513', 'keven5214', 'kevinkk2348', 'kevinkuo851212', 'kiki58921', 'king58859587', 'king7772022', 'kingkit3211', 'kissingbarbie2', 'kitterlions01', 'kuso1990030124', 'lai408612', 'leaveisture82', 'lf27693810', 'lf2net6310', 'liarking22no', 'linda122719', 'louis5566', 'love02587531', 'love2006321', 'love507153', 'loveing84126', 'lycan9220329', 'm0905257553', 'm1415677', 'm9879602', 'maggie118988', 'maggie1189881', 'maggie1189882', 'maggie1189883', 'maggie1189885', 'maggie1189886', 'maggie1189887', 'maggie11898899', 'mail740329', 'mango123456', 'maybe1516', 'md3191119', 'mo0408rris', 'momo0315', 'mor19830311', 'nice11233', 'nniu2004', 'oio127007', 'okok999888777', 'ooxx1120306', 'p6983225', 'popo1000402', 'pp33942775', 'q0916255018', 'q0930763718q', 'q730922q730922', 'q763718q', 'qaz22809502', 'qq0606pp', 'qq833061', 'qsw8851575s', 'qw147854789', 'qwas820816', 'qwe30376', 'qwe610160', 'qwe830116', 'rocky1336', 'rtfgtygh123', 's12355188', 's22300227', 's26709498', 's30306s15', 'sfftd2234', 'shen0908', 'shinelaixs1', 'siul0ve0206', 'siulok0808', 'skpaylove5', 'sky10127321', 'sm9020404', 'smith669', 'spendmoney1', 'ss1379ss', 'st864012', 'stu86164', 'summer089', 'tedyang1992', 'to761111', 'tong0309', 'tszchung1995', 'tyu35714599', 'unalove0520', 'vae16666', 'viva7410', 'voom1111', 'watcher2103', 'wl01474947', 'x11001230', 'x159357456', 'x9135809u', 'xuann2002', 'xx2guest02', 'yrbo0728', 'yung985914', 'zu00991713', 'zx26337463', 'zx82839642', 'zxc3143611', 'zxcvb5545', 'ijn235703', 'par860521', 'q24986418', 'qo4bj680357', 'rae861349', 'tarja0222', 'wholala1', 'wl03014090', 'x9982449', 'yvonne525', 'ztgame100', 'zzz013977'];
                $db = \DB::connection('mysql');
                if (in_array($user_id, $user_lists)) {
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '27')->count();
                    if ($eventNum == 0) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',27,'修仙啟程')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
                    }
                }
                \DB::disconnect('mysql');
            }
            //mycard1000
            if ((date('YmdHis') >= '20231019150000') && (date('YmdHis') <= '20231231235959')) {
                $db = \DB::connection('mysql');
                $client = new Client();
                $data = [
                    'user_id' => $user_id,
                    'sdate' => '2023-10-19 00:00:00',
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
            if ((date('YmdHis') >= '20231019150000') && (date('YmdHis') <= '20231231235959')) {
                $db = \DB::connection('mysql');
                $client = new Client();
                $data = [
                    'user_id' => $user_id,
                    'sdate' => '2023-10-19 00:00:00',
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
            if ((date('YmdHis') >= '20231019120000')) {
                $celebrity = PreregUser::where('user_id', $user_id)->first();
                $db = \DB::connection('mysql');
                if ($celebrity != null) {
                    $event_infos = reward_getlog::where('group_id', '0')->where('user_id', $user_id)->count();
                    if ($event_infos == 0) {
                        $c = ['orange_1', 'orange_2', 'orange_3', 'purple_1', 'purple_2', 'purple_3', 'purple_4', 'purple_5', 'purple_6', 'blue_1', 'blue_2', 'blue_3', 'green_1', 'green_2', 'green_3', 'green_4', 'green_5', 'white_1', 'white_2', 'white_3'];
                        $c_name = ['七花獸百花仙靈', '仙道盟主沈仲陽', '愛之紅娘', '仙道盟訓誡長老', '仙道盟執法長老', '仙道盟傳功長老', '仙道盟掌刑長老', '天魔影煞', '天魔計都', '愛之月老', '吞靈獸', '齊天大聖', '不死冰骷髏', '不死霜骷髏', '開明獸', '冰麒麟', '寒冰巨甲', '愛之隨從', '愛之花童', '愛之禮官'];
                        $bind_c = $celebrity->keep_celebrity;
                        $now_c = $celebrity->celebrity;
                        if ($now_c != null) {
                            if ((date('YmdHis') < '20231026000000')) {
                                if ($bind_c != null) {
                                    $index = array_search($bind_c, $c);
                                    $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',0,'" . $c_name[$index] . "')";
                                    $db->disableQueryLog();
                                    $event_info = $db->statement($sql);
                                }
                            } else {
                                if ($bind_c != null) {
                                    $index = array_search($bind_c, $c);
                                } else {
                                    $index = array_search($now_c, $c);
                                }
                                $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',0,'" . $c_name[$index] . "')";
                                $db->disableQueryLog();
                                $event_info = $db->statement($sql);
                            }
                        }
                    }
                }
                \DB::disconnect('mysql');
            }
            //熊貓
            if ((date('YmdHis') >= '20231019120000')) {
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
                    $eventNum = reward_getlog::where('user_id', $user_id)->where('group_id', '21')->count();
                    if ($eventNum == 0) {
                        $sql = "insert into reward_getlog(user_id,group_id,remark) values ('" . $user_id . "',21,'累積次數30')";
                        $db->disableQueryLog();
                        $event_info = $db->statement($sql);
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
                    $temp_results = reward_getlog::where('user_id', $user_id)->where('group_id', 0)->orderby('is_send', 'asc')->first();
                    $remaining_num = reward_getlog::where('user_id', $user_id)->where('group_id', 0)->where('is_send', 'N')->count();
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
                        // if ((date('YmdHis') < '20231019120000')) {
                        //     $celebrity_name = '無';
                        // } else
                        if ((date('YmdHis') < '20231026000000')) {
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
                            $content .= "<td ><button class='receive' onclick='get_reward(7)'>領取</button></td><td>" . $remaining_num . "</td></tr>";
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

        if ($content_id == 7) {
            $c_name = ['七花獸百花仙靈', '仙道盟主沈仲陽', '愛之紅娘', '仙道盟訓誡長老', '仙道盟執法長老', '仙道盟傳功長老', '仙道盟掌刑長老', '天魔影煞', '天魔計都', '愛之月老', '吞靈獸', '齊天大聖', '不死冰骷髏', '不死霜骷髏', '開明獸', '冰麒麟', '寒冰巨甲', '愛之隨從', '愛之花童', '愛之禮官'];
            $c_code = [14147, 14110, 14213, 14113, 14112, 14114, 14111, 14149, 14148, 14214, 14151, 14150, 14162, 14163, 14165, 14166, 14175, 14217, 14216, 14215];
            $info = reward_getlog::where('user_id', $user_id)->where('group_id', 0)->where('is_send', 'N')->orderby('is_send', 'asc')->first();
            $item_name = $info->remark;
            $index = array_search($item_name, $c_name);
            $item_code = $c_code[$index];
            $itemcnt = 1;
            $isbind = 1;
            $is_package = 'N';
            $title = '領獎區';
            $event = reward_event::where('id', 3)->first();
            $event_name = '綁定名士' . $item_name;
            $content = $event_name;
            // $content = "領獎專區";
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
            // $content = "領獎專區";
            $content = $event_name;
        }

        if ($content_id == 7) {
            $log_info = reward_getlog::where('user_id', $user_id)->where('group_id', 0)->where('is_send', 'N')->orderby('is_send', 'asc')->first();
        } else {
            $log_info = reward_getlog::where('user_id', $user_id)->where('group_id', $event_group->id)->where('is_send', 'N')->orderby('is_send', 'asc')->first();
        }
        if ($log_info == null) {
            return response()->json([
                'status' => -99,
            ]);
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
            if ($result3->status == 0) {
                $createlog = new reward_send_log();
                $createlog->user_id = $user_id;
                $createlog->server_id = $server_id;
                $createlog->char_name = $char_name;
                $createlog->charid = $charid;
                $createlog->item_name = $item_name;
                $createlog->is_send = 'Y';
                $createlog->item_code = $item_code;
                $createlog->user_ip = $real_ip;
                $createlog->remark = $event_name . "-" . $title;
                $createlog->save();
            } else {
                $createlog = new reward_send_log();
                $createlog->user_id = $user_id;
                $createlog->server_id = $server_id;
                $createlog->char_name = $char_name;
                $createlog->charid = $charid;
                $createlog->item_name = $item_name;
                $createlog->is_send = 'Y';
                $createlog->item_code = $item_code;
                $createlog->user_ip = $real_ip;
                $createlog->remark = '失敗';
                $createlog->save();
            }
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
                }
                if ($result3->status == 0) {
                    $createlog = new reward_send_log();
                    $createlog->user_id = $user_id;
                    $createlog->server_id = $server_id;
                    $createlog->char_name = $char_name;
                    $createlog->charid = $charid;
                    $createlog->item_name = $item_name;
                    $createlog->is_send = 'Y';
                    $createlog->item_code = $item->item_code;
                    $createlog->user_ip = $real_ip;
                    $createlog->remark = $event_name . "-" . $title;
                    $createlog->save();
                } else {
                    $createlog = new reward_send_log();
                    $createlog->user_id = $user_id;
                    $createlog->server_id = $server_id;
                    $createlog->char_name = $char_name;
                    $createlog->charid = $charid;
                    $createlog->item_name = $item_name;
                    $createlog->is_send = 'Y';
                    $createlog->item_code = $item_code;
                    $createlog->user_ip = $real_ip;
                    $createlog->remark = '失敗';
                    $createlog->save();
                }
            }
        }
        if ($status == 0) {
            //確認發獎成功，更新的get_log、新增發獎log
            if ($content_id == 7) {
                $log_info = reward_getlog::where('user_id', $user_id)->where('group_id', 0)->where('is_send', 'N')->orderby('is_send', 'asc')->first();
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

            // $createlog = new reward_send_log();
            // $createlog->user_id=$user_id;
            // $createlog->server_id = $server_id;
            // $createlog->char_name = $char_name;
            // $createlog->charid = $charid;
            // $createlog->item_name = $item_name;
            // $createlog->is_send = 'Y';
            // $createlog->item_code = $item_code;
            // $createlog->user_ip = $real_ip;
            // $createlog->remark = $event_name . "-" . $title;
            // $createlog->save();

            return response()->json([
                'status' => 1,
            ]);
        } else {
            return response()->json([
                'status' => -99,
                'content' => '發獎錯誤',
            ]);
        }

    }
    public function send(Request $request)
    {
        $user_id = $request->user_id;
        $item = $request->item;
        $char_name = $request->char_name;
        $charid = $request->charid;
        $server_id = $request->server_id;

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
        } else {
            return response()->json([
                'status' => -99,
            ]);
        }
        //找出同分類item
        $status = 0;
        $item_lists = sendItem::where('cate_id', $item)->get();
        foreach ($item_lists as $value) {
            $item_code = $value->item_code;
            $itemcnt = $value->itemcnt;
            $isbind = $value->isbind;
            $content = '寄送道具';
            $title = '寄送';
            $ch = curl_init();
            $url = "https://xx2.digeam.com/api/service_api?type=athena_email&uid=" . $uid
                . "&zoneid=" . $server_id . "&charid=" . $charid . "&content=" . $content . "&title=" . $title . "&name=" . $char_name . "&itemid=" . $item_code . "&itemnum=" . $itemcnt . "&isbind=" . $isbind;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result3 = curl_exec($ch);
            curl_close($ch);
            $result3 = json_decode($result3);
            if ($result3->status != 0) {
                $status = $result3->status;
            } else {
                $createlog = new sendItemLog();
                $createlog->user_id = $user_id;
                $createlog->char_name = $char_name;
                $createlog->charid = $charid;
                $createlog->server_id = $server_id;
                $createlog->item_name = $value->item_name;
                $createlog->itemcnt = $itemcnt;
                $createlog->save();
            }
        }
        if ($status == 0) {
            return response()->json([
                'status' => 1,
                'uid' => $uid,
            ]);
        } else {
            return response()->json([
                'status' => -98,
                'uid' => $uid,
            ]);
        }

    }
}
