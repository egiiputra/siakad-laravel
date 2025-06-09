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
        Schema::create('transportasi', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);
        });

        DB::table('transportasi')->insert([
            ['id' => 1, 'nama' => 'Jalan Kaki'],
            ['id' => 11, 'nama' => 'Kuda'],
            ['id' => 12, 'nama' => 'Sepeda'],
            ['id' => 13, 'nama' => 'Sepeda motor'],
            ['id' => 14, 'nama' => 'Mobil pribadi'],
            ['id' => 3, 'nama' => 'Angkutan umum/bus/pete-pete'],
            ['id' => 4, 'nama' => 'Mobil/bus antar jemput'],
            ['id' => 5, 'nama' => 'Kereta api'],
            ['id' => 6, 'nama' => 'Ojek'],
            ['id' => 7, 'nama' => 'Andong/bendi/sado/dokar/delman/becak'],
            ['id' => 8, 'nama' => 'Perahu penyeberangan/rakit/getek'],
            ['id' => 99, 'nama' => 'Lainnya']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportasi');
    }
};
