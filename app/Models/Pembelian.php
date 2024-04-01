<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{
    protected $table = 'penjualan';
    protected $detailTable = 'detail_penjualan';
    protected $produkTable = 'produk';
    protected $pelangganTable = 'pelanggan';

    public function getData()
    {
        $nomorNota = session('nomor_nota') ?? 0;
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
            ->where('nomor_nota', $nomorNota);

        return $query->get();
    }

    public function createData($request)
    {
        $nomorNota = $request->nomor_nota;
        $penjualan = DB::table($this->table)
            ->where('nomor_nota', $nomorNota)
            ->first();

        $tanggal = date('Y-m-d');
        $exploded = explode('_', $request->produk); //explode = memecah array
        $produkId = $exploded[0]; //1 = id
        $harga = (float) $exploded[1]; //6000 = 
        $jumlah = (int) $request->jumlah;
        $subtotal = $harga * $jumlah;
        $currentTotal = $penjualan->total ?? 0;
        $total = $currentTotal + $subtotal;

        if ($penjualan) {
            DB::table($this->table)
                ->where('nomor_nota', $nomorNota)
                ->update([
                    'total' => $total
                ]);

            DB::table($this->detailTable)
                ->insert([
                    'penjualan_id' => $penjualan->id,
                    'produk_id' => $produkId,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                ]);
        } else {
            $penjualanId = DB::table($this->table)
                ->insertGetId([
                    'tanggal' => $tanggal,
                    'nomor_nota' => $nomorNota,
                    'pelanggan_id' => 1,
                    'total' => $total,
                ]);

            DB::table($this->detailTable)
                ->insert([
                    'penjualan_id' => $penjualanId,
                    'produk_id' => $produkId,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                ]);
        }

        DB::table($this->produkTable)
            ->where('id', $produkId)
            ->decrement('stok', $jumlah);
    }
}
