<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_dokter',
        'spesialis',
        'no_telepon',
        'poli_id',
        'tanggal'
    ];

    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class);
    }
}