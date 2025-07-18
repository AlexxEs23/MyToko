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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('PenjualanID', 50)->primary();
            $table->decimal('TotalHarga', 10, 2);
            $table->string('NoNota')->unique();
            $table->unsignedInteger('PelangganID')->nullable();
            $table->timestamp('TanggalPenjualan')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
