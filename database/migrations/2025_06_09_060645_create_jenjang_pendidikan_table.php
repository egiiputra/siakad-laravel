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
        Schema::create('jenjang_pendidikan', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);
        });

        DB::table('jenjang_pendidikan')->insert([
            ['id' => 22, 'nama' => 'D3'],
            ['id' => 25, 'nama' => 'Profesi'],
            ['id' => 30, 'nama' => 'S1'],
            ['id' => 35, 'nama' => 'S2'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenjeng_pendidikan', function(Blueprint $table) {
            $table->dropPrimary('id');
        });
        Schema::dropIfExists('jenjang_pendidikan');
    }
};
