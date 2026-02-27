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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengeluaran');
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnDelete();
            $table->decimal('nominal', 15, 2);
            $table->date('tanggal');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('lampiran');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
