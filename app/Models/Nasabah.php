<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'nasabah';
    protected $guarded = [];
    protected $casts = [
        'tanggal_lahir' => 'date'
    ];

    public function dokumenAgunan()
    {
        return $this->hasMany(DokumenAgunan::class, 'nasabah_id');
    }
}
