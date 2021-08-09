<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;

class PermissionGroupTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PermissionGroup::create([
            'name' => 'Developer Settings',
        ]);

        PermissionGroup::create([
            'name' => 'System Settings',
        ]);

        PermissionGroup::create([
            'name' => 'Users',
        ]);

        PermissionGroup::create([
            'name' => 'Permissions',
        ]);

        $this->command->info('Permission Groups created!');
    }
}
