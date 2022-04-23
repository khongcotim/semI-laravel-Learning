<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('Ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_customer')->unsigned();
            $table->bigInteger('id_tour')->unsigned();
            $table->bigInteger('id_tour_guide')->unsigned()->nullable();
            $table->double('rating_star',1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('id_customer')->references('id')->on('Customer');
            $table->foreign('id_tour')->references('id')->on('Tour');
            $table->foreign('id_tour_guide')->references('id')->on('Tour_guide');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ratings');
    }
}
