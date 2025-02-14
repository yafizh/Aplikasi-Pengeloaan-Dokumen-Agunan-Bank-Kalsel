<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenAgunanPengembalian extends Model
{
    protected $table = 'dokumen_agunan_pengembalaian';
    protected $guarded = [];

    public function peminjaman(): BelongsTo
    {
        return $this->belongsTo(DokumenAgunanPeminjaman::class, 'dokumen_agunan_peminjaman_id', 'id');
    }
}
