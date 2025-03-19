<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUser extends Controller
{

    public function index()
    {
        return view('user.home');
    }
    
    public function searchSertifikat(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        session(['nama_peserta' => $request->nama]);

        // dd([session('nama_peserta')]);
        
        return redirect()->route('user.sertifikat')->with('success', 'Sertifikat peserta berhasil ditemukan.');
    }


}
