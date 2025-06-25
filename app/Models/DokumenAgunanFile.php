<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenAgunanFile extends Model
{
    protected $table = 'dokumen_agunan_files';
    protected $guarded = [];

    public function dokumenAgunan(): BelongsTo
    {
        return $this->belongsTo(DokumenAgunan::class, 'dokumen_agunan_id', 'id');
    }
}
