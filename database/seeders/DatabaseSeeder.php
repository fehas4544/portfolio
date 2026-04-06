<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
        ]);

        Skill::create(['name' => 'Laravel', 'category' => 'development', 'proficiency' => 90]);
        Skill::create(['name' => 'Photoshop', 'category' => 'design', 'proficiency' => 85]);
        Skill::create(['name' => 'Management', 'category' => 'administration', 'proficiency' => 80]);
    }
}
