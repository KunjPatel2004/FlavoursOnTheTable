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
                $table->foreignId('customer_name')->references('id')->on('admins')->onDelete('cascade');
                $table->foreignId('cook_name')->references('id')->on('admins')->onDelete('cascade');
                $table->string('totalfooditems');
                $table->enum('status',['pending','preparing','ready','delivered'])->default('pending');
                $table->decimal('total_price',8,2);
                $table->string('payment_type')->default('COD');
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
