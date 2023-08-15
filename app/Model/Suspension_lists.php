<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Suspension_lists extends Model
{

    protected $table = 'suspension_list';
    //時間顯示去除000000Z
    use DefaultDatetimeFormat;
}
