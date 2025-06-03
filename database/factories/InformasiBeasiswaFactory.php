<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\InformasiBeasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformasiBeasiswa>
 */
class InformasiBeasiswaFactory extends Factory
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
            'deskripsi_singkat' => $this->faker->sentence,
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
            'foto' => $this->faker->imageUrl(640, 480, 'business', true),
            'link_pendaftaran' => $this->faker->url,
            'user_id' => User::factory()->create()->id,
            'jenis' => collect(['Penuh','Parsial'])->random(),
            'wilayah' => collect(['Dalam Negeri','Luar Negri','Dalam/Luar Negeri'])->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
