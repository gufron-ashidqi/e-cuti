<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Divisi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;

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
            'divisi_id' => 'required',
            'telepon' => 'required'
        ]);

        $karyawan = Karyawan::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'divisi_id' => $request->divisi_id,
            'telepon' => $request->telepon,
        ]);

        User::create([
            'name' => $karyawan->nama,
            'email' => $karyawan->nik . '@gmail.com',
            'password' => Hash::make('user1234'),
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //
    }
}
