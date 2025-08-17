<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use Auth;

class RiwayatCutiController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $riwayat_cuti = PengajuanCuti::where('user_id', $userId)->get();
        return view('riwayat_cuti.index', compact('riwayat_cuti'));
        
    }
}
