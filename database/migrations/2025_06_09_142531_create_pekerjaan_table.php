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
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('nama', length: 50);
        });

        DB::table('pekerjaan')->insert([
            ['id' => 1, 'nama' => 'Tidak bekerja'],
            ['id' => 2, 'nama' => 'Nelayan'],
            ['id' => 3, 'nama' => 'Petani'],
            ['id' => 4, 'nama' => 'Peternak'],
            ['id' => 5, 'nama' => 'PNS/TNI/Polri'],
            ['id' => 6, 'nama' => 'Karyawan Swasta'],
            ['id' => 7, 'nama' => 'Pedagang Kecil'],
            ['id' => 8, 'nama' => 'Pedagang Besar'],
            ['id' => 9, 'nama' => 'Wiraswasta'],
            ['id' => 10, 'nama' => 'Wirausaha'],
            ['id' => 11, 'nama' => 'Buruh'],
            ['id' => 12, 'nama' => 'Pensiunan'],
            ['id' => 98, 'nama' => 'Sudah Meninggal'],
            ['id' => 99, 'nama' => 'Lainnya']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan');
    }
};
