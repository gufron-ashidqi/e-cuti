<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\JenisCuti;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

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
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'required',
            'jenis_cuti_id' => 'required',
        ]);

        $karyawan = Auth::user()->karyawan;
        $sisaCuti = $karyawan->sisa_cuti;

        // Hitung jumlah hari cuti yang diinginkan
        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalAkhir = Carbon::parse($request->tanggal_akhir);
        $jumlahHariCuti = $tanggalMulai->diffInDays($tanggalAkhir) + 1;

        // dd($jumlahHariCuti);

        // Validasi jika jumlah cuti yang diinginkan lebih dari sisa cuti atau sisa cuti = 0
        if ($sisaCuti <= 0) {
            alert()->error('Error','Sisa cuti Anda sudah habis.');
            return redirect()->back();
        }
    
        // Validasi jika jumlah cuti yang diinginkan lebih dari sisa cuti
        if ($jumlahHariCuti > $sisaCuti) {
            alert()->error('Error','Jumlah hari cuti yang diajukan melebihi sisa cuti yang tersedia.');
            return redirect()->back();
        }


        // Simpan pengajuan cuti jika validasi lolos
        PengajuanCuti::create([
            'jenis_cuti_id' => $request->jenis_cuti_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'keterangan' => $request->keterangan,
            'karyawan_id' => $karyawan->id,
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

    // public function approve(Request $request, $id)
    // {
    //     PengajuanCuti::find($id)->update([
    //         'status' => 'approved',

    //     ]);

    //     return redirect('/approval-cuti')->with('status', 'Data berhasil ubah!');
    // }

    public function approve(Request $request, $id)
    {
        // Temukan pengajuan cuti berdasarkan id
        $pengajuanCuti = PengajuanCuti::find($id);

        // Pastikan pengajuan cuti ditemukan
        if (!$pengajuanCuti) {
            return redirect('/approval-cuti')->with('status', 'Pengajuan cuti tidak ditemukan!');
        }

        // Update status pengajuan cuti ke 'approved'
        $pengajuanCuti->update([
            'status' => 'approved',
        ]);

        // Ambil jumlah hari cuti yang diambil
        $jumlahHariCuti = $pengajuanCuti->jumlah_hari_cuti;

        // Temukan karyawan berdasarkan karyawan_id di pengajuan cuti
        $karyawan = Karyawan::find($pengajuanCuti->karyawan_id);

        // Pastikan data karyawan ditemukan
        if ($karyawan) {
            // Kurangi sisa cuti karyawan dengan jumlah hari cuti yang diambil
            $karyawan->update([
                'jumlah_cuti' => $karyawan->jumlah_cuti - $jumlahHariCuti,
            ]);
        }

        return redirect('/approval-cuti')->with('status', 'Data berhasil diubah dan jumlah cuti diperbarui!');
    }

    public function reject($id)
    {
        PengajuanCuti::find($id)->update([
            'status' => 'reject',

        ]);

        return redirect('/approval-cuti')->with('status', 'Data berhasil ubah!');
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
