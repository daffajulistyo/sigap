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
            'DINAS KOMUNIKASI DAN INFORMATIKA',
            'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA',
            'INSPEKTORAT',
            'BADAN KEUANGAN DAERAH',
            'BADAN PERENCANAAN PEMBANGUNAN DAERAH',
            'SATUAN POLISI PAMONG PRAJA DAN PEMADAM KEBAKARAN',
            'BADAN KESATUAN BANGSA DAN POLITIK',
            'DINAS PEMBERDAYAAN PEREMPUAN',
            'PERLINDUNGAN ANAK',
            'PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA',
            'SEKRETARIAT DAERAH',
            'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU',
            'SEKRETARIAT DPRD',
            'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG',
            'DINAS PEMBERDAYAAN MASYARAKAT',
            'DINAS KESEHATAN',
            'DINAS SOSIAL',
            'DINAS PENDIDIKAN',
            'DINAS PERPUSTAKAAN DAN KEARSIPAN',
            'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL',
            'DINAS PERTANIAN',
            'DINAS KOPERASI UKM, PERDAGANGAN DAN TENAGA KERJA',
            'ASISTEN PEMERINTAHAN',
            'ASISTEN PEREKONOMIAN DAN PEMBANGUNAN',
            'ASISTEN ADMINISTRASI UMUM',
            'DINAS PARIWISATA, PEMUDA, OLAHRAGA DAN KEBUDAYAAN',
            'DINAS PERUMAHAN RAKYAT DAN KAWASAN PEMUKIMAN, PERHUBUNGAN DAN LINGKUNGAN HIDUP',
            'DINAS PERIKANAN DAN PANGAN',
            'BADAN PENANGGULANGAN BENCANA DAERAH',
            'RSUD TUANKU RAO',
            'RSUD TUANKU IMAM BONJOL',
            'KECAMATAN LUBUK SIKAPING',
            'KECAMATAN SIMPATI',
            'KECAMATAN BONJOL',
            'KECAMATAN DUA KOTO',
            'KECAMATAN PANTI',
            'KECAMATAN MAPAT TUNGGUL',
            'KECAMATAN MAPAT TUNGGUL SELATAN',
            'KECAMATAN PADANG GELUGUR',
            'KECAMATAN RAO',
            'KECAMATAN RAO SELATAN',
            'KECAMATAN RAO UTARA',
            'KECAMATAN TIGO NAGARI',
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
