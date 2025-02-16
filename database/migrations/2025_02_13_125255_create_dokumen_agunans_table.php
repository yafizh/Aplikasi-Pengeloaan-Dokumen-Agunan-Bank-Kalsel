<?php

use App\Models\DokumenAgunan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create((new DokumenAgunan)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('nasabah_id');
            $table->foreignId('pegawai_id');
            $table->foreignId('lemari_detail_id');
            $table->string('nama');
            $table->string('cif');
            $table->date('tanggal_akad');
            $table->date('berlaku_sampai');
            $table->string('jenis_agunan');
            $table->string('status');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists((new DokumenAgunan)->getTable());
    }
};
