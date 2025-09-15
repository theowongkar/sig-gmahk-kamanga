<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Congregation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worship>
 */
class WorshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'preacher_id' => Congregation::inRandomOrder()->first()?->id,
            'mc_id' => Congregation::inRandomOrder()->first()?->id,
            'category' => fake()->randomElement(['Ibadah Sabat', 'Kebaktian Rumah Tangga', 'Pernikahan', 'Kedukaan', 'Ibadah Pemuda Advent', 'Ibadah Remaja Advent']),
            'date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'start_time' => fake()->time('H:i:s'),
            'end_time' => fake()->time('H:i:s'),
            'location' => fake()->randomElement(['Gedung Gereja', 'Balai Pertemuan', fake()->address()]),
            'status' => 'Diterima',
        ];
    }
}
