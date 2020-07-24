<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ABilldetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_billdetail', function (Blueprint $table) {
            $table->increments('billde_id');        
            $table->integer('billde_quantily');           
            $table->integer('cus_id')->unsigned();
            $table->foreign('cus_id')
                ->references('cus_id')
                ->on('a_customers')
                ->onDelete('cascade');
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')
                ->references('bill_id')
                ->on('a_bills')
                ->onDelete('cascade');
            $table->integer('pro_id')->unsigned();
            $table->foreign('pro_id')
                ->references('id')
                ->on('a_products')
                ->onDelete('cascade');
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
        Schema::dropIfExists('a_billdetail');
    }
}
