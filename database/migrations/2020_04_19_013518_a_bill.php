<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ABill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_bills', function (Blueprint $table) {
            $table->increments('bill_id');           
            $table->dateTime('bill_day');
            $table->double('bill_total');
            $table->string('bill_note')->nullable();
            $table->integer('cus_id')->unsigned();
            $table->foreign('cus_id')
                ->references('cus_id')
                ->on('a_customers')
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
        Schema::dropIfExists('a_bills');
    }
}
