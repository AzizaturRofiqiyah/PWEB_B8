<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\InformasiBeasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Komentar>
 */
class KomentarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isi' => $this->faker->text(200),
            'user_id' => User::factory(),
            'informasi_beasiswa_id' => InformasiBeasiswa::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
