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
            'name' => 'Developer',
            'label' => 'System Developer',
        ]);

        Role::create([
            'name' => 'Administrators',
            'label' => 'System Administrators',
        ]);

        $this->command->info('Roles created!');
    }
}
