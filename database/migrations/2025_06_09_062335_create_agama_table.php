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
        Schema::create('agama', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);

        });

        DB::table('agama')->insert([
            ['id' => 1, 'nama' => 'Islam'],
            ['id' => 2, 'nama' => 'Kristen'],
            ['id' => 3, 'nama' => 'Katholik'],
            ['id' => 4, 'nama' => 'Hindu'],
            ['id' => 5, 'nama' => 'Budha'],
            ['id' => 6, 'nama' => 'Konghucu'],
            ['id' => 99, 'nama' => 'Lainnya'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agama');
    }
};
