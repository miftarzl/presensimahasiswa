<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('attendances', function (Blueprint $table) {
    $table->id();
    $table->foreignId('class_id');

    // WAKTU
    $table->timestamp('start_time');
    $table->timestamp('end_time')->nullable();

    // DATA PRESENSI
    $table->date('tanggal');
    $table->integer('pertemuan');

    // MODE (offline / online)
    $table->string('mode')->default('offline');

    // QR
    $table->string('qr_token')->nullable();

    // GPS
    $table->double('lat')->nullable();
    $table->double('lng')->nullable();
    $table->integer('radius')->default(30);

    $table->timestamps();
});
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
