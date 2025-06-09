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
        Schema::create('penghasilan', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);
        });

        DB::table('penghasilan')->insert([
            ['id' => 11, 'nama' => 'Kurang dari Rp.500.000'],
            ['id' => 12, 'nama' => 'Rp.500.000 s/d Rp.999.999'],
            ['id' => 13, 'nama' => 'Rp.1.000.000 s/d Rp.1.999.999'],
            ['id' => 14, 'nama' => 'Rp.2.000.000 s/d Rp.4.999.999'],
            ['id' => 15, 'nama' => 'Rp.5.000.000 s/d Rp.20.000.000'],
            ['id' => 16, 'nama' => 'Lebih dari Rp.20.000.000'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghasilan');
    }
};
