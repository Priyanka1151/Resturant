<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_shop', function (Blueprint $table) {
            $table->id('shop_Tid');
            $table->string('shop_name', 256);
            $table->integer('loginid');
            $table->string('mobileno', 12);
            $table->string('password', 256);
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
        Schema::dropIfExists('tbl__master_shop');
    }
};
