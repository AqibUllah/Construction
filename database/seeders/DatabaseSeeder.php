<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin@123'),
            'email_verified_at' => now(),
        ]);
        
        $ali = \App\Models\User::factory()->create([
            'name' => 'Ali',
            'email' => 'ali@example.com',
            'password' => bcrypt('ali@123'),
            'email_verified_at' => now(),
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $vendorRole = Role::create(['name' => 'vendor']);
        // $permission = Permission::create(['name' => 'edit articles']);
        $admin->assignRole($adminRole);
        $ali->assignRole($vendorRole);

    }
}
