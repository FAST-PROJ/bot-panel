<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SyncRoleToUserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->syncUserToRoles();
    }

    private function syncUserToRoles(): void
    {
        $role = User::find(1);
        $role->roles()->sync([1]);

        $role = User::find(2);
        $role->roles()->sync([2]);

        $this->command->info('Users linked to roles!');
    }
}
