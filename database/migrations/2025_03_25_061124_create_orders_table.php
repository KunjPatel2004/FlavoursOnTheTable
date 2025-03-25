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
            $table->unsignedBigInteger('user_id')->nullable(); // For logged-in users
            $table->string('session_id')->nullable(); // For guest users
            $table->string('customer_name')->nullable(); // Guest user name
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['Order Placed', 'Pending', 'Preparing', 'Ready', 'Delivered'])->default('Order Placed');
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
