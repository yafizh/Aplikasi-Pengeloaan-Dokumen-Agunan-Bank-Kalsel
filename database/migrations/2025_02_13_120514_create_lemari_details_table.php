<?php

use App\Models\LemariDetail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create((new LemariDetail)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('lemari_id');
            $table->string('nomor');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists((new LemariDetail)->getTable());
    }
};
