<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenAgunan extends Model
{
    protected $table = 'dokumen_agunan';
    protected $guarded = [];

    public function nasabah(): BelongsTo
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id', 'id');
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function lemariDetail(): BelongsTo
    {
        return $this->belongsTo(LemariDetail::class, 'lemari_detail_id', 'id');
    }
}
