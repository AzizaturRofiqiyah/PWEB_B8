<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notifikasi>
 */
class NotifikasiFactory extends Factory
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
            'judul' => $this->faker->sentence,
            'user_id' => User::factory()->create()->id,
            'isreaded' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
