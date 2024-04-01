<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $riwayat;
    private $produk;

    public function __construct(Riwayat $riwayat, Produk $produk)
    {
        $this->riwayat = $riwayat;
        $this->produk = $produk;
    }

    public function index()
    {
        $stok = $this->produk->getData()->sum('stok');
        $total = $this->riwayat->getData()->sum('subtotal');
        return view('dashboard.index', compact('stok', 'total'));
    }
}
