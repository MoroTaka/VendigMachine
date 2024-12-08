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
        Schema::create('products',function (Blueprint $table){
            $table->increments('id')->nullable(false);
            $table->integer('company_id')->nullable(false);
            $table->string('product_name')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->integer('stock')->nullable(false);
            $table->text('comment')->nullable();
            $table->string('img_path')->nullable();
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
        //
    }
};
