<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Congregation>
 */
class CongregationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'date_of_birth' => fake()->date(),
            'place_of_birth' => fake()->city(),
            'address' => fake()->address(),
            'position' => fake()->randomElement(['Pendeta', 'Sekretaris', 'Bendahara', 'Penatua', 'Diaken', 'Anggota']),
            'status' => fake()->randomElement(['Aktif', 'Tidak Aktif', 'Pindah', 'Meninggal Dunia']),
        ];
    }
}
