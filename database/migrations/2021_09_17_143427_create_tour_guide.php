<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourGuide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tour_guide', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('phone')->unique()->nullable();
            $table->float('price',10,0)->nullable();
            $table->string('avatar')->default('team7.jpg')->nullable();
            $table->string('email')->unique();
            $table->string('address')->unique()->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_guide');
    }
}
