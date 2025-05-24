<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $data = [
            [
                'user_id' => 1,
                'dosen_id' => 1,
                'role_id' => 1,
                'username' => 'kriteria1',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 2,
                'dosen_id' => 2,
                'role_id' => 2,
                'username' => 'kriteria2',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 3,
                'dosen_id' => 3,
                'role_id' => 3,
                'username' => 'kriteria3',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 4,
                'dosen_id' => 4,
                'role_id' => 4,
                'username' => 'kriteria4',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 5,
                'dosen_id' => 5,
                'role_id' => 5,
                'username' => 'kriteria5',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 6,
                'dosen_id' => 6,
                'role_id' => 6,
                'username' => 'kriteria6',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 7,
                'dosen_id' => 7,
                'role_id' => 7,
                'username' => 'kriteria7',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 8,
                'dosen_id' => 8,
                'role_id' => 8,
                'username' => 'kriteria8',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 9,
                'dosen_id' => 9,
                'role_id' => 9,
                'username' => 'kriteria9',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 10,
                'dosen_id' => 10,
                'role_id' => 10,
                'username' => 'admin',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 11,
                'dosen_id' => 11,
                'role_id' => 11,
                'username' => 'koor',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 12,
                'dosen_id' => 12,
                'role_id' => 12,
                'username' => 'kpskajur',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 13,
                'dosen_id' => 13,
                'role_id' => 13,
                'username' => 'kjm',
                'password' => bcrypt('12345'),
            ],
            [
                'user_id' => 14,
                'dosen_id' => 14,
                'role_id' => 14,
                'username' => 'direkturspi',
                'password' => bcrypt('12345'),
            ],
        ];

        DB::table('user')->insert($data);
    }
}
