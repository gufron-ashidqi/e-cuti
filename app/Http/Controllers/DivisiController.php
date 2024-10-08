<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisi = Divisi::all();
        return view('divisi.index', compact('divisi'));
    }

    public function tambah()
    {
        return view('divisi.create');
    }

    public function tambah_proses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Divisi::create([
            'nama' => $request->nama
        ]);

        // return redirect('/divisi');
        return redirect('/divisi')->with('status', 'Data berhasil disimpan!');

    }

    public function edit($id)
    {
        $divisi = Divisi::find($id);
        dd($divisi);
    }

    public function hapus($id)
    {
        $divisi = Divisi::find($id);
        $divisi->delete();

        return redirect('/divisi')->with('status', 'Data berhasil dihapus!');
    }
}
