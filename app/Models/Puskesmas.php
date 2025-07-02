<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Puskesmas extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kode_puskesmas',
        'nama',
        'alamat',
        'kecamatan',
        'desa',
        'nomor_telepon',
        'latitude',
        'longitude'
    ];

    protected $attributes = [
        'latitude' => -0.31628,  // Nilai default latitude Kab. Pasaman
        'longitude' => 100.3489, // Nilai default longitude Kab. Pasaman
    ];

    public function ambulans()
    {
        return $this->hasMany(Ambulans::class);
    }
}
