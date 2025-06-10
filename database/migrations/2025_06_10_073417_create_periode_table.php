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
        Schema::create('periode', function (Blueprint $table) {
            $table->smallInteger('id')->primary();
            $table->string('nama', length: 20);
            $table->boolean('status');
        });

        DB::table('periode')->insert([
            ['id' => 20161, 'nama' => 'Gasal 2016/2017', 'status' => false],
            ['id' => 20162, 'nama' => 'Genap 2016/2017', 'status' => false],
            ['id' => 20171, 'nama' => 'Gasal 2017/2018', 'status' => false],
            ['id' => 20172, 'nama' => 'Genap 2017/2018', 'status' => false],
            ['id' => 20181, 'nama' => 'Gasal 2018/2019', 'status' => false],
            ['id' => 20182, 'nama' => 'Genap 2018/2019', 'status' => false],
            ['id' => 20191, 'nama' => 'Gasal 2019/2020', 'status' => false],
            ['id' => 20192, 'nama' => 'Genap 2019/2020', 'status' => false],
            ['id' => 20201, 'nama' => 'Gasal 2020/2021', 'status' => false],
            ['id' => 20202, 'nama' => 'Genap 2020/2021', 'status' => false],
            ['id' => 20211, 'nama' => 'Gasal 2021/2022', 'status' => false],
            ['id' => 20212, 'nama' => 'Genap 2021/2022', 'status' => false],
            ['id' => 20221, 'nama' => 'Ganjil 2022/2023', 'status' => false],
            ['id' => 20222, 'nama' => 'Genap 2022/2023', 'status' => false],
            ['id' => 20231, 'nama' => 'Ganjil 2023/2024', 'status' => false],
            ['id' => 20232, 'nama' => 'Genap 2023/2024', 'status' => false],
            ['id' => 20241, 'nama' => 'Ganjil 2024/2025', 'status' => false],
            ['id' => 20242, 'nama' => 'Genap 2024/2025', 'status' => false],
            ['id' => 20251, 'nama' => 'Ganjil 2025/2026', 'status' => true],
            ['id' => 20252, 'nama' => 'Genap 2025/2026', 'status' => false],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode');
    }
};
