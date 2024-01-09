<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $adminRole = Role::where('name', 'Admin')->first();
        $editorRole = Role::where('name', 'Editor')->first();
        User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => Hash::make('password'), // Use a secure password in production
            'role_id' => $editorRole->id // Assign the editor role to this user
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Use a secure password in production
            'role_id' => $adminRole->id // Assign the admin role to this user
        ]);

    }
}
