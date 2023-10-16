<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class sendItemLog extends Model
{
    protected $table = 'send_item_log';
    use DefaultDatetimeFormat;

}
