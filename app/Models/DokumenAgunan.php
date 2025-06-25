<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DokumenAgunan extends Model
{
    protected $table = 'dokumen_agunan';
    protected $guarded = [];
    protected $casts = [
        'tanggal_akad' => 'date',
        'berlaku_sampai' => 'date',
    ];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function nasabah(): BelongsTo
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id', 'id');
    }

    public function lemariDetail(): BelongsTo
    {
        return $this->belongsTo(LemariDetail::class, 'lemari_detail_id', 'id');
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(DokumenAgunanPeminjaman::class, 'dokumen_agunan_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(DokumenAgunanFile::class, 'dokumen_agunan_id');
    }
}
