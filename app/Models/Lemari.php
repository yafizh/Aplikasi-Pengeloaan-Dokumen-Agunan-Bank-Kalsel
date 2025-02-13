<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lemari extends Model
{
    protected $table = 'lemari';
    protected $guarded = [];

    public function details(): HasMany
    {
        return $this->hasMany(LemariDetail::class, 'lemari_id', 'id');
    }
}
