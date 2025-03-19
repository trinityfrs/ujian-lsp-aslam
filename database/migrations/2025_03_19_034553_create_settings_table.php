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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('ceo');
            $table->string('nama_pengajar');
            $table->string('instansi_pengajar');
            $table->string('tempat');
            $table->date('tanggal_sertifikat'); // Gunakan `date` agar sesuai dengan data tanggal
            $table->text('ttd_pimpinan');
            $table->text('ttd_pengajar')->nullable(); // Tambahkan `nullable()`
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
