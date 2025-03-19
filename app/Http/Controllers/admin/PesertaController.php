<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesertaController extends Controller
{
    public function index()
    {
        return view('admin.form-peserta');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:pesertas,nama',
            'no_sertif' => 'required|min:8|max:10',
            'tema_pelatihan' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambah.peserta')
                ->withInput()
                ->withErrors($validator);
        }

        Peserta::create([
            'nama' => $request->nama,
            'no_sertif' => $request->no_sertif,
            'tema_pelatihan' => $request->tema_pelatihan,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Peserta Berhasil Ditambahkan');
    }

}
