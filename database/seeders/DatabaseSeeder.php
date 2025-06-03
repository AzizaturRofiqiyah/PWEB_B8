<?php

namespace Database\Seeders;

use App\Models\InformasiBeasiswa;
use App\Models\Notifikasi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'role' => 'super admin'
        ]);
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => '12345678',
            'role' => 'admin'
        ]);
        InformasiBeasiswa::factory(10)->create([
            'user_id' => 1
        ]);
        Notifikasi::factory(5)->create([
            'user_id' => 1
        ]);
    }
}
