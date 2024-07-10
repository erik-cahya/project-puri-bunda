<?php

namespace Database\Seeders;

use App\Models\JabatanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJabatan = [
            [
                'nama_jabatan' => 'IT Manager',
            ],
            [
                'nama_jabatan' => 'Senior Programmer',
            ],
            [
                'nama_jabatan' => 'IT Support',
            ],
            [
                'nama_jabatan' => 'Chef',
            ],
            [
                'nama_jabatan' => 'Accountant',
            ],
            [
                'nama_jabatan' => 'Marketing',
            ],
            [
                'nama_jabatan' => 'General Manager',
            ],
            [
                'nama_jabatan' => 'Public Relations',
            ],
        ];

        foreach ($dataJabatan as $jabatan) {
            JabatanModel::create($jabatan);
        }
    }
}
