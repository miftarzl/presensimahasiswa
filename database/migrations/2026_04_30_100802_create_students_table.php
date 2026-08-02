<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('npm')->unique();
        $table->string('email')->nullable();
        $table->string('password')->nullable();
        $table->boolean('is_password_changed')->default(false);
        $table->foreignId('class_id');
        $table->string('status_presensi')->nullable();
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
