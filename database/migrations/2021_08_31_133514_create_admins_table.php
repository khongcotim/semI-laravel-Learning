<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email',150)->unique();
            $table->string('phone',10)->unique();
            $table->string('avatar')->default('team9.jpg');
            $table->string('password');
            $table->string('address');
            $table->string('role')->default('staff'); //staff - nhan vien
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
        Schema::dropIfExists('Admin');
    }
}
