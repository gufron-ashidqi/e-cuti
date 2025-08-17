<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\PengajuanCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalCutiController extends Controller
{
    public function index()
    {
        $pengajuan_cuti = PengajuanCuti::where('status', 'pending')->get();
        return view('approval.index', compact('pengajuan_cuti'));
    }

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
            'approve_by' => Auth::user()->name
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
}
