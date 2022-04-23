<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavorites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Favorites', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_customer')->unsigned();
            $table->bigInteger('id_tour')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('id_customer')->references('id')->on('Customer');
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
        Schema::dropIfExists('Favorites');
    }
}
