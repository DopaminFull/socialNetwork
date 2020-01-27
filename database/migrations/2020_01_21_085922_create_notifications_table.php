<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->unsignedBigInteger('sender');
            $table->unsignedBigInteger('receiver');
            $table->timestamp('seen_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('sender')->references('id')->on('users');
            $table->foreign('receiver')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
