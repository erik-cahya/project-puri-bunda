<?php

namespace Database\Seeders;

use App\Models\UnitModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataUnit = [
            [
                'nama_unit' => 'Unit Kebersihan',
            ],
            [
                'nama_unit' => 'Unit Keamanan',
            ],
            [
                'nama_unit' => 'Unit Infrastuktur',
            ],
            [
                'nama_unit' => 'Management',
            ],

        ];

        foreach ($dataUnit as $unit) {
            UnitModel::create($unit);
        }
    }
}
