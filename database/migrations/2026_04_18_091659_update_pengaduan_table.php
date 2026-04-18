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
        Schema::table('pengaduan', function (Blueprint $table) {
            // Rename judul to lokasi
            $table->renameColumn('judul', 'lokasi');

            // Add new columns
            $table->text('keterangan')->after('lokasi');
            $table->text('feedback')->nullable()->after('keterangan');
        });
    }

    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            // Drop new columns
            $table->dropColumn(['feedback', 'keterangan']);

            // Rename lokasi back to judul
            $table->renameColumn('lokasi', 'judul');
        });
    }
};
