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
        Schema::create('status_confirs', function (Blueprint $table) {
            $table->id('status_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id');
            $table->boolean('payment_confirmation');
            $table->boolean('delivery_confirmation');
            $table->string('image_delivery');
            $table->timestamps();

            $table->foreign('payment_id')->references('payment_id')->on('payments');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_confirs');
    }
};
