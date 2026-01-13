<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('kontak');
            $table->string('judul');
            $table->text('isi');
            $table->text('alamat');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('foto')->nullable();
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])
                ->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
