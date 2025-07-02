<?php

namespace Database\Seeders;

use App\Models\WorkUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = [

            'PUSKESMAS CUBADAK',
            'PUSKESMAS SIMPANG TONANG',
            'PUSKESMAS BONJOL',
            'PUSKESMAS SIMPATI',
            'PUSKESMAS PEGANG BARU',
            'PUSKESMAS LADANG PANJANG',
            'PUSKESMAS KUMPULAN',
            'PUSKESMAS LANSAT KADAP',
            'PUSKESMAS SILAYANG',
            'PUSKESMAS TAPUS',
            'PUSKESMAS RAO',
            'PUSKESMAS PINTU PADANG',
            'PUSKESMAS KOTO RAJO',
            'PUSKESMAS KUAMANG',
            'PENSIUNAN',
            'PUSKESMAS LUBUK SIKAPING',
            'PUSKESMAS SUNDATAR',


        ];

        foreach ($name as $nama) {
            WorkUnit::create(['name' => $nama]);
        }
    }
}
