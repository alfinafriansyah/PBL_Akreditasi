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
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id('kriteria_id');
            $table->string('kriteria_kode', 20)->unique();
            $table->string('kriteria_nama', 255);
            $table->unsignedBigInteger('status_id')->index();
            $table->text('komentar')->nullable();
            $table->timestamps();

            $table->foreign('status_id')->references('status_id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria');
    }
};
