<?php

namespace App\Model\event;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;
class DrawCardChance extends Model
{
    protected $table = 'draw_card_chance_log';
    use DefaultDatetimeFormat;
}
