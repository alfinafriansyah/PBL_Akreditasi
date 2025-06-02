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
        Schema::create('penetapan', function (Blueprint $table) {
            $table->id('penetapan_id');
            $table->unsignedBigInteger('kriteria_id')->index();
            $table->text('penetapan');
            $table->text('dokumen')->nullable();
            $table->timestamps();

            $table->foreign('kriteria_id')->references('kriteria_id')->on('kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penetapan');
    }
};
