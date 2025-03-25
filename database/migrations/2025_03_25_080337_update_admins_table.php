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
        Schema::table('admins', function (Blueprint $table) {
            $table->string('work_address')->nullable()->change();
            $table->string('address_1')->nullable()->change();
            $table->string('address_2')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('work_address')->nullable(false)->change();
            $table->string('address_1')->nullable(false)->change();
            $table->string('address_2')->nullable(false)->change();
        });
    }
};
