<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions_cart', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('transactionId')->constrained('transactions', 'id')->onDelete('cascade');
            $table->foreignId('cartId')->constrained('carts', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions_cart');
    }
};
