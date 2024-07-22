<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_kredits', function (Blueprint $table) {
            $table->id('id_kredit');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_kredit');
            $table->date('awal_kredit');
            $table->integer('tenor');
            $table->date('akhir_kredit');
            $table->decimal('jumlah', 15, 2); // Use decimal for currency values
            $table->string('status');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kredits');
    }
};
