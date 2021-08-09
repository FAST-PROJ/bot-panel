<?php

use Database\Seeders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->command->info('Initializing...');
        $this->command->info('Deleting tables...');

        DB::table('configs')->truncate();
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('permissions')->truncate();
        DB::table('permission_groups')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();

        $this->command->info('Deleted tables!');
        $this->command->info('Creating Tables...');

        $this->call([
            Seeders\ConfigTableSeeder::class,
            Seeders\RoleTablesSeeder::class,
            Seeders\PermissionGroupTablesSeeder::class,
            Seeders\PermissionTablesSeeder::class,
            Seeders\SyncPermissionToRoleTablesSeeder::class,
            Seeders\AdminUsersSeeder::class,
            // Seeders\FakeUsersSeeder::class,
            Seeders\SyncRoleToUserTablesSeeder::class,
        ]);

        $this->command->info('Finished!');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
