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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            // ── Institute Info ──
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
 
            // ── Media ──
            $table->string('logo')->nullable();       // storage path
            $table->string('favicon')->nullable();    // storage path
 
            // ── Locale / Format ──
            $table->string('currency', 10)->default('BDT');
            $table->string('currency_symbol', 10)->default('৳');
            $table->string('timezone')->default('Asia/Dhaka');
            $table->string('date_format', 20)->default('d M Y');
 
            // ── Academic ──
            $table->string('academic_year')->nullable();   // e.g. 2024-2025
 
            // ── Misc ──
            $table->string('footer_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
