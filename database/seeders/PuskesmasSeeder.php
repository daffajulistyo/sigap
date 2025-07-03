<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Puskesmas;
use Illuminate\Support\Facades\DB;

class PuskesmasSeeder extends Seeder
{
    public function run()
    {
        // Nonaktifkan foreign key checks untuk menghindari error
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Puskesmas::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $puskesmas = [
            // Kecamatan Lubuk Sikaping
            [
                'kode_puskesmas' => 'PSM-001',
                'nama' => 'UPT PUSKESMAS SIMPATI',
                'alamat' => 'Jl. Prof. M. Yamin No. 10',
                'kecamatan' => 'Lubuk Sikaping',
                'desa' => 'Lubuk Sikaping',
                'nomor_telepon' => '0753-21001',
                'latitude' => -0.31628,
                'longitude' => 100.3489,
            ],
            [
                'kode_puskesmas' => 'PSM-002',
                'nama' => 'UPT PUSKESMAS TAPUS',
                'alamat' => 'Jl. Lintas Sumatera KM. 12',
                'kecamatan' => 'Lubuk Sikaping',
                'desa' => 'Panti',
                'nomor_telepon' => '0753-21002',
                'latitude' => -0.3056,
                'longitude' => 100.3352,
            ],

            // Kecamatan Bonjol
            [
                'kode_puskesmas' => 'PSM-003',
                'nama' => 'UPT PUSKESMAS LUBUK SIKAPING',
                'alamat' => 'Jl. Tuanku Imam Bonjol No. 5',
                'kecamatan' => 'Bonjol',
                'desa' => 'Bonjol',
                'nomor_telepon' => '0753-21003',
                'latitude' => -0.2017,
                'longitude' => 100.2143,
            ],
            [
                'kode_puskesmas' => 'PSM-004',
                'nama' => 'UPT PUSKESMAS LADANG PANJANG',
                'alamat' => 'Jl. Raya Ganggo Hilia',
                'kecamatan' => 'Bonjol',
                'desa' => 'Ganggo Hilia',
                'nomor_telepon' => '0753-21004',
                'latitude' => -0.1985,
                'longitude' => 100.1987,
            ],

            // Kecamatan Duo Koto
            [
                'kode_puskesmas' => 'PSM-005',
                'nama' => 'UPT PUSKESMAS KUMPULAN',
                'alamat' => 'Jl. Raya Duo Koto',
                'kecamatan' => 'Duo Koto',
                'desa' => 'Duo Koto',
                'nomor_telepon' => '0753-21005',
                'latitude' => -0.1876,
                'longitude' => 100.1876,
            ],

            // Kecamatan Tigo Nagari
            [
                'kode_puskesmas' => 'PSM-006',
                'nama' => 'UPT PUSKESMAS BONJOL',
                'alamat' => 'Jl. Raya Tigo Nagari',
                'kecamatan' => 'Tigo Nagari',
                'desa' => 'Tigo Nagari',
                'nomor_telepon' => '0753-21006',
                'latitude' => -0.1765,
                'longitude' => 100.1765,
            ],

            // Kecamatan Panti
            [
                'kode_puskesmas' => 'PSM-007',
                'nama' => 'UPT PUSKESMAS SUNDATAR',
                'alamat' => 'Jl. Raya Panti',
                'kecamatan' => 'Panti',
                'desa' => 'Panti',
                'nomor_telepon' => '0753-21007',
                'latitude' => -0.1654,
                'longitude' => 100.1654,
            ],

            // Kecamatan Mapat Tunggul
            [
                'kode_puskesmas' => 'PSM-008',
                'nama' => 'UPT PUSKESMAS PEGANG BARU',
                'alamat' => 'Jl. Raya Mapat Tunggul',
                'kecamatan' => 'Mapat Tunggul',
                'desa' => 'Mapat Tunggul',
                'nomor_telepon' => '0753-21008',
                'latitude' => -0.1543,
                'longitude' => 100.1543,
            ],

            // Kecamatan Lubuk Sikaping Kota
            [
                'kode_puskesmas' => 'PSM-009',
                'nama' => 'UPT PUSKESMAS CUBADAK',
                'alamat' => 'Jl. Sudirman No. 15',
                'kecamatan' => 'Lubuk Sikaping',
                'desa' => 'Lubuk Sikaping Kota',
                'nomor_telepon' => '0753-21009',
                'latitude' => -0.3165,
                'longitude' => 100.3495,
            ],

            // Kecamatan Rao
            [
                'kode_puskesmas' => 'PSM-010',
                'nama' => 'UPT PUSKESMAS SIMPANG TONANG',
                'alamat' => 'Jl. Lintas Sumatera KM. 25',
                'kecamatan' => 'Rao',
                'desa' => 'Rao',
                'nomor_telepon' => '0753-21010',
                'latitude' => -0.1432,
                'longitude' => 100.1432,
            ],

            
            [
                'kode_puskesmas' => 'PSM-011',
                'nama' => 'UPT PUSKESMAS KUAMANG',
                'alamat' => 'Jl. Lintas Sumatera KM. 25',
                'kecamatan' => 'Rao',
                'desa' => 'Rao',
                'nomor_telepon' => '0753-21010',
                'latitude' => -0.1432,
                'longitude' => 100.1432,
            ],
            [
                'kode_puskesmas' => 'PSM-012',
                'nama' => 'UPT PUSKESMAS RAO',
                'alamat' => 'Jl. Lintas Sumatera KM. 25',
                'kecamatan' => 'Rao',
                'desa' => 'Rao',
                'nomor_telepon' => '0753-21010',
                'latitude' => -0.1432,
                'longitude' => 100.1432,
            ],
            [
                'kode_puskesmas' => 'PSM-013',
                'nama' => 'UPT PUSKESMAS KOTO RAJO',
                'alamat' => 'Jl. Lintas Sumatera KM. 25',
                'kecamatan' => 'Rao',
                'desa' => 'Rao',
                'nomor_telepon' => '0753-21010',
                'latitude' => -0.1432,
                'longitude' => 100.1432,
            ],
            [
                'kode_puskesmas' => 'PSM-014',
                'nama' => 'UPT PUSKESMAS LANSAT KADAP',
                'alamat' => 'Jl. Lintas Sumatera KM. 25',
                'kecamatan' => 'Rao',
                'desa' => 'Rao',
                'nomor_telepon' => '0753-21010',
                'latitude' => -0.1432,
                'longitude' => 100.1432,
            ],
            [
                'kode_puskesmas' => 'PSM-015',
                'nama' => 'UPT PUSKESMAS PINTU PADANG',
                'alamat' => 'Jl. Lintas Sumatera KM. 25',
                'kecamatan' => 'Rao',
                'desa' => 'Rao',
                'nomor_telepon' => '0753-21010',
                'latitude' => -0.1432,
                'longitude' => 100.1432,
            ],
            [
                'kode_puskesmas' => 'PSM-016',
                'nama' => 'UPT PUSKESMAS SILAYANG',
                'alamat' => 'Jl. Lintas Sumatera KM. 25',
                'kecamatan' => 'Rao',
                'desa' => 'Rao',
                'nomor_telepon' => '0753-21010',
                'latitude' => -0.1432,
                'longitude' => 100.1432,
            ],
        ];

        foreach ($puskesmas as $data) {
            Puskesmas::create($data);
        }
    }
}
