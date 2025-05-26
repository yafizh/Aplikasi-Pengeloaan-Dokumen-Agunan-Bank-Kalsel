<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $guarded = [];
    protected $casts = [
        'tanggal_lahir' => 'date'
    ];

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id', 'id');
    }

    public function dokumenAgunan(): HasMany
    {
        return $this->hasMany(DokumenAgunan::class);
    }

    public function dokumenAgunanPeminjaman(): HasMany
    {
        return $this->hasMany(DokumenAgunanPeminjaman::class);
    }
}
