<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LemariDetail extends Model
{
    protected $table = 'lemari_detail';
    protected $guarded = [];

    public function lemari(): BelongsTo
    {
        return $this->belongsTo(Lemari::class, 'lemari_id', 'id');
    }
}
