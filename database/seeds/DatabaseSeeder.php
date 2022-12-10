<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            // CourseTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            // SessionsTableSeeder::class,
        ]);
    }
}
