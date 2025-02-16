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
}
