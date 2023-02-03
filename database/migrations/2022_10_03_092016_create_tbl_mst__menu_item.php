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
        Schema::create('mst_MenuItem', function (Blueprint $table) {
            $table->id('MenuItem_Tid');
            $table->integer('shopid');
            $table->integer('categoryid');
            $table->integer('itemid');
            $table->string('item_name', 256);
            $table->string('description', 256);
            $table->string('item_type', 256);
            $table->Double('price');
            $table->string('item_image', 256);
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
        Schema::dropIfExists('tbl_mst__menu_item');
    }
};
