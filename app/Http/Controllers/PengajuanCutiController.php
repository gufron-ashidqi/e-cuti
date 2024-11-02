<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use App\Models\User;
use App\Models\JenisCuti;
use Illuminate\Http\Request;
use Auth;

class PengajuanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan_cuti = PengajuanCuti::all();
        return view('pengajuan_cuti.index', compact('pengajuan_cuti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Auth::user()->karyawan;
        $nik = $karyawan->nik;
        $nama = $karyawan->nama;

        $jenis_cuti = JenisCuti::all();
        return view('pengajuan_cuti.create', compact('nik', 'nama', 'jenis_cuti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'keterangan' => 'required',
            'jenis_cuti_id' => 'required',
            
        ]);

        $karyawan = Auth::user()->karyawan;
        $karyawan_id = $karyawan->id;

        PengajuanCuti::create([
            'jenis_cuti_id' => $request->jenis_cuti_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'keterangan' => $request->keterangan,
            'karyawan_id' => $karyawan_id,
            'status' => 'pending',

        ]);
        return redirect('/pengajuan-cuti')->with('status', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengajuanCuti  $pengajuanCuti
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanCuti $pengajuanCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengajuanCuti  $pengajuanCuti
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanCuti $pengajuanCuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengajuanCuti  $pengajuanCuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanCuti $pengajuanCuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengajuanCuti  $pengajuanCuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengajuanCuti $pengajuanCuti)
    {
        //
    }
}
