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
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('dosen_id')->index();
            $table->unsignedBigInteger('role_id')->index();
            $table->string('username', 100)->unique();
            $table->string('password', 255);
            $table->timestamps();

            $table->foreign('dosen_id')->references('dosen_id')->on('data_dosen');
            $table->foreign('role_id')->references('role_id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
