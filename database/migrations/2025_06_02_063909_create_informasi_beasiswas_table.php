<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('informasi_beasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('judul');
            $table->string('deskripsi_singkat');
            $table->string('deskripsi');
            $table->date('deadline');
            $table->string('foto')->nullable();
            $table->enum('jenis',['Penuh','Parsial'])->default('Penuh');
            $table->enum('wilayah',['Dalam Negeri','Luar Negri','Dalam/Luar Negeri'])->default('Dalam Negeri');
            $table->string('link_pendaftaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_beasiswas');
    }
};
