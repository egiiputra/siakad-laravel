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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);
        });

        DB::table('pendidikan')->insert([
            ['id' => 0, 'nama' => 'Tidak Sekolah'],
            ['id' => 1, 'nama' => 'PAUD'],
            ['id' => 2, 'nama' => 'TK / sederajat'],
            ['id' => 3, 'nama' => 'Putus SD'],
            ['id' => 4, 'nama' => 'SD / sederajat'],
            ['id' => 5, 'nama' => 'SMP / sederajat'],
            ['id' => 6, 'nama' => 'SMA / sederajat'],
            ['id' => 7, 'nama' => 'Paket A'],
            ['id' => 8, 'nama' => 'Paket B'],
            ['id' => 9, 'nama' => 'Paket C'],
            ['id' => 20, 'nama' => 'D1'],
            ['id' => 21, 'nama' => 'D2'],
            ['id' => 22, 'nama' => 'D3'],
            ['id' => 23, 'nama' => 'D4'],
            ['id' => 25, 'nama' => 'Profesi'],
            ['id' => 30, 'nama' => 'S1'],
            ['id' => 32, 'nama' => 'Sp-1'],
            ['id' => 35, 'nama' => 'S2'],
            ['id' => 37, 'nama' => 'Sp-2'],
            ['id' => 40, 'nama' => 'S3'],
            ['id' => 90, 'nama' => 'Non formal'],
            ['id' => 91, 'nama' => 'Informal'],
            ['id' => 99, 'nama' => 'Lainnya'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
