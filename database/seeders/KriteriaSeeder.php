<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kriteria_id' => 1,
                'kriteria_kode' => "KRT1",
                'kriteria_nama' => 'Kriteria 1 - Visi, Misi, Tujuan, dan Strategi',
            ],
            [
                'kriteria_id' => 2,
                'kriteria_kode' => "KRT2",
                'kriteria_nama' => 'Kriteria 2 - Tata Kelola, Tata Pamong, dan Kerjasama',
            ],
            [
                'kriteria_id' => 3,
                'kriteria_kode' => "KRT3",
                'kriteria_nama' => 'Kriteria 3 - Mahasiswa',
            ],
            [
                'kriteria_id' => 4,
                'kriteria_kode' => "KRT4",
                'kriteria_nama' => 'Kriteria 4 - Sumber Daya Manusia',
            ],
            [
                'kriteria_id' => 5,
                'kriteria_kode' => "KRT5",
                'kriteria_nama' => 'Kriteria 5 - Keuangan, Sarana, dan Prasarana',
            ],
            [
                'kriteria_id' => 6,
                'kriteria_kode' => "KRT6",
                'kriteria_nama' => 'Kriteria 6 - Pendidikan',
            ],
            [
                'kriteria_id' => 7,
                'kriteria_kode' => "KRT7",
                'kriteria_nama' => 'Kriteria 7 - Penelitian',
            ],
            [
                'kriteria_id' => 8,
                'kriteria_kode' => "KRT8",
                'kriteria_nama' => 'Kriteria 8 - Pengabdian kepada Masyarakat',
            ],
            [
                'kriteria_id' => 9,
                'kriteria_kode' => "KRT9",
                'kriteria_nama' => 'Kriteria 9 - Luaran dan Capaian Tridharma',
            ]
        ];

        DB::table('kriteria')->insert($data);
    }
}
