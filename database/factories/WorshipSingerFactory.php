<?php

namespace Database\Factories;

use App\Models\Worship;
use App\Models\Congregation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorshipSinger>
 */
class WorshipSingerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'worship_id' => Worship::inRandomOrder()->first()?->id,
            'singer_id' => Congregation::inRandomOrder()->first()?->id,
        ];
    }
}
