<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('cate_id');
            $table->string('type');
            $table->text('content')->nullable();
            $table->string('open')->default('N');
            $table->string('top')->default('N');
            $table->string('new')->default('N');
            $table->integer('main_sort')->default(0);
            $table->integer('sec_sort')->default(0);
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
        Schema::dropIfExists('page');
    }
}
