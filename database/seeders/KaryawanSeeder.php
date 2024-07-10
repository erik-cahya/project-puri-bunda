<?php

namespace Database\Seeders;

use App\Models\JabatanModel;
use App\Models\KaryawanModel;
use App\Models\UnitModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marketing = JabatanModel::where('nama_jabatan', 'Marketing')->first();
        $accountant = JabatanModel::where('nama_jabatan', 'Accountant')->first();
        $management = UnitModel::where('nama_unit', 'Management')->first();

        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            KaryawanModel::create([
                'nama_karyawan' => $faker->name,
                'id_jabatan_1' => $marketing->id,
                'id_jabatan_2' => $accountant->id,
                'id_unit' => $management->id,
                'tanggal_bergabung' => $faker->date('Y-m-d'),
            ]);
        }
    }
}
