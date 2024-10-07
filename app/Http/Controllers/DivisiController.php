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
        Divisi::create([
            'nama' => $request->nama
        ]);

        return redirect('/divisi');

    }
}
