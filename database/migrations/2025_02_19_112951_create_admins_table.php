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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('role', ['customer', 'cook', 'admin']);
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image');
            $table->string('home_address');
            $table->string('work_address');
            $table->string('address_1');
            $table->string('address_2');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
