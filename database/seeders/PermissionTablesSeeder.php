<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'permission_group_id' => '1',
            'name' => 'root',
            'label' => 'Root Permission',
        ]);

        Permission::create([
            'permission_group_id' => '2',
            'name' => 'edit-config',
            'label' => 'Edit System Settings',
        ]);

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'show-user',
            'label' => 'View User',
        ]);

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'create-user',
            'label' => 'Add User',
        ]);

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'edit-user',
            'label' => 'Edit User',
        ]);

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'destroy-user',
            'label' => 'Delete User',
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'show-role',
            'label' => 'View Permission',
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'create-role',
            'label' => 'Add Permission',
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'edit-role',
            'label' => 'Edit Permission',
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'destroy-role',
            'label' => 'Delete Permission',
        ]);

        $this->command->info('Permissions created!');
    }
}
