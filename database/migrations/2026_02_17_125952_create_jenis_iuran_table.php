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
        Schema::create('jenis_iuran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('tipe',['sekali','bulanan','tahunan']);
            $table->decimal('nominal', 15, 2);
            $table->boolean('bisa_dicicil')->nullable();
            $table->integer('max_cicilan')->nullable();
            $table->enum('status',['aktif','nonaktif'])->default('aktif');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_iuran');
    }
};
