<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $faker = \Faker\Factory::create('pt-BR');
            User::create([
                'email' => $faker->email ?? "not_found_{$i}@spv.br",
                'name' => $faker->name ?? "#{$i} - Aluno não identificado",
                'password' => Hash::make($faker->password),
                'avatar' => $faker->imageUrl($width = 640, $height = 480),
                'active' => true,
            ])
            ->create();
        }
    }
}
