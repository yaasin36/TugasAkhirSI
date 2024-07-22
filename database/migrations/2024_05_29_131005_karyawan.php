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
        //
        Schema::create('tbl_karyawans', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->integer('id_user');
            $table->string('nama');
            $table->string('npwp')->nullable();
            $table->string('posisi');
            $table->bigInteger('gaji');
            $table->integer('umur');
            $table->string('alamat');
            $table->string('kontak');
            $table->enum('bpjs', ['memiliki', 'tidak-memiliki']);
            $table->date('tgl_gajian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_karyawans');
    }
};
