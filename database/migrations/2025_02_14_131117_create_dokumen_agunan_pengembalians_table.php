<?php

use App\Models\DokumenAgunanPengembalian;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create((new DokumenAgunanPengembalian)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumen_agunan_peminjaman_id');
            $table->date('tanggal_pengembalian');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists((new DokumenAgunanPengembalian)->getTable());
    }
};
