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
        Schema::create('jalur_pendaftaran', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);
        });

        DB::table('jalur_pendaftaran')->insert([
            ['id' => 1, 'nama' => 'SBMPTN'],
            ['id' => 2, 'nama' => 'SNMPTN'],
            ['id' => 3, 'nama' => 'PMDK'],
            ['id' => 4, 'nama' => 'Prestasi'],
            ['id' => 5, 'nama' => 'Seleksi Mandiri PTN'],
            ['id' => 6, 'nama' => 'Seleksi Mandiri PTS'],
            ['id' => 7, 'nama' => 'Ujian Masuk Bersama PTN (UMB-PT)'],
            ['id' => 8, 'nama' => 'Ujian Masuk Bersama PTS (UMB-PTS)'],
            ['id' => 9, 'nama' => 'Program Internasional'],
            ['id' => 11, 'nama' => 'Program Kerjasama Perusahaan/Institusi/Pemerintah'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jalur_pendaftaran');
    }
};
