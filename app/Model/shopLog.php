<?php

namespace App\Model;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class shopLog extends Model
{
    protected $table = 'shop_log';
    use DefaultDatetimeFormat;
}
