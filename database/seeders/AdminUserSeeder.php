<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@edukhmer.edu.kh'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'is_active' => true,
            ]
        );

        $admin->assignRole('admin');

        // Create a content editor
        $editor = User::firstOrCreate(
            ['email' => 'editor@edukhmer.edu.kh'],
            [
                'name' => 'Editor',
                'password' => Hash::make('password'),
                'is_active' => true,
            ]
        );

        $editor->assignRole('editor');
    }
}
