<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\transaksi;
use Illuminate\Support\Facades\Validator;   


class TransaksiController extends Controller
{
    
    public function index()
{
    $user = transaksi::all(['id', 'nama_barang', 'jumlah', 'total_harga','total_bayar','nama_pembeli','tanggal','link_gambar']); 

   
    return view('admintransaksi')->with('user', $user);
}
public function barangShow()
{
    $data = transaksi::all(['id', 'nama_barang', 'jumlah', 'total_harga','total_bayar','nama_pembeli','tanggal','link_gambar']); 

    return view('admin')->with('data', $data);
}

    
    
    public function store(Request $request)
    {
        $dataBarang = new transaksi;

        $rules=[
            'nama_barang'=>'required',
            'jumlah'=>'required',
            'total_harga'=>'required',
            'total_bayar'=>'required',
            'nama_pembeli'=>'required',
            'tanggal'=>'required',
            'link_gambar'=>'required'

        ];
        $validator =Validator::make($request->all(),$rules);
        if($validator->fails())
        { return response()->json([
            'status'=>true,
            'message'=>'Input Data Gagal',
            'data'=>$validator->errors()
           
        ]);

        }
        $dataBarang->nama_barang = $request->nama_barang;
        $dataBarang->jumlah = $request->jumlah;
        $dataBarang->total_harga = $request->total_harga;
        $dataBarang->total_bayar = $request->total_bayar;
        $dataBarang->nama_pembeli = $request->nama_pembeli;
        $dataBarang->tanggal = $request->tanggal;
        $dataBarang->link_gambar = $request->link_gambar;
        $submit= $dataBarang->save();

       
        $url = url("/api/admintransaksi");

        return redirect($url)->with([
            'status' => true,
            'message' => 'Create Berhasil ',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data =transaksi::find($id);
        if($data){
            
            return response()->json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$data

            ]

            );
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Data Tidak ditemukan',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBarang = transaksi::find($id);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ],404);
        }
    

        $rules=[
            'nama_barang'=>'required',
            'jumlah'=>'required',
            'total_harga'=>'required',
            'total_bayar'=>'required',
            'nama_pembeli'=>'required',
            'tanggal'=>'required',
            'link_gambar'=>'required'
        ];
        $validator =Validator::make($request->all(),$rules);
        if($validator->fails())
        { return response()->json([
            'status'=>true,
            'message'=>'Edit Data Gagal',
            'data'=>$validator->errors()
           
        ]);

        }
        $dataBarang->nama_barang = $request->nama_barang;
        $dataBarang->jumlah = $request->jumlah;
        $dataBarang->total_harga = $request->total_harga;
        $dataBarang->total_bayar = $request->total_bayar;
        $dataBarang->nama_pembeli = $request->nama_pembeli;
        $dataBarang->tanggal = $request->tanggal;
        $dataBarang->link_gambar = $request->link_gambar;
        $submit= $dataBarang->save();

      
        $url = url("/api/admintransaksi");

        return redirect($url)->with([
            'status' => true,
            'message' => 'Update Berhasil ',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataBarang = transaksi::find($id);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ],404);
        }

        $submit= $dataBarang->delete();

       
        $url = url("/api/admintransaksi");

        return redirect($url)->with([
            'status' => true,
            'message' => 'Delete Berhasil ',
        ]);
    }
}
