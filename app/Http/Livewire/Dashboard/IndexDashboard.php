<?php

namespace App\Http\Livewire\Dashboard;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class IndexDashboard extends Component
{
    public function render()
    {
        $columnChartModel =
            (new ColumnChartModel())
            ->setTitle('Expenses by Type')
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4');

        return view('livewire.dashboard.index-dashboard', ['columnChartModel' => $columnChartModel]);
    }
}
