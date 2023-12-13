<?php

namespace App\Model;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class shopSendItemLog extends Model
{
    protected $table = 'shop_send_item_log';
    use DefaultDatetimeFormat;
}
