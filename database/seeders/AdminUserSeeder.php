<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Administrator']);
        $permission = Permission::create(['name' => 'manage tasks']);
        $permission->assignRole($adminRole);

        $adminUser = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('SecurePassword')
        ]);
        $adminUser->assignRole('Administrator');
    }
}
