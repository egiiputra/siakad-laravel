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
        Schema::create('jenis_tinggal', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);
        });

        DB::table('jenis_tinggal')->insert([
            ['id' => 1, 'nama' => 'Bersama Orang Tua'],
            ['id' => 2, 'nama' => 'Wali'],
            ['id' => 3, 'nama' => 'Kost'],
            ['id' => 4, 'nama' => 'Asrama'],
            ['id' => 5, 'nama' => 'Panti Asuhan'],
            ['id' => 99, 'nama' => 'Lainnya']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_tinggal');
    }
};
