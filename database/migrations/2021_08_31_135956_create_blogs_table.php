<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Blog', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('slug',150);
            $table->string('image');
            $table->text('contents');
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->bigInteger('who_accept')->unsigned()->nullable();
            $table->bigInteger('status')->unsigned()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('customer_id')->references('id')->on('Customer');
            $table->foreign('status')->references('id')->on('Customer');
            $table->foreign('admin_id')->references('id')->on('Admin');
            $table->foreign('who_accept')->references('id')->on('Admin');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Blog');
    }
}
