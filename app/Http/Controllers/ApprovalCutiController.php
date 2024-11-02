<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use Illuminate\Http\Request;

class ApprovalCutiController extends Controller
{
    public function index()
    {
        $pengajuan_cuti = PengajuanCuti::where('status', 'pending')->get();
        // dd($pengajuan_cuti);
        return view('approval.index', compact('pengajuan_cuti'));
    }
}
