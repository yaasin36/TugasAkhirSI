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
        Schema::create('tbl_tagihanBulanan', function (Blueprint $table) {
            $table->id('id_tB');
            $table->integer('id_user');
            $table->string('nama_tagihan');
            $table->date('awal_tagihan');
            $table->date('akhir_tagihan');
            $table->bigInteger('jumlah');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tagihanBulanan');
    }
};
