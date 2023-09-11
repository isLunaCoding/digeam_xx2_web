<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class serial_number extends Model
{
    protected $table = 'serial_number';
    use DefaultDatetimeFormat;

}
