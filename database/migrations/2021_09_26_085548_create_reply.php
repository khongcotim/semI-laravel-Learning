<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reply', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reply_to')->unsigned();
            $table->bigInteger('customer_reply')->unsigned()->nullable();
            $table->bigInteger('admin_reply')->unsigned()->nullable();
            $table->bigInteger('who_eccept')->unsigned()->nullable();
            $table->text('contents');
            $table->string('type',10)->default('tour');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('reply_to')->references('id')->on('Comments');
            $table->foreign('customer_reply')->references('id')->on('Customer');
            $table->foreign('admin_reply')->references('id')->on('Admin');
            $table->foreign('who_eccept')->references('id')->on('Admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Reply');
    }
}
