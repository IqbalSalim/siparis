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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->string('nama_1');
            $table->string('nama_2');
            $table->string('judul_akta');
            $table->string('no_akta')->unique();
            $table->date('tanggal_akta');
            $table->string('jenis');
            $table->string('file_cover');
            $table->string('file_isi');
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
        Schema::dropIfExists('arsips');
    }
};
