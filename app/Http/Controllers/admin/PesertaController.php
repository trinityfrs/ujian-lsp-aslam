<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesertaController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.form-peserta', compact('settings'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:pesertas,nama',
            'no_sertif' => 'required|min:8|max:10',
            'tema_pelatihan' => 'required',
            'setting_id' => 'required|exists:settings,id'
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
            'setting_id' => $request->setting_id,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Peserta Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $settings = Setting::all();
        return view('admin.edit-peserta', compact(['peserta', 'settings']));
    }

    public function savechanges(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_sertif' => 'required|min:8|max:10',
            'tema_pelatihan' => 'required',
            'setting_id' => 'required|exists:settings,id'
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambah.peserta')
                ->withInput()
                ->withErrors($validator);
        }

        Peserta::where('id', $id)->update([
            'nama' => $request->nama,
            'no_sertif' => $request->no_sertif,
            'tema_pelatihan' => $request->tema_pelatihan,
            'setting_id' => $request->setting_id,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Peserta Berhasil Ditambahkan');
    }

    public function delete($id)
    {
        Peserta::where('id', $id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Peserta Berhasil Dihapus');
    }
}
