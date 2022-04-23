<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Customer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->default('team9.jpg');
            $table->string('email',150)->unique();
            $table->string('phone',10)->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('id_card',12)->nullable();
            $table->text('bank_card')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('Customer');
    }
}
