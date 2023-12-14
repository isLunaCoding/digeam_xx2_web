<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopFeedbackItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_feedback_item', function (Blueprint $table) {
            $table->id();
            $table->integer('feedback_id');
            $table->integer('price');
            $table->integer('item_code');
            $table->integer('item_cnt');
            $table->integer('is_bind');
            $table->string('item_name');

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
        Schema::dropIfExists('shop_feedback_item');
    }
}
