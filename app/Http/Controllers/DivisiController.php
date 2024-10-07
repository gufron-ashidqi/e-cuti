<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        return view('divisi.index');
    }

    public function tambah()
    {
        return view('divisi.create');
    }

    public function tambah_proses(Request $request)
    {
        // dd($request);

        Divisi::create([
            'nama' => $request->nama
        ]);

        return redirect('/divisi');

    }
}
