<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_cuti';
    protected $guarded = [];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function jenis_cuti()
    {
        return $this->belongsTo(JenisCuti::class);
    }

    public function getJumlahHariCutiAttribute()
    {
        // Cek jika status pengajuan cuti bukan "pending"
        $tanggalMulai = Carbon::parse($this->tanggal_mulai);
        $tanggalAkhir = Carbon::parse($this->tanggal_akhir);

        return $tanggalMulai->diffInDays($tanggalAkhir) + 1; // +1 agar termasuk hari pertama
    }

    public function getJumlahHariCutiPendingAttribute()
    {
        if ($this->status !== 'pending') {
            // Cek jika status pengajuan cuti bukan "pending"
            $tanggalMulai = Carbon::parse($this->tanggal_mulai);
            $tanggalAkhir = Carbon::parse($this->tanggal_akhir);
    
            return $tanggalMulai->diffInDays($tanggalAkhir) + 1; // +1 agar termasuk hari pertama
        } else {
            // Jika status adalah "pendinzg", kembalikan nilai null atau 0
            return null; // atau 0, sesuai kebutuhan
        }
    }

    public function getJumlahHariCutiRejectAttribute()
    {
        if ($this->status !== 'reject') {
            // Jika status adalah "rejct", kembalikan nilai null atau 0
            return null; // atau 0, sesuai kebutuhan
        } else {
            // Cek jika status pengajuan cuti bukan "pending"
            $tanggalMulai = Carbon::parse($this->tanggal_mulai);
            $tanggalAkhir = Carbon::parse($this->tanggal_akhir);
    
            return $tanggalMulai->diffInDays($tanggalAkhir) + 1; // +1 agar termasuk hari pertama
        }
    }
    
}
