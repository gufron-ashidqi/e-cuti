<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PengajuanCuti;
use Auth;

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
        // dd($karyawan);
        return view('home', compact('karyawan', 'cuti'));
    }
}
