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
        Schema::create('pembayaran_iuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_iuran_id')->constrained('tagihan_iuran')->onDelete('cascade');
            $table->string('order_id')->unique();
            $table->integer('cicilan_ke');
            $table->decimal('nominal_bayar', 15, 2);
            $table->string('payment_method')->nullable();
            $table->enum('status',['pending','success','failed'])->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_iuran');
    }
};
