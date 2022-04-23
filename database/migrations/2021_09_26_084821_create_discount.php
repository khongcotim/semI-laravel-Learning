<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Discount_code', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('percent_reduce');
            $table->integer('limit');
            $table->integer('time');
            $table->string('who')->nullable();
            $table->bigInteger('id_tour')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('id_tour')->references('id')->on('Tour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Discount_code');
    }
}
