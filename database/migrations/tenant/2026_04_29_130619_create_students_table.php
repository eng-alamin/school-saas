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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // Academic
            $table->string('academic_year');
            $table->string('register_no')->unique();
            $table->string('roll_no')->nullable();
            $table->date('admission_date');
            $table->foreignId('class_id');
            $table->foreignId('section_id')->nullable();
            $table->foreignId('category_id')->nullable();

            // Student Info
            $table->string('full_name');
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('photo')->nullable();

            // Login
            $table->string('username')->unique();
            $table->string('password');

            // Previous School
            $table->text('previous_school')->nullable();
            $table->text('qualification')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
