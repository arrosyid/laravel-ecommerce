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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->constrained('kategoris');
            $table->string('kode_produk')->unique();
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 15, 2);
            $table->integer('stok');
            $table->string('satuan');
            $table->text('gambar')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
