<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ambulans extends Model
{
    use HasFactory, SoftDeletes;

     protected $fillable = [
        'puskesmas_id',
        'nomor_polisi',
        'merk',
        'tahun',
        'nomor_mesin',
        'nomor_rangka',
        'status',
        'km_terakhir',
        'keterangan'
    ];

    protected $attributes = [
        'nomor_mesin' => 111, 
        'nomor_rangka' => 222,
    ];

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }
}
