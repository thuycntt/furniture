<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ACustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_customers', function (Blueprint $table) {
            $table->increments('cus_id');
            $table->string('cus_name', 100);
            $table->string('cus_email', 50);
            $table->string('cus_address', 100);
            $table->integer('cus_phonenumber');
            $table->string('cus_note')->nullable();
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
        Schema::dropIfExists('a_customers');
    }
}
