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
        Schema::create('catatan_transaksi', function (Blueprint $table) {
            $table->increments("id");
            $table->string("nama_barang");
            $table->integer("jumlah");
            $table->integer("total_harga");
            $table->integer("total_bayar");
            $table->integer("kembali");
            $table->string("nama_pembeli");
            $table->string("tanggal");
            $table->text("link_gambar");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_transaksi');
    }
};
