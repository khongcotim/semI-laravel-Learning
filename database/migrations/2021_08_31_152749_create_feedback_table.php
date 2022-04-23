<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Feedback', function (Blueprint $table) {
            $table->id();
            $table->string('solution');
            $table->text('answer')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->bigInteger('who_except')->unsigned()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('customer_id')->references('id')->on('Customer');
            $table->foreign('admin_id')->references('id')->on('Admin');
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
        Schema::dropIfExists('Feedback');
    }
}
