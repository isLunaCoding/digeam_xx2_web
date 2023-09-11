<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class serial_item extends Model
{
    protected $table = 'serial_item';
    use DefaultDatetimeFormat;
}
