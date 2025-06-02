<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institution>
 */
class InstitutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'type' => $this->faker->randomElement(['University', 'College', 'School']),
            'address' => $this->faker->address,
            'website' => $this->faker->url,
            'document_path' => $this->faker->filePath(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
