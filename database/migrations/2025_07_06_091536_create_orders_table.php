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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('no action');
            $table->double('amount')->nullable();
            $table->string('status')->default('pending');
            $table->string('name')->nullable();
            $table->string('email', 30)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address')->nullable();
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->string('transaction_id')->nullable();
            $table->string('currency', 20)->default('BDT');
            $table->string('payment_method')->default('cod'); // cod = Cash on Delivery
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
