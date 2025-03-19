<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.form-setting');
    }

    public function save(Request $request)
    {
        // Validasi Input
        $validator = Validator::make($request->all(), [
            'ceo'               => 'require|string|max:255',
            'nama_pengajar'     => 'require|string|max:255',
            'instansi_pengajar' => 'require|string|max:255',
            'tempat'            => 'require|string|max:255',    
            'tanggal_sertifikat'=> 'require|date',
            'ttd_pimpinan'      => 'require|image|mimes:jpeg,png,jpg|max:2048',
            'ttd_pengajar'      => 'require|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan file ttd_pimpinan
        $ttdPimpinanPath = $request->file('ttd_pimpinan')->store('ttd_pimpinan', 'public');

        // Simpan file ttd_pengajar (bisa kosong)
        $ttdPengajarPath = $request->file('ttd_pengajar')
            ? $request->file('ttd_pengajar')->store('ttd_pengajar', 'public')
            : null;

        // Simpan ke database
        Setting::create([
            'ceo'               => $request->ceo,
            'nama_pengajar'     => $request->nama_pengajar,
            'instansi_pengajar' => $request->instansi_pengajar,
            'tempat'            => $request->tempat,
            'tanggal_sertifikat'=> $request->tanggal_sertifikat,
            'ttd_pimpinan'      => $ttdPimpinanPath,
            'ttd_pengajar'      => $ttdPengajarPath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Sertifikat berhasil disimpan');
    }

}
