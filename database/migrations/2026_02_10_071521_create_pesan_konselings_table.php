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
        Schema::create('pesan_konselings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu', $precision = 0);
            $table->string('jenis_konseling', 50);
            $table->string('isi_pesan', 50);
            $table->enum('status', ['proses', 'selesai']);
            $table->foreignId('guru_bks_id');
            $table->foreignId('murids_id');
            $table->foreign('guru_bks_id')->references('id')->on('guru_bks')->cascadeOnUpdate();
            $table->foreign('murids_id')->references('id')->on('murids')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_konselings');
    }
};
