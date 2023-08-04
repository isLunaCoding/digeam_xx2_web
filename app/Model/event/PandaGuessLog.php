<?php

namespace App\Model\event;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;
class PandaGuessLog extends Model
{
    protected $table = 'panda_guess_log';
    use DefaultDatetimeFormat;
}
