<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';
    protected $fillable = ['judul', 'isbn', 'kode_buku', 'no_panggil',
    'pengarang',
    'edisi',
    'penerbit',
    'kota_terbit',
    'tahun_terbit',
    'kolasi',
    'sumber_buku',
    'jumlah_buku',
    'lokasi',
    'kata_kunci',
    'ringkasan',
    'daftar_isi',
    'status_pinjam',
    'cover',
    'kondisi',
    'tingkat_kelas',
    'kategori',
    'harga_buku',
    'file_buku'];

    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
