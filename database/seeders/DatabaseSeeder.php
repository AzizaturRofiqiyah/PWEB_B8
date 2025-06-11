<?php

namespace Database\Seeders;

use App\Models\InformasiBeasiswa;
use App\Models\Institution;
use App\Models\Komentar;
use App\Models\Konten;
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
            'role' => 'admin',
            'institution_id' => Institution::factory()->create([
                'name' => 'Test Institution',
                'type' => 'University',
                'address' => '123 Test St, Test City',
                'website' => 'https://testinstitution.example.com',
                'document_path' => 'documents/test_institution.pdf',
                'status' => 'sudah disetujui'
            ])->id
        ]);
        User::factory()->create([
            'name' => 'User Tester',
            'email' => 'user@example.com',
            'password' => '12345678',
            'role' => 'user'
        ]);
        // InformasiBeasiswa::factory(10)->create([
        //     'user_id' => 2
        // ]);
        // Notifikasi::factory(5)->create([
        //     'user_id' => 1
        // ]);
        // Konten::factory(10)->create();
        // Komentar::factory(10)->create();
    }
}
