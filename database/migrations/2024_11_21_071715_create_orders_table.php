<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('address');
            $table->string('town');
            $table->string('state');
            $table->string('zip_code', 10);
            $table->unsignedBigInteger('user_id');
            $table->string('email', 255);
            $table->string('phone_number', 20); 
            $table->decimal('price', 8, 2);
            $table->text('order_notes')->nullable();
            $table->string('status')->default('processing');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
