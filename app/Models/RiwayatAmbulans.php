<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatAmbulans extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ambulans_id',
        'tujuan',
        'keperluan',
        'waktu_berangkat',
        'waktu_kembali',
        'km_berangkat',
        'km_kembali',
        'catatan',
        'status_perjalanan'
    ];

    public function ambulans()
    {
        return $this->belongsTo(Ambulans::class);
    }
}
