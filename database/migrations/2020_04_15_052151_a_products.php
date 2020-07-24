<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class AProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');//title
            $table->string('slug');
            $table->string('price');
            $table->string('image');
            $table->string('warranty');
            $table->string('accessories');
            $table->string('conditionn');
            $table->string('promotion');
            $table->tinyInteger('status');
            $table->text('description');
            $table->integer('pro_cate')->unsigned();
            $table->foreign('pro_cate')
                ->references('cate_id')
                ->on('a_categories')
                ->onDelete('cascade');
            $table->integer('pro_catepro')->unsigned();
            $table->foreign('pro_catepro')
                ->references('capro_id')
                ->on('a_cateproduct')
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
        Schema::dropIfExists('a_products');
    }
}
