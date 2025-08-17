<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Divisi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        // dd($karyawan);
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisi = Divisi::all();
        return view('karyawan.create', compact('divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'tanggal_masuk' => 'required',
            'divisi_id' => 'required',
            'telepon' => 'required'
        ]);

        $karyawan = Karyawan::create([
            // 'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_masuk' => $request->tanggal_masuk,
            'divisi_id' => $request->divisi_id,
            'telepon' => $request->telepon,
            'jumlah_cuti' => 12
        ]);

        // dd($karyawan);

        User::create([
            'karyawan_id' => $karyawan->id,
            'name' => $karyawan->nama,
            'email' => $karyawan->nik . '@gmail.com',
            'password' => Hash::make('user1234'),
            'role' => 4
        ]);

        alert()->success('Sukses','Data berhasil disimpan!');
        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $divisi = Divisi::all();
        return view('karyawan.edit', compact('karyawan', 'divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'tanggal_masuk' => 'required',
            'divisi_id' => 'required',
            'telepon' => 'required'
        ]);

        $karyawan->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_masuk' => $request->tanggal_masuk,
            'divisi_id' => $request->divisi_id,
            'telepon' => $request->telepon,
        ]);

        if ($karyawan->user) {
        $karyawan->user->update([
            'name' => $request->nama
        ]);
    }

        alert()->success('Sukses','Data berhasil disimpan!');
        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        alert()->success('Sukses','Data berhasil dihapus!');
        return redirect('/karyawan');
    }
}
