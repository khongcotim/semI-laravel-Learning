<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Banner', function (Blueprint $table) {
            $table->id();
            $table->string('links')->nullable();
            $table->string('image');
            $table->string('page')->default('home');
            $table->string('title',100)->nullable();
            $table->bigInteger('id_tour')->unsigned()->nullable();
            $table->bigInteger('status')->default(0);
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
        Schema::dropIfExists('Banner');
    }
}
