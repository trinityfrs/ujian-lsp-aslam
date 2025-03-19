<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'ceo'               => 'required|string|max:255',
            'nama_pengajar'     => 'required|string|max:255',
            'instansi_pengajar' => 'required|string|max:255',
            'tempat'            => 'required|string|max:255',
            'tanggal_sertifikat'=> 'required|date',
            'ttd_pimpinan'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ttd_pengajar'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Pastikan folder public/storage sudah ada
        if (!Storage::exists('public/ttd_pimpinan')) {
            Storage::makeDirectory('public/ttd_pimpinan');
        }
        if (!Storage::exists('public/ttd_pengajar')) {
            Storage::makeDirectory('public/ttd_pengajar');
        }

        // Simpan file ttd_pimpinan dan ttd_pengajar
        if ($request->hasFile('ttd_pimpinan') && $request->hasFile('ttd_pengajar')) {
            $ttdPimpinanPath = $request->file('ttd_pimpinan')->store('ttd_pimpinan', 'public');
            $ttdPengajarPath = $request->file('ttd_pengajar')->store('ttd_pengajar', 'public');
        } else {
            return redirect()->back()->withErrors(['msg' => 'File tanda tangan wajib diunggah']);
        }



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
