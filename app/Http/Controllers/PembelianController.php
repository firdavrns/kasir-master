<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Produk;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    private $pembelian;
    private $produk;
    private $pelanggan;
    private $valdation;

    public function __construct(Pembelian $pembelian, Produk $produk, Pelanggan $pelanggan)
    {
        $this->pembelian = $pembelian;
        $this->produk = $produk;
        $this->pelanggan = $pelanggan;
        $this->valdation = [
            'nomor_nota' => ['required'],
            'produk' => ['required'],
            'jumlah' => ['required', 'numeric']
        ];
    }

    public function index()
    {
        if (!session()->has('nomor_nota')) $this->regenerate();
        $data = $this->pembelian->getData(); //tampil data bawah
        $produkData = $this->produk->getData();
        $pelangganData = $this->pelanggan->getData();
        return view('pembelian.index', compact('data', 'produkData', 'pelangganData'));
    }

    public function regenerate()
    {
        $nomor_nota = 'KSR#' . preg_replace('/[^0-9]/', '', uniqid());
        session(['nomor_nota' => $nomor_nota]);
        return redirect()->route('pembelian.index');
    }

    public function create(Request $request)
    {
        $request->validate($this->valdation);
        $this->pembelian->createData($request);

        $pesan = [
            'status' => 'berhasil',
            'pesan' => 'Pembelian produk berhasil ditambahkan.'
        ];

        session()->flash('pesan', $pesan);
        return redirect()->route('pembelian.index');
    }
}
