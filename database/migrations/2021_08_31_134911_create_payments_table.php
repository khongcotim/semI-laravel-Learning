<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Payments', function (Blueprint $table) {
            $table->id();
            $table->string('method');
            $table->float('amount');
            $table->bigInteger('id_customer')->unsigned();
            $table->bigInteger('who_except')->unsigned()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('id_customer')->references('id')->on('Customer');
            $table->foreign('who_except')->references('id')->on('Admin');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Payments');
    }
}
