<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_content', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id');
            $table->string('item_name');
            $table->integer('itemcnt')->default(1);
            $table->integer('item_code')->nullable();
            $table->integer('isbind')->nullable();
            $table->char('is_package');
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
        Schema::dropIfExists('reward_content');
    }
}
