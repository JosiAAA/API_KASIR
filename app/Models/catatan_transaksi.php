<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catatan_transaksi extends Model
{
    use HasFactory;
    protected $table ="catatan_transaksi";
    
    protected $fillable =['nama_barang','jumlah','total_harga','total_bayar','kembali','nama_pembeli','tanggal','link_gambar'];
    public $timestamps = false;
}
