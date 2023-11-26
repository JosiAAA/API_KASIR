<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catatan_transaksi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $nama)
    {
        $history = DB::table('catatan_transaksi')
            ->where('nama_pembeli', $nama)
            ->get();    

        return view('keranjang', ['history' => $history]);
    }

    /**
     * Display a listing of the resource for API.
     */
  
     public function store(Request $request)
     {
         $nama = auth()->user()->name;
         $user = User::where('name', $nama)->first();
     
         foreach ($request->keranjang as $item) {
             // Check if the jumlah is greater than 0 before processing the purchase
             if ($item['jumlah'] > 0) {
                 // Update jumlah in the catatan_transaksi table
                 $dataBarang = new catatan_transaksi();
                 $dataBarang->nama_barang = $item['nama_barang'];
                 $dataBarang->jumlah = $item['jumlah'];
                 $dataBarang->total_harga = $item['total_harga'];
                 $dataBarang->total_bayar = $item['total_bayar'];
                 $dataBarang->kembali = $item['kembali'];
                 $dataBarang->nama_pembeli = $item['nama_pembeli'];
                 $dataBarang->tanggal = $item['tanggal'];
                 $dataBarang->link_gambar = $item['link_gambar'];
                
                 
                 // Set other properties as needed
     
                 $submit = $dataBarang->save();
     
                 // Update the jumlah in the list_donasi table
                 $user->saldo -= $item['total_harga'];
                 $user->save();
                
             } else {
                 // Handle the case where jumlah is 0
                 // You might want to redirect with an error message or take other actions
                 return redirect()->back()->with('error', 'Jumlah item tidak mencukupi');
             }
         }
     
         $url = url("/api/keranjang/{$nama}");
     
         return redirect($url)->with([
             'status' => true,
             'message' => 'Pembelian berhasil dilakukan',
         ]);
     }
     
     

}

