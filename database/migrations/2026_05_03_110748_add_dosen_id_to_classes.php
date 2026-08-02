<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * RUN MIGRATION
     */
    public function up(): void
    {
        // cek dulu apakah column sudah ada
        if (!Schema::hasColumn('classes', 'dosen_id')) {

            Schema::table('classes', function (Blueprint $table) {

                $table->foreignId('dosen_id')
                      ->after('id')
                      ->constrained('dosens')
                      ->cascadeOnDelete();

            });

        }
    }

    /**
     * ROLLBACK MIGRATION
     */
    public function down(): void
    {
        // cek column ada atau tidak
        if (Schema::hasColumn('classes', 'dosen_id')) {

            Schema::table('classes', function (Blueprint $table) {

                // hapus foreign key (anti error)
                try {
                    $table->dropForeign(['dosen_id']);
                } catch (\Exception $e) {}

                // hapus column
                $table->dropColumn('dosen_id');

            });

        }
    }
};