<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();

            $table->string('nipd', length: 30);
            $table->string('nik', length: 30);
            $table->string('nama', length: 100);
            $table->string('email', length: 100);
            $table->unsignedSmallInteger('tahun_masuk');
            $table->string('kelas', length: 10);
            $table->tinyInteger('gelombang');
            $table->string('periode_pendaftaran', length: 5);
            $table->char('id_prodi', length: 5);
            $table->tinyInteger('id_jenjang_pendidikan');
            $table->string('tempat_lahir', length: 100);
            $table->char('jenis_kelamin', length: 1);
            $table->tinyInteger('id_agama');

            $table->char('nisn', length: 10)->nullable();
            $table->string('npwp', length: 20)->nullable();
            $table->string('kewarganegaraan', length: 5);
            $table->string('jalan', length: 100);
            $table->string('kota', length: 50);
            $table->string('dusun', length: 50);

            $table->tinyInteger('rt');
            $table->tinyInteger('rw');

            $table->char('kode_pos', length: 5)->nullable();
            $table->tinyInteger('id_jenis_tinggal');
            $table->tinyInteger('id_transportasi');
            $table->string('telepon', length: 20);
            $table->enum('penerima_kps', ['Ya', 'Tidak'])->default('Tidak');
            $table->string('no_kps', length: 50)->nullable();


            $table->tinyInteger('id_jenis_pendaftaran');
            $table->tinyInteger('id_jalur_pendaftaran');
            $table->tinyInteger('id_pembiayaan');
            $table->timestamps(precision: 0);
            $table->unsignedSmallInteger('sks_diakui');
            $table->boolean('selesai_proses');
            $table->tinyText('sca_ijazah');
            $table->tinyText('scan_identitas');
            $table->tinyText('scan_kk');
            $table->tinyText('foto');
            $table->tinyText('buktibayar');
            $table->dateTime('start_ujian');
            $table->dateTime('end_ujian');
            $table->boolean('sudah_ujian');
            $table->boolean('sudah_wawancara');
            $table->decimal('skor', total: 5, places: 2);
            $table->string('asal_sekolah', length: 150);
            $table->string('referensi_dari', length: 150);

            $table->string('nama_ibu', length: 100);
            $table->string('nama_ayah', length: 100);
            $table->string('nama_wali', length: 100);

            $table->date('tanggal_lahir_ibu');
            $table->date('tanggal_lahir_ayah');
            $table->date('tanggal_lahir_wali');

            $table->char('nik_ibu', length: 16)->nullable();
            $table->char('nik_ayah', length: 16)->nullable();
            $table->char('nik_wali', length: 16)->nullable();

            $table->tinyInteger('id_pendidikan_ibu');
            $table->tinyInteger('id_pendidikan_ayah');
            $table->tinyInteger('id_pendidikan_wali');

            $table->tinyInteger('id_penghasilan_ibu');
            $table->tinyInteger('id_penghasilan_ayah');
            $table->tinyInteger('id_penghasilan_wali');

            $table->tinyInteger('id_pekerjaan_ibu');
            $table->tinyInteger('id_pekerjaan_ayah');
            $table->tinyInteger('id_pekerjaan_wali');


            # define foreign key constraints
            $table->foreign('id_prodi')->references('id')->on('prodi');
            $table->foreign('id_jenjang_pendidikan')->references('id')->on('jenjang_pendidikan');
            $table->foreign('id_agama')->references('id')->on('agama');
            $table->foreign('id_jenis_tinggal')->references('id')->on('jenis_tinggal');
            $table->foreign('id_transportasi')->references('id')->on('transportasi');
            $table->foreign('id_jenis_pendaftaran')->references('id')->on('jenis_pendaftaran');
            $table->foreign('id_jalur_pendaftaran')->references('id')->on('jalur_pendaftaran');
            $table->foreign('id_pembiayaan')->references('id')->on('pembiayaan');

            $table->foreign('id_pendidikan_ibu')->references('id')->on('pendidikan');
            $table->foreign('id_pendidikan_ayah')->references('id')->on('pendidikan');
            $table->foreign('id_pendidikan_wali')->references('id')->on('pendidikan');

            $table->foreign('id_penghasilan_ibu')->references('id')->on('penghasilan');
            $table->foreign('id_penghasilan_ayah')->references('id')->on('penghasilan');
            $table->foreign('id_penghasilan_wali')->references('id')->on('penghasilan');

            $table->foreign('id_pekerjaan_ibu')->references('id')->on('pekerjaan');
            $table->foreign('id_pekerjaan_ayah')->references('id')->on('pekerjaan');
            $table->foreign('id_pekerjaan_wali')->references('id')->on('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
