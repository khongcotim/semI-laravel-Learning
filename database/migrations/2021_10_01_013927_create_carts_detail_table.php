<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tour')->unsigned();
            $table->bigInteger('id_customer')->unsigned();
            $table->bigInteger('id_payment')->unsigned();
            $table->bigInteger('id_discount')->unsigned()->nullable();
            $table->bigInteger('id_cart')->unsigned();
            $table->bigInteger('id_vehicle')->unsigned()->nullable();
            $table->bigInteger('id_tour_guild')->unsigned()->nullable();
            $table->bigInteger('hotel_id')->unsigned()->nullable();
            $table->string('id_service')->nullable();
            $table->float('total_price',10,2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('id_tour')->references('id')->on('Tour');
            $table->foreign('id_payment')->references('id')->on('Payments');
            $table->foreign('id_customer')->references('id')->on('Customer');
            $table->foreign('id_discount')->references('id')->on('Discount_code');
            $table->foreign('id_cart')->references('id')->on('Cart');
            $table->foreign('id_vehicle')->references('id')->on('Vehicle');
            $table->foreign('id_tour_guild')->references('id')->on('Tour_guide');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts_detail');
    }
}
