<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class SyncPermissionToRoleTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->syncPermissionsToRole();
    }

    private function syncPermissionsToRole(): void
    {
        $permissions_id = Permission::permissionsId(1);
        $role = Role::find(1);
        $role->permissions()->sync($permissions_id);

        $permissions_id = Permission::permissionsId(2);
        $role = Role::find(2);
        $role->permissions()->sync($permissions_id);

        $this->command->info('Permissions linked to roles!');
    }
}
