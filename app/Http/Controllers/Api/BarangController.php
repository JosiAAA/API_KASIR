<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;
use Illuminate\Support\Facades\Validator;   


class BarangController extends Controller
{
    
    public function index()
{
    $data = Barang::all(['id', 'nama', 'harga', 'jumlah','link_gambar']); 

    return response()->json([
        'status' => true,
        'message' => 'Data ditemukan',
        'data' => $data
    ], 200);
}
public function barangShow()
{
    $data = Barang::all(['id', 'nama', 'harga', 'jumlah','link_gambar']); 

    return view('admin')->with('data', $data);
}

    
    
    public function store(Request $request)
    {
        $dataBarang = new barang;

        $rules=[
            'nama'=>'required',
            'harga'=>'required',
            'jumlah'=>'required',
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
        $dataBarang->nama = $request->nama;
        $dataBarang->harga = $request->harga;
        $dataBarang->jumlah = $request->jumlah;
        $dataBarang->link_gambar = $request->link_gambar;
        $submit= $dataBarang->save();

       
        $url = url("/api/admin");

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
        $data =barang::find($id);
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
        $dataBarang = barang::find($id);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ],404);
        }
    

        $rules=[
            'nama'=>'required',
            'harga'=>'required',
            'jumlah'=>'required',
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
        $dataBarang->nama = $request->nama;
        $dataBarang->harga = $request->harga;
        $dataBarang->jumlah = $request->jumlah;
        $dataBarang->link_gambar = $request->link_gambar;
        $submit= $dataBarang->save();

      
        $url = url("/api/admin");

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
        $dataBarang = barang::find($id);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ],404);
        }

        $submit= $dataBarang->delete();

       
        $url = url("/api/admin");

        return redirect($url)->with([
            'status' => true,
            'message' => 'Delete Berhasil ',
        ]);
    }
}
