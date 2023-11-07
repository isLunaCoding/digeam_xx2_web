<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index()
    {
        Redis::set('name', 'Taylor');

        $values = Redis::lrange('names', 5, 10);
        dd($values);
    }
}
