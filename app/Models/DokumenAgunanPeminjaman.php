<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DokumenAgunanPeminjaman extends Model
{
    protected $table = 'dokumen_agunan_peminjaman';
    protected $guarded = [];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function dokumenAgunan(): BelongsTo
    {
        return $this->belongsTo(DokumenAgunan::class, 'dokumen_agunan_id', 'id');
    }

    public function pengembalian(): HasOne
    {
        return $this->hasOne(DokumenAgunanPengembalian::class, 'dokumen_agunan_peminjaman_id', 'id');
    }
}
