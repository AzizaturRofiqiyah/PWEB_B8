<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Konten>
 */
class KontenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
            'konten' => $this->faker->text(500),
            'foto' => $this->faker->imageUrl(640, 480, 'nature', true),
            'user_id' => \App\Models\User::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
