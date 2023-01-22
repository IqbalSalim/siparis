<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Arsip;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;
use Livewire\Component;

class IndexDashboard extends Component
{
    public $tahunNotaris, $tahunPpat, $result = [];

    public function mount()
    {
        $this->tahunNotaris = Carbon::now()->format('Y');
        $this->tahunPpat = Carbon::now()->format('Y');
    }

    public function render()
    {
        for ($i = 1; $i <= 12; $i++) {
            $month = Carbon::now()->month($i)->format('m');
            $this->result[$i] = Arsip::where('jenis', 'NOTARIS')->whereMonth('tanggal_akta', $month)->whereYear('tanggal_akta', $this->tahunNotaris)->get()->count();
        }

        $notaris =
            (new ColumnChartModel())
            ->setTitle('Rekapan Arsip "NOTARIS"')
            ->addColumn('Januari', $this->result[1], '#5081e4')
            ->addColumn('Februari', $this->result[2], '#5081e4')
            ->addColumn('Maret', $this->result[3], '#5081e4')
            ->addColumn('April', $this->result[4], '#5081e4')
            ->addColumn('Mei', $this->result[5], '#5081e4')
            ->addColumn('Juni', $this->result[6], '#5081e4')
            ->addColumn('Juli', $this->result[7], '#5081e4')
            ->addColumn('Agustus', $this->result[8], '#5081e4')
            ->addColumn('September', $this->result[9], '#5081e4')
            ->addColumn('Oktober', $this->result[10], '#5081e4')
            ->addColumn('November', $this->result[11], '#5081e4')
            ->addColumn('Desember', $this->result[12], '#5081e4')
            ->withoutLegend();

        for ($i = 1; $i <= 12; $i++) {
            $month = Carbon::now()->month($i)->format('m');
            $this->result[$i] = Arsip::where('jenis', 'PPAT')->whereMonth('tanggal_akta', $month)->whereYear('tanggal_akta', $this->tahunPpat)->get()->count();
        }

        $ppat =
            (new ColumnChartModel())
            ->setTitle('Rekapan Arsip "PPAT"')
            ->addColumn('Januari', $this->result[1], '#39f178')
            ->addColumn('Februari', $this->result[2], '#39f178')
            ->addColumn('Maret', $this->result[3], '#39f178')
            ->addColumn('April', $this->result[4], '#39f178')
            ->addColumn('Mei', $this->result[5], '#39f178')
            ->addColumn('Juni', $this->result[6], '#39f178')
            ->addColumn('Juli', $this->result[7], '#39f178')
            ->addColumn('Agustus', $this->result[8], '#39f178')
            ->addColumn('September', $this->result[9], '#39f178')
            ->addColumn('Oktober', $this->result[10], '#39f178')
            ->addColumn('November', $this->result[11], '#39f178')
            ->addColumn('Desember', $this->result[12], '#39f178')
            ->withoutLegend();

        $jumlahNotaris = Arsip::where('jenis', 'NOTARIS')->get()->count();
        $jumlahPpat = Arsip::where('jenis', 'PPAT')->get()->count();
        $jumlahSuratMasuk = SuratMasuk::all()->count();
        $jumlahSuratKeluar = SuratKeluar::all()->count();

        return view('livewire.dashboard.index-dashboard', [
            'notaris' => $notaris,
            'ppat' => $ppat,
            'jumlahPpat' => $jumlahPpat,
            'jumlahNotaris' => $jumlahNotaris,
            'jumlahSuratMasuk' => $jumlahSuratMasuk,
            'jumlahSuratKeluar' => $jumlahSuratKeluar,
        ]);
    }

    public function notarisTahunChange()
    {
        for ($i = 1; $i <= 12; $i++) {
            $month = Carbon::now()->month($i)->format('m');
            $this->result[$i] = Arsip::where('jenis', 'NOTARIS')->whereMonth('tanggal_akta', $month)->whereYear('tanggal_akta', $this->tahunPpat)->get()->count();
        }
        $this->render();
    }
}
