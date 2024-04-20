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
    Schema::create('payments', function (Blueprint $table) {
        $table->id('payment_id'); // Ini adalah primary key
        $table->unsignedBigInteger('user_id'); // Ini adalah foreign key
        $table->string('buyer_name');
        $table->unsignedBigInteger('code_product'); // Ini adalah foreign key
        $table->integer('product_taken');
        $table->decimal('amount', 10,2);
        $table->string('address');
        $table->string('payment_method');
        $table->string('proof_of_payment');
        $table->string('status');
        $table->timestamps();

        // Menyatakan foreign key constraint
        $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        $table->foreign('code_product')->references('code_product')->on('products'); 
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
