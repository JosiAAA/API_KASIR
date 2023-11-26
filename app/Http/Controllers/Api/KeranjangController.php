<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $nama)
{
    $keranjang = DB::table('transaksi')
        ->where('nama_pembeli', $nama)
        ->get();

    $history = DB::table('catatan_transaksi')
        ->where('nama_pembeli', $nama)
        ->get();

    return view('keranjang', [
        'keranjang' => $keranjang,
        'history' => $history,
    ]);
}

    /**
     * Display a listing of the resource for API.
     */
    public function apiIndex(Request $request, $nama)
    {
        $keranjang = DB::table('nama_tabel_keranjang')
            ->where('nama_pembeli', $nama)
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $keranjang
        ], 200);
    }

    public function store(Request $request)
    {
        $dataBarang = new Keranjang;
        $dataBarang->nama_barang = $request->nama_barang;
        $dataBarang->jumlah = $request->jumlah;
        $dataBarang->total_harga = $request->total_harga;
        $dataBarang->total_bayar = $request->total_bayar;
        $dataBarang->kembali = $request->kembali;
        $dataBarang->nama_pembeli = $request->nama_pembeli;
        $dataBarang->tanggal = $request->tanggal;
        $dataBarang->link_gambar = $request->link_gambar;
        $submit = $dataBarang->save();
        return response()->json([
            'status'=>true,
            'message'=>'Input Data Berhasil',
           
        ]);
        
}

public function destroy($id)
{
    $dataBarang = Keranjang::find($id);

    if (empty($dataBarang)) {
        return response()->json([
            'status' => true,
            'message' => 'Hapus Barang Gagal',
        ]);
    }

    $dataBarang->delete();
   
    $nama = auth()->user()->name;
    $url = url("/api/keranjang/{$nama}");

    return redirect($url)->with([
        'status' => true,
        'message' => 'Barang Berhasil dihapus dari Keranjang',
    ]);
}
}

