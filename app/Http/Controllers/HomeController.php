<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PengajuanCuti;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cuti = PengajuanCuti::where('karyawan_id', Auth::user()->karyawan_id)->first();
        $karyawan = User::where('karyawan_id', Auth::user()->karyawan_id)->first();
        $jumlah_karyawan = Karyawan::count();
        $pengajuan_diterima = PengajuanCuti::where('karyawan_id', Auth::user()->karyawan_id)->where('status', 'approved')->count();
        $pengajuan_pending = PengajuanCuti::where('karyawan_id', Auth::user()->karyawan_id)->where('status', 'pending')->count();
        $pengajuan_ditolak = PengajuanCuti::where('karyawan_id', Auth::user()->karyawan_id)->where('status', 'reject')->count();

        return view('home', compact('karyawan', 'cuti', 'pengajuan_diterima', 'pengajuan_pending', 'pengajuan_ditolak', 'jumlah_karyawan'));
    }
}
