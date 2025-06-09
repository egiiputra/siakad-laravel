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
        Schema::create('pembiayaan', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);

        });

        DB::table('pembiayaan')->insert([
            ['id' => 1, 'nama' => 'Mandiri'],
            ['id' => 2, 'nama' => 'Beasiswa Tidak Penuh'],
            ['id' => 3, 'nama' => 'Beasiswa Penuh'],
            ['id' => 4, 'nama' => 'Dispensasi'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembiayaan');
    }
};
