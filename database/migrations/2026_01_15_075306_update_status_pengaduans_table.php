<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update semua pengaduan lama yang NULL jadi 'menunggu'
        DB::table('pengaduans')
            ->whereNull('status')
            ->update(['status' => 'menunggu']);

        // Pastikan kolom status punya default di database
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])
                  ->default('menunggu')
                  ->change();
        });
    }

    public function down(): void
    {
        // Tidak perlu rollback kompleks, biarkan seperti semula
    }
};
