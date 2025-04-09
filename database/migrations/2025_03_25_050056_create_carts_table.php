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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->string('session_id')->nullable(); 
            $table->unsignedBigInteger('food_id');
            $table->string('food_name');
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->default(1);
            $table->decimal('subtotal', 8, 2);
            $table->timestamps();

            // Indexing for performance
            $table->index('user_id');
            $table->index('session_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
