<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardGetlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_getlog', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->integer('server_id')->nullable();
            $table->string('char_name')->nullable();
            $table->integer('charid')->nullable();
            $table->string('item_name')->nullable();
            $table->integer('item_code')->nullable();
            $table->char('is_send')->default('N');
            $table->integer('group_id')->nullable();
            $table->string('remark')->nullable();
            $table->string('user_ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reward_getlog');
    }
}
