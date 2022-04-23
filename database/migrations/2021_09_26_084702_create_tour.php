<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tour', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('slug',100);
            $table->tinyInteger('distant');
            $table->string('image',250);
            $table->string('des_photos',250);
            $table->string('from',150);
            $table->string('to',150);
            $table->text('map');
            $table->integer('time');
            $table->string('address',150);
            $table->string('tour_code',6);
            $table->float('price',10,2);
            $table->text('description');
            $table->integer('limit');
            $table->integer('ordered');
            $table->integer('status')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->string('service');
            $table->string('vehicle_id');
            $table->bigInteger('hotel_id')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('category_id')->references('id')->on('Category');
            $table->foreign('hotel_id')->references('id')->on('Hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tour');
    }
}
