<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->char('id', length: 5)->primary();

            $table->char('nim_prefix', length: 2);
            $table->unsignedInteger('id_fak');
            $table->string('nama', length: 40);
            $table->string('program', length: 40);
            $table->string('nipy_kaprodi', length: 30);
            $table->string('akreditasi', length: 10);
            $table->string('no_kaprodi', length: 50);
            $table->date('tgl_akreditasi');
            $table->tinyInteger('status');

            $table->foreign('id_fak')->references('id')->on('fakultas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prodi', function (Blueprint $table) {
            $table->dropPrimary('id');
        });
        Schema::dropIfExists('prodi');
    }
};
