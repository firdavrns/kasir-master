<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    private $produk;
    private $valdation;

    public function __construct(Produk $produk)
    {
        $this->produk = $produk;
        $this->valdation = [
            'nama' => ['required'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric']
        ];
    }

    public function index()
    {
        $data = $this->produk->getData();
        return view('produk.index', compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate($this->valdation);
        $this->produk->createData($request);

        $pesan = [
            'status' => 'berhasil',
            'pesan' => 'Produk berhasil ditambahkan.'
        ];

        session()->flash('pesan', $pesan);
        return redirect()->route('produk.index');
    }

    public function edit($id)
    {
        $dataExist = $this->produk->checkData($id);

        if ($dataExist) {
            $data = $this->produk->editData($id);
            return view('produk.edit', compact('data'));
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Produk tidak ada.'
            ];

            session()->flash('pesan', $pesan);
            return redirect()->route('produk.index');
        }
    }

    public function update(Request $request)
    {
        $this->valdation['id'] = ['required'];
        $request->validate($this->valdation);
        $this->produk->updateData($request);

        $pesan = [
            'status' => 'berhasil',
            'pesan' => 'Produk berhasil diperbarui.'
        ];

        session()->flash('pesan', $pesan);
        return redirect()->route('produk.index');
    }

    public function delete($id)
    {
        $dataExist = $this->produk->checkData($id);

        if ($dataExist) {
            $this->produk->deleteData($id);
            $pesan = [
                'status' => 'berhasil',
                'pesan' => 'Produk berhasil dihapus.'
            ];
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Produk tidak ada.'
            ];
        }

        session()->flash('pesan', $pesan);
        return redirect()->route('produk.index');
    }
}
