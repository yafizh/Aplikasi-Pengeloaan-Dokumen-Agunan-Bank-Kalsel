<?php

use App\Models\DokumenAgunanPeminjaman;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create((new DokumenAgunanPeminjaman)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumen_agunan_id');
            $table->foreignId('pegawai_id');
            $table->date('tanggal_peminjaman');
            $table->text('keperluan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists((new DokumenAgunanPeminjaman)->getTable());
    }
};
