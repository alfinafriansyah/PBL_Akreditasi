<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'status_id' => 1,
                'status_kode' => 'SAVE',
                'keterangan' => 'Data disimpan'
            ],
            [
                'status_id' => 2,
                'status_kode' => 'REVISI',
                'keterangan' => 'Perlu revisi'
            ],
            [
                'status_id' => 3,
                'status_kode' => 'ACC1',
                'keterangan' => 'Disetujui oleh Koordinator'
            ],
            [
                'status_id' => 4,
                'status_kode' => 'ACC2',
                'keterangan' => 'Disetujui oleh KPS/Kajur'
            ],
            [
                'status_id' => 5,
                'status_kode' => 'ACC3',
                'keterangan' => 'Disetujui oleh KJM'
            ],
            [
                'status_id' => 6,
                'status_kode' => 'VALID',
                'keterangan' => 'Data sudah divalidasi'
            ],
        ];

        DB::table('status')->insert($data);
    }
}
