<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Portfolio Admin',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
        ]);

        Profile::create([
            'name' => 'John Doe',
            'bio' => 'A multi-role professional specializing in Software Development, Graphic Design, and Management.',
            'social_links' => [
                'linkedin' => 'https://linkedin.com',
                'github' => 'https://github.com',
                'behance' => 'https://behance.net',
            ],
        ]);
    }
}
