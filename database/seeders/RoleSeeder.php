<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make role
        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'user',
        ]);

        // give user a role
        $admin = User::find(1);
        $user1 = User::find(2);
        $user2 = User::find(3);

        $admin->assignRole('admin');
        $user1->assignRole('user');
        $user2->assignRole('user');
    }
}
