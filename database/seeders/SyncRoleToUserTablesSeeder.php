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
        $count = 0;
        for ($userID = 1; $userID < 1010; $userID++) {
            $role = User::find(1);
            if ($role) {
                $role->roles()->sync([$userID]);
                $count++;
            }
        }

        $this->command->info("#{$count} Users have been linked to roles!");
    }
}
