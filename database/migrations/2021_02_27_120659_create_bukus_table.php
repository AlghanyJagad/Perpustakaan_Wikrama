<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('isbn', 25)->nullable();
            $table->string('kode_buku')->nullable();
            $table->string('no_panggil')->nullable();
            $table->string('pengarang')->nullable();
            $table->string('edisi')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('kota_terbit')->nullable();
            $table->integer('tahun_terbit')->nullable();
            $table->string('kolasi')->nullable();
            $table->string('sumber_buku')->nullable();
            $table->integer('jumlah_buku');
            $table->string('lokasi')->nullable();
            $table->string('kata_kunci')->nullable();
            $table->text('ringkasan')->nullable();
            $table->text('daftar_isi')->nullable();
            $table->enum('status_pinjam', ['boleh', 'tidak'])->nullable();
            $table->string('cover')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('tingkat_kelas')->nullable();
            $table->string('kategori')->nullable();
            $table->string('harga_buku')->nullable();
            $table->string('file_buku')->nullable();
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
        Schema::dropIfExists('bukus');
    }
}
