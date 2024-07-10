<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 199; $i++) {
            User::create([
                'name' => $faker->name,
                'username' => $faker->unique()->userName,
                'password' => bcrypt('password'), // Default password for seeder
            ]);
        }
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'), // Default password for seeder
        ]);
    }
}
