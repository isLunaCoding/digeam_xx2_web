<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendItemLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_item_log', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('char_name')->nullable();
            $table->integer('charid')->nullable();
            $table->integer('server_id')->nullable();
            $table->string('item_name')->nullable();
            $table->integer('itemcnt')->nullable();
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
        Schema::dropIfExists('send_item_log');
    }
}
