<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_customer')->unsigned();
            $table->bigInteger('id_tour')->unsigned()->nullable();
            $table->bigInteger('id_blog')->unsigned()->nullable();
            $table->text('contents');
            $table->tinyInteger('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('id_customer')->references('id')->on('Customer');
            $table->foreign('id_tour')->references('id')->on('Tour');
            $table->foreign('id_blog')->references('id')->on('Blog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Comments');
    }
}
