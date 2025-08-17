<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanCuti;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan_cuti = PengajuanCuti::all();
        return view('laporan.index', compact('laporan_cuti'));
    }
}
