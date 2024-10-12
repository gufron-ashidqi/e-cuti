<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use Illuminate\Http\Request;

class JenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisCuti = JenisCuti::all();
        return view('jenis-cuti.index', compact('jenisCuti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-cuti.create');
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
            'nama' => 'required',
        ]);

        JenisCuti::create([
            'nama' => $request->nama
        ]);
        return redirect('/jenis-cuti')->with('status', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisCuti  $jenisCuti
     * @return \Illuminate\Http\Response
     */
    public function show(JenisCuti $jenisCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisCuti  $jenisCuti
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisCuti $jenisCuti)
    {
        return view('jenis-cuti.edit', compact('jenisCuti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisCuti  $jenisCuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisCuti $jenisCuti)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $jenisCuti->update([
            'nama' => $request->nama
        ]);
        return redirect('jenis-cuti')->with('status', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisCuti  $jenisCuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisCuti $jenisCuti)
    {
        $jenisCuti->delete();

        return redirect('/jenis-cuti')->with('status', 'Data berhasil dihapus!');
    }
}
