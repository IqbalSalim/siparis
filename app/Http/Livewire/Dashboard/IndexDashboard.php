<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Arsip;
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
            ->addColumn('Januari', $this->result[1], '#90cdf4')
            ->addColumn('Februari', $this->result[2], '#90cdf4')
            ->addColumn('Maret', $this->result[3], '#90cdf4')
            ->addColumn('April', $this->result[4], '#90cdf4')
            ->addColumn('Mei', $this->result[5], '#90cdf4')
            ->addColumn('Juni', $this->result[6], '#90cdf4')
            ->addColumn('Juli', $this->result[7], '#90cdf4')
            ->addColumn('Agustus', $this->result[8], '#90cdf4')
            ->addColumn('September', $this->result[9], '#90cdf4')
            ->addColumn('Oktober', $this->result[10], '#90cdf4')
            ->addColumn('November', $this->result[11], '#90cdf4')
            ->addColumn('Desember', $this->result[12], '#90cdf4')
            ->withoutLegend();

        for ($i = 1; $i <= 12; $i++) {
            $month = Carbon::now()->month($i)->format('m');
            $this->result[$i] = Arsip::where('jenis', 'NOTARIS')->whereMonth('tanggal_akta', $month)->whereYear('tanggal_akta', $this->tahunNotaris)->get()->count();
        }

        return view('livewire.dashboard.index-dashboard', ['notaris' => $notaris]);
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
