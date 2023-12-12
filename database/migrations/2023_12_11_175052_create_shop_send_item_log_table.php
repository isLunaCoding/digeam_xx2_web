<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSendItemLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_send_item_log', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->integer('count');
            $table->integer('item_code');
            $table->string('item_id');
            $table->string('item_name');
            $table->integer('server_id');
            $table->integer('char_id');
            $table->string('char_name');
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
        Schema::dropIfExists('shop_send_item_log');
    }
}
