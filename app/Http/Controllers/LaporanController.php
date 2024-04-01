<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    private $laporan;
    private $valdation;
    private $bulan;

    public function __construct(Laporan $laporan)
    {
        $this->laporan = $laporan;
        $this->valdation = [
            'tahun' => ['required', 'numeric'],
            'bulan' => ['required', 'in:01,02,03,04,05,06,07,08,09,10,11,12']
        ];
        $this->bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
    }

    public function index()
    {
        $bulan = $this->bulan;
        return view('laporan.index', compact('bulan'));
    }

    public function process(Request $request)
    {
        $request->validate($this->valdation);
        $laporan = $this->laporan->getData($request);
        $data = [
            'bulan' => $this->bulan[$request->bulan],
            'tahun' => $request->tahun,
            'data' => $laporan,
            'jumlah' => $laporan->sum('jumlah'),
            'total' => $laporan->sum('subtotal')
        ];
        return view('laporan.process')->with($data);
    }
}
