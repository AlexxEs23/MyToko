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
        Schema::create('detailpenjualan', function (Blueprint $table) {
            $table->id('DetailID');
            $table->string('PenjualanID', 50);
            $table->integer('ProdukID');
            $table->integer('JumlahProduk');
            $table->decimal('Subtotal', 10, 2);
            $table->timestamps();

            // Menambahkan foreign key ke tabel penjualan
            $table->foreign('PenjualanID')
                  ->references('PenjualanID')
                  ->on('penjualan')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpenjualan');
    }
};