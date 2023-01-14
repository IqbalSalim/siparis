<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <style>
        @page {
            margin: 0px 0px 0px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 8px 4px;
        }
    </style>

</head>

<body class="px-8">
    <div>
        <table style="width: 100%; padding: 4px 8px; border: none; padding-left: 20px; padding-right: 20px">
            <tr style="border: none; ">
                <td style="padding: 0px; width: 20%; border: none;">
                    {{-- <img style="width: 140px; padding: 0px;" src="{{ asset('images/logo.png') }}" alt=""> --}}
                </td>
                <td style="text-align: center; border: none; width: 60%; padding: 0px;">
                    <h1 class="text-sm font-medium">Kantor Notaris Dan PPAT</h1>
                    <h3>Laporan Surat Masuk</h3>
                    <p>Periode: {{ $nama_awal }} - {{ $nama_akhir . ' Tahun '. $tahun}}</p>
                </td>
                <td style="text-align: right; font-weight: 500; border: none; padding: 0px; width: 20%">
                    {{-- {{ $periode }} --}}
                </td>
            </tr>
        </table>


        <div style="padding: 0px 12px; padding-left: 20px; padding-right: 20px">
            @if (count($laporan) > 0)
            <table style="width: 100%; margin-top: 12px; border: 1px solid black; table-layout: ">
                <thead style="font-size: 12px; color: gray; text-transform: uppercase">
                    <tr>

                        <th scope="col" style="border: 1px solid black;" class="px-6 py-3 border border-slate-600 ">
                            No Agenda
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-600">
                            No Surat
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-600">
                            Tanggal Surat
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-600">
                            Tanggal Terima
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-600">
                            Asal Surat
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-600">
                            Perihal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $key => $row)
                    <tr style="font-size: 12px; text-align: center;"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td style="border: 1px solid black" class="px-6 py-4 border border-slate-600">
                            {{ $row['no_agenda'] }}
                        </td>
                        <td class="px-6 py-4 font-bold border border-slate-600">
                            {{ $row['no_surat'] }}
                        </td>
                        <td class="px-6 py-4 border border-slate-600">
                            {{ $row['tanggal_surat'] }}
                        </td>
                        <td class="px-6 py-4 border border-slate-600">
                            {{ $row['tanggal_terima'] }}
                        </td>
                        <td class="px-6 py-4 border border-slate-600">
                            {{ $row['asal_surat'] }}
                        </td>
                        <td class="px-6 py-4 border border-slate-600">
                            {{ $row['perihal'] }}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
            <p class="px-4 py-2 mt-2 text-2xl font-bold text-center text-red-500 animate-pulse">
                Data tidak ditemukan!
            </p>
            @endif
        </div>
    </div>



</body>

</html>