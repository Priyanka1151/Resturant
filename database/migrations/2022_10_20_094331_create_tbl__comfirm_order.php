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
        Schema::create('comfirm_order', function (Blueprint $table) {
            $table->id('Comorder_Tid');
            $table->integer('category_id');
            $table->string('category_name', 256);
            $table->integer('MenuItemid');
            $table->string('item_name', 256);
            $table->integer('quantity');
            $table->double('price');
            $table->string('usermobile', 12);
            $table->integer('comfirmorderid');
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
        Schema::dropIfExists('tbl__comfirm_order');
    }
};
