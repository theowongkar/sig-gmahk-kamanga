<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Worship;
use App\Models\Congregation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@kamanga.com',
            'role' => 'Admin',
        ]);

        User::factory()->count(14)->create();
        Congregation::factory()->count(20)->create();
        Post::factory()->count(20)->create();
        Worship::factory(20)->hasSingers(3)->create();
    }
}
