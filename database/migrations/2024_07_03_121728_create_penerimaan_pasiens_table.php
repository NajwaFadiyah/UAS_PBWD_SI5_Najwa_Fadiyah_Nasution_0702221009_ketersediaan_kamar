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
        Schema::create('penerimaan_pasien', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pasien')->unsigned();
            $table->integer('id_kamar')->unsigned();
            $table->datetime('tgl_masuk');
            $table->datetime('tgl_keluar')->nullable();
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('pasien');
            $table->foreign('id_kamar')->references('id')->on('kamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_pasien');
    }
};
