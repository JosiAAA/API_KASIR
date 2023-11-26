<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table ="barang";
    protected $fillable =['nama','harga','jumlah','link_gambar'];
    public $timestamps = false;
}
