<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reported_post_id');
            $table->foreign('reported_post_id')->references('id')->on('posts');
            $table->unsignedBigInteger('reporter_user_id');
            $table->foreign('reporter_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('reported_user_id');
            $table->foreign('reported_user_id')->references('id')->on('users');
            $table->string('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
