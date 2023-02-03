<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Arsip;
use Carbon\Carbon;
use Livewire\Component;

class LaporanPpat extends Component
{
    public $bulan_awal, $bulan_akhir, $tahun, $arsips;

    public function mount()
    {
        $this->bulan_awal = Carbon::now()->month;
        $this->bulan_akhir = Carbon::now()->month;
        $this->tahun = Carbon::now()->year;
        $tanggal_awal = Carbon::now()->month($this->bulan_awal)->startOfMonth()->year($this->tahun)->format('Y-m-d H:i:s');
        $tanggal_akhir = Carbon::now()->month($this->bulan_akhir)->endOfMonth()->year($this->tahun)->format('Y-m-d H:i:s');
        $this->arsips = Arsip::where('jenis', 'like', 'PPAT')->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->latest()->get();
    }

    public function render()
    {
        return view('livewire.laporan.laporan-ppat');
    }

    public function filter()
    {
        $tanggal_awal = Carbon::now()->month($this->bulan_awal)->startOfMonth()->year($this->tahun)->format('Y-m-d H:i:s');
        $tanggal_akhir = Carbon::now()->month($this->bulan_akhir)->endOfMonth()->year($this->tahun)->format('Y-m-d H:i:s');
        $this->arsips = Arsip::where('jenis', 'like', 'PPAT')->whereBetween('tanggal_akta', [$tanggal_awal, $tanggal_akhir])->latest()->get();
        $this->render();
    }
}
