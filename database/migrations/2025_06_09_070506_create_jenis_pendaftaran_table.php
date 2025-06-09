<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jenis_pendaftaran', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);
            $table->string('alias', length: 50);
        });

        DB::table('jenis_pendaftaran')->insert([
            ['id' => 1, 'nama' => 'Peserta Didik Baru', 'alias' => 'Mahasiswa Baru'],
            ['id' => 11, 'nama' => 'Alih Jenjang', 'alias' => ''],
            ['id' => 12, 'nama' => 'Lintas Jalur', 'alias' => ''],
            ['id' => 2, 'nama' => 'Pindahan', 'alias' => 'Mahasiswa Transfer']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pendaftaran');
    }
};
