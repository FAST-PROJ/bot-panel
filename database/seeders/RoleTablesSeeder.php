<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Administrators',
            'label' => 'System Administrators',
        ]);

        Role::create([
            'name' => 'Student',
            'label' => 'Students',
        ]);

        $this->command->info('Roles created!');
    }
}
