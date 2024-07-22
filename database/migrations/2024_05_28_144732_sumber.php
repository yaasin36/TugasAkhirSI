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
        Schema::create('tbl_sumbers', function (Blueprint $table) {
            $table->id('id_sumber');
            $table->string('nama_sumber');
            $table->enum('tipe_sumber', ['pemasukan', 'pengeluaran'])->default('pemasukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_sumbers');
    }
};
