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
        Schema::create('table_galeris', function (Blueprint $table) {
                $table->id();
                $table->string('nama_galeri');
                $table->text('keterangan');
                $table->string('foto');
                $table->unsignedBigInteger('id_buku');
                $table->foreign('id_buku')->references('id')->on('bukus')->onDelete('cascade');
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
        Schema::dropIfExists('table_galeris');
    }
};
