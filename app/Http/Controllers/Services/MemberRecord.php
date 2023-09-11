<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;

class MemberRecord extends Controller
{
    public function getUserInfo($user_id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://webapi.digeam.com/xx2/getUserInfo");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $PostData = "user_id=" . $user_id;
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $PostData);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
