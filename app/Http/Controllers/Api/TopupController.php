<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TopupController extends Controller
{
    public function topup(Request $request)
    {
        // Get the authenticated user's name
        $userName = auth()->user()->name;
    
        // Find the user by name
        $user = User::where('name', $userName)->first();
    
        // Validate the request
        $request->validate([
            'topup' => 'required|numeric|min:1|max:1000000000',
        ]);
    
        // Get the topup amount from the request
        $topup = $request->input('topup');
    
        // Update user's balance
        $user->saldo += $topup;
        $user->save();
    
        // You might want to return a JSON response instead of redirecting
        $namaa = auth()->user()->name;
        $url = url("/api/keranjang/{$namaa}");

    return redirect($url)->with([
        'status' => true,
        'message' => 'Barang Berhasil dihapus dari Keranjang',
    ]);
    }
}
