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
        Schema::create('temp_order', function (Blueprint $table) {
            $table->id('temp_id');
            $table->integer('category_id');
            $table->string('category_name', 256);
            $table->integer('MenuItemid');
            $table->string('item_name', 256);
            $table->integer('quantity');
            $table->double('price');
            $table->integer('kitMobile');
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
        Schema::dropIfExists('tbl_addtocart');
    }
};
