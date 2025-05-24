<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
               'nip' => '198107052005011002',
               'nama' => 'Ahmadi Yuli Ananta, ST',
               
            ],
            [
                'nip' => '198108102005012002',
                'nama' => 'Ariadi Retno Tri Hayati Ririd, S.Kom., M.Kom',
                
            ],
            [
                'nip' => '197903132008121002',
                'nama' => 'Arief Prasetyo, S.Kom',
                
            ],
            [
                'nip' => '197606252005012001',
                'nama' => 'Atiqah Nurul Asri, S.Pd., M.Pd',
                
            ],
            [
                'nip' => '198108092010121002',
                'nama' => 'Banni Satria Andoko, S.Kom., M.Si',
                
            ],
            [
                'nip' => '196201051990031002',
                'nama' => 'Budi Harijanto, ST., MMkom',
                
            ],
            [
                'nip' => '197202022005011002',
                'nama' => 'Cahya Rahmad, ST., M.Kom., Dr. Eng',
                
            ],
            [
                'nip' => '196211281988111001',
                'nama' => 'Deddy Kusbianto Purwoko Aji, Ir., M.MKom',
                
            ],
            [
                'nip' => '198311092014042001',
                'nama' => 'Dhebys Suryani H, S.Kom., MT',
                
            ],
            [
                'nip' => '197911152005012002',
                'nama' => 'Dwi Puspitasari, S.Kom., M.Kom',
                
            ],
            [
                'nip' => '197109151999031001',
                'nama' => 'Dr.Eng. Anggit Murdani, S.T., M.Eng',
                
            ],
            [
                'nip' => '197305102008011010',
                'nama' => 'Indra Dharma Wijaya, ST., MMT',
                
            ],
            [
                'nip' => '197710302005012001',
                'nama' => 'Mungki Astiningrum, ST., M.Kom',
                
            ],
            [
                'nip' => '198611032014041001',
                'nama' => 'Putra Prima Arhandi, ST., M.Kom',
                
            ],
        ];

        DB::table('data_dosen')->insert($data);
    }
}
