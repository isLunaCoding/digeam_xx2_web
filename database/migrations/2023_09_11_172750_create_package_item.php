<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_item', function (Blueprint $table) {
            $table->id();
            $table->integer('package_code')->nullable();
            $table->integer('item_code')->nullable();
            $table->integer('item_count')->nullable();
            $table->integer('isbind')->nullable();
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
        Schema::dropIfExists('package_item');
    }
}
