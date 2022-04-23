<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Orders', function (Blueprint $table) {
            $table->id(); 
            $table->bigInteger('id_customer')->unsigned();
            $table->float('price',10,2);
            $table->string('address', 100);
            $table->string('country', 100);
            $table->string('city', 100);
            $table->date('time')->nullable();
            $table->tinyInteger('count_adults');
            $table->tinyInteger('count_children');
            $table->tinyInteger('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('id_customer')->references('id')->on('Customer');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Orders');
    }
}
