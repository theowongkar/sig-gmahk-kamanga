<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6, true);

        return [
            'author_id' => User::inRandomOrder()->first()?->id,
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(1, 9999),
            'content' => fake()->paragraphs(3, true),
            'image' => fake()->optional()->imageUrl(800, 600, 'church', true),
            'status' => fake()->randomElement(['Draf', 'Terbit', 'Arsip']),
            'views' => fake()->numberBetween(0, 500),
        ];
    }
}
