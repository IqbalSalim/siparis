<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class CetakLaporanNotaris extends Controller
{

    public function index($bulan_awal, $bulan_akhir, $tahun)
    {
        // retreive all records from db
        $tanggal_awal = Carbon::now()->month($bulan_awal)->startOfMonth()->year($tahun)->format('Y-m-d H:i:s');
        $tanggal_akhir = Carbon::now()->month($bulan_akhir)->endOfMonth()->year($tahun)->format('Y-m-d H:i:s');

        $nama_awal = Carbon::now()->month($bulan_awal)->startOfMonth()->year($tahun)->format('F');
        $nama_akhir = Carbon::now()->month($bulan_awal)->startOfMonth()->year($tahun)->format('F');

        $laporan = Arsip::where('jenis', 'like', 'NOTARIS')->whereBetween('tanggal_akta', [$tanggal_awal, $tanggal_akhir])->latest()->get()->toArray();
        // share data to view
        $data = [
            'laporan' => $laporan,
            'nama_awal' => $nama_awal,
            'nama_akhir' => $nama_akhir,
            'tahun' => $tahun,
        ];
        $pdf = PDF::loadView('cetak.notaris', $data)->setPaper('A4', 'potrait');
        // download PDF file with download method
        return $pdf->download('Laporan Notaris Periode ' . $nama_awal . ' - ' . $nama_akhir . ' ' . $tahun . '.pdf');
    }
}
