<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Worship;
use App\Models\Congregation;
use App\Models\WorshipSinger;
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

        User::factory(14)->create();
        $congregations = Congregation::factory(30)->create();
        Post::factory(30)->create();
        $worships = Worship::factory(30)->create();

        $worships->each(function ($worship) use ($congregations) {
            $singerIds = $congregations->random(3)->pluck('id');

            foreach ($singerIds as $singerId) {
                WorshipSinger::create([
                    'worship_id' => $worship->id,
                    'singer_id'  => $singerId,
                ]);
            }
        });
    }
}
