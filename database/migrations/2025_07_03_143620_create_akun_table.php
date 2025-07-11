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
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->string('username', length: 20)->unique();
            $table->string('password', length: 100);
            $table->string('level', length: 10);
            $table->char('id_prodi', length: 5)->nullable();

            $table->timestamps();

            $table->foreign('id_prodi')->references('id')->on('prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
