<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_products', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->integer('pro_price');
            $table->integer('pro_quality');
            $table->string('pro_img');
            $table->string('pro_warranty'); //bảo hành
            $table->string('pro_accessories'); //phụ kiện
            $table->string('pro_condition'); //tình trạng
            $table->string('pro_promotion'); //khuyến mãi
            $table->tinyInteger('pro_status'); //trạng thái
            $table->text('pro_description'); //mô tả
            $table->tinyInteger('pro_featured'); //đặc biệt
            $table->integer('pro_cate')->unsigned();
            $table->foreign('pro_cate')->references('cate_id')->on('vp_categories')->onDelete('cascade');
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
        Schema::dropIfExists('vp_products');
    }
}
