<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_item', function (Blueprint $table) {
            $table->id();
            $table->integer('cate_id');
            $table->integer('item_code')->nullable();
            $table->string('item_name');
            $table->integer('itemcnt')->default(1);
            $table->integer('isbind')->default(1);
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
        Schema::dropIfExists('send_item');
    }
}
