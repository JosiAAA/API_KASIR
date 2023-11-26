<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\User;
use Illuminate\Support\Facades\Validator;   


class UserController extends Controller
{
    
    public function index()
{
    $user = User::all(['id', 'name', 'email', 'role','saldo','password']); 

   
    return view('adminuser')->with('user', $user);
}
public function barangShow()
{
    $data = Barang::all(['id', 'nama', 'harga', 'jumlah','link_gambar']); 

    return view('admin')->with('data', $data);
}

    
    
    public function store(Request $request)
    {
        $dataBarang = new User;

        $rules=[
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
            'saldo'=>'required',
            'password'=>'required'

        ];
        $validator =Validator::make($request->all(),$rules);
        if($validator->fails())
        { return response()->json([
            'status'=>true,
            'message'=>'Input Data Gagal',
            'data'=>$validator->errors()
           
        ]);

        }
        $dataBarang->name = $request->name;
        $dataBarang->email = $request->email;
        $dataBarang->role = $request->role;
        $dataBarang->saldo = $request->saldo;
        $dataBarang->password = $request->password;
        $submit= $dataBarang->save();

       
        $url = url("/api/adminuser");

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
        $data =User::find($id);
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
        $dataBarang = User::find($id);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ],404);
        }
    

        $rules=[
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
            'saldo'=>'required',
            'password'=>'required'
        ];
        $validator =Validator::make($request->all(),$rules);
        if($validator->fails())
        { return response()->json([
            'status'=>true,
            'message'=>'Edit Data Gagal',
            'data'=>$validator->errors()
           
        ]);

        }
        $dataBarang->name = $request->name;
        $dataBarang->email = $request->email;
        $dataBarang->role = $request->role;
        $dataBarang->saldo = $request->saldo;
        $dataBarang->password = $request->password;
        $submit= $dataBarang->save();

      
        $url = url("/api/adminuser");

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
        $dataBarang = User::find($id);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ],404);
        }

        $submit= $dataBarang->delete();

       
        $url = url("/api/adminuser");

        return redirect($url)->with([
            'status' => true,
            'message' => 'Delete Berhasil ',
        ]);
    }
}
