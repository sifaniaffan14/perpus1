<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kategori_buku_id')->references('id')->on('kategori_bukus')->nullable();
        $table->boolean('is_active')->default('1');
        $table->string('NoPanggil')->nullable()->unique();
        $table->string('judul')->nullable();
        $table->string('penerbit')->nullable();
        $table->string('pengarang')->nullable();
        $table->string('halaman')->nullable();
        $table->string('jumlah')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
