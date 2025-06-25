<?php

use App\Models\DokumenAgunanFile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create((new DokumenAgunanFile)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumen_agunan_id');
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists((new DokumenAgunanFile)->getTable());
    }
};
