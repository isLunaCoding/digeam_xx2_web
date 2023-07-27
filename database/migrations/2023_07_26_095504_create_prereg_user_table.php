<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreregUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prereg_user', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('user_mobile');
            $table->string('user_ip');
            $table->string('user_area');
            $table->dateTime('pre_time');
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
        Schema::dropIfExists('prereg_user');
    }
}
