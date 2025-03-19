<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function index()
    {
        $pesertas = Peserta::all();
        return view('admin.dashboar-admin', compact('pesertas'));
    }
}
