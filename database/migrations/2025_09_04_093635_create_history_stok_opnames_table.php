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
        Schema::create('history_stok_opnames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produk')->constrained('produks');
            $table->integer('stok_awal');
            $table->integer('stok_akhir');
            $table->integer('perubahan');
            $table->text('keterangan')->nullable();
            $table->datetime('tanggal');
            $table->foreignId('id_user')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_stok_opnames');
    }
};
