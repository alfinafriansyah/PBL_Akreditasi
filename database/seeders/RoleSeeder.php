<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'role_id' => 1,
                'role_kode' => 'KRT1',
                'role_nama' => 'Kriteria 1'
            ],
            [
                'role_id' => 2,
                'role_kode' => 'KRT2',
                'role_nama' => 'Kriteria 2'
            ],
            [
                'role_id' => 3,
                'role_kode' => 'KRT3',
                'role_nama' => 'Kriteria 3'
            ],
            [
                'role_id' => 4,
                'role_kode' => 'KRT4',
                'role_nama' => 'Kriteria 4'
            ],
            [
                'role_id' => 5,
                'role_kode' => 'KRT5',
                'role_nama' => 'Kriteria 5'
            ],
            [
                'role_id' => 6,
                'role_kode' => 'KRT6',
                'role_nama' => 'Kriteria 6'
            ],
            [
                'role_id' => 7,
                'role_kode' => 'KRT7',
                'role_nama' => 'Kriteria 7'
            ],
            [
                'role_id' => 8,
                'role_kode' => 'KRT8',
                'role_nama' => 'Kriteria 8'
            ],
            [
                'role_id' => 9,
                'role_kode' => 'KRT9',
                'role_nama' => 'Kriteria 9'
            ],
            [
                'role_id' => 10,
                'role_kode' => 'ADM',
                'role_nama' => 'Administrator'
            ],
            [
                'role_id' => 11,
                'role_kode' => 'KOOR',
                'role_nama' => 'Koordinator'
            ],
            [
                'role_id' => 12,
                'role_kode' => 'KPSKAJUR',
                'role_nama' => 'KPS/Kajur'
            ],
            [
                'role_id' => 13,
                'role_kode' => 'KJM',
                'role_nama' => 'KJM'
            ],
            [
                'role_id' => 14,
                'role_kode' => 'DIR',
                'role_nama' => 'SPI/Direktur'
            ],
        ];

        DB::table('role')->insert($data);
    }
}
