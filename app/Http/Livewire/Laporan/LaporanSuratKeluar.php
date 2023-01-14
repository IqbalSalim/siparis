<?php

namespace App\Http\Livewire\Laporan;

use App\Models\SuratKeluar;
use Carbon\Carbon;
use Livewire\Component;

class LaporanSuratKeluar extends Component
{
    public $bulan_awal, $bulan_akhir, $tahun, $surat_keluar;

    public function mount()
    {
        $this->bulan_awal = Carbon::now()->month;
        $this->bulan_akhir = Carbon::now()->month;
        $this->tahun = Carbon::now()->year;
        $tanggal_awal = Carbon::now()->month($this->bulan_awal)->startOfMonth()->year($this->tahun)->format('Y-m-d');
        $tanggal_akhir = Carbon::now()->month($this->bulan_akhir)->endOfMonth()->year($this->tahun)->format('Y-m-d');
        $this->surat_keluar = SuratKeluar::whereBetween('tanggal_surat', [$tanggal_awal, $tanggal_akhir])->latest()->get();
    }

    public function render()
    {
        return view('livewire.laporan.laporan-surat-keluar');
    }

    public function filter()
    {
        $tanggal_awal = Carbon::now()->month($this->bulan_awal)->startOfMonth()->year($this->tahun)->format('Y-m-d');
        $tanggal_akhir = Carbon::now()->month($this->bulan_akhir)->endOfMonth()->year($this->tahun)->format('Y-m-d');
        $this->surat_keluar = SuratKeluar::whereBetween('tanggal_surat', [$tanggal_awal, $tanggal_akhir])->latest()->get();
        $this->render();
    }
}
