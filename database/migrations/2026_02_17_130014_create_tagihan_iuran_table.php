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
        Schema::create('tagihan_iuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->constrained('anggota')->onDelete('cascade');
            $table->foreignId('jenis_iuran_id')->constrained('jenis_iuran')->cascadeOnDelete();
            $table->decimal('total_nominal', 15, 2);
            $table->integer('total_cicilan')->default(1);
            $table->enum('status',['belum_lunas','lunas'])->default('belum_lunas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan_iuran');
    }
};
