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
        return redirect('/divisi')->with('status', 'Data berhasil disimpan!');

    }

    public function edit($id)
    {
        $divisi = Divisi::find($id);
        return view('divisi.edit', compact('divisi'));
    }

    public function edit_proses(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Divisi::find($id)->update([
            'nama' => $request->nama
        ]);
        return redirect('divisi')->with('status', 'Data berhasil diupdate!');
    }

    public function hapus($id)
    {
        $divisi = Divisi::find($id);
        $divisi->delete();

        return redirect('/divisi')->with('status', 'Data berhasil dihapus!');
    }
}
