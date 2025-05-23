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
        Schema::create('detail_kriteria', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('kriteria_id')->index();
            $table->unsignedBigInteger('penetapan_id')->index();
            $table->unsignedBigInteger('pelaksanaan_id')->index();
            $table->unsignedBigInteger('evaluasi_id')->index();
            $table->unsignedBigInteger('pengendalian_id')->index();
            $table->unsignedBigInteger('peningkatan_id')->index();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('kriteria_id')->references('kriteria_id')->on('kriteria');
            $table->foreign('penetapan_id')->references('penetapan_id')->on('penetapan');
            $table->foreign('pelaksanaan_id')->references('pelaksanaan_id')->on('pelaksanaan');
            $table->foreign('evaluasi_id')->references('evaluasi_id')->on('evaluasi');
            $table->foreign('pengendalian_id')->references('pengendalian_id')->on('pengendalian');
            $table->foreign('peningkatan_id')->references('peningkatan_id')->on('peningkatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kriteria');
    }
};
