<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@spv.br',
            'name' => 'Administrator',
            'password' => Hash::make('123456'),
            'avatar' => 'assets/images/default-avatar.png',
            'active' => true,
            'is_student' => false,
        ]);

        User::create([
            'email' => 'aluno@spv.br',
            'name' => 'Aluno',
            'password' => Hash::make('123456'),
            'avatar' => 'assets/images/default-avatar.png',
            'active' => true,
            'is_student' => true,
        ]);

        $this->command->info('Users aluno and admin created');
    }
}
