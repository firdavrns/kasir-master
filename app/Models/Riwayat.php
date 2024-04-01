<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Riwayat extends Model
{
    protected $table = 'penjualan';
    protected $detailTable = 'detail_penjualan';
    protected $produkTable = 'produk';
    protected $pelangganTable = 'pelanggan';

    public function getData()
    {
        $query = DB::table($this->detailTable . ' AS d')
            ->select(
                'd.id',
                'j.nomor_nota',
                'j.tanggal',
                'p.nama AS nama_produk',
                'e.nama AS nama_pelanggan',
                'p.harga',
                'd.jumlah',
                'd.subtotal'
            )
            ->join($this->table . ' AS j', 'j.id', 'd.penjualan_id')
            ->join($this->produkTable . ' AS p', 'p.id', 'd.produk_id')
            ->leftJoin($this->pelangganTable . ' AS e', 'e.id', 'j.pelanggan_id')
            ->orderByDesc('j.tanggal')
            ->orderBy('j.nomor_nota');

        return $query->get();
    }
}
