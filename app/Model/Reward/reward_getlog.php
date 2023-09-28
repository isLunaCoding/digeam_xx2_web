<?php

namespace App\Model\Reward;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class reward_getlog extends Model
{
    protected $table = 'reward_getlog';
    use DefaultDatetimeFormat;
}
