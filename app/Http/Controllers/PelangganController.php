<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    private $pelanggan;
    private $valdation;

    public function __construct(Pelanggan $pelanggan)
    {
        $this->pelanggan = $pelanggan;
        $this->valdation = [
            'nama' => ['required'],
            'alamat' => ['required'],
            'nomor_telepon' => ['required']
        ];
    }

    public function index()
    {
        $data = $this->pelanggan->getData();
        return view('pelanggan.index', compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate($this->valdation);
        $this->pelanggan->createData($request);

        $pesan = [
            'status' => 'berhasil',
            'pesan' => 'Pelanggan berhasil ditambahkan.'
        ];

        session()->flash('pesan', $pesan);
        return redirect()->route('pelanggan.index');
    }

    public function edit($id)
    {
        $dataExist = $this->pelanggan->checkData($id);

        if ($dataExist) {
            $data = $this->pelanggan->editData($id);
            return view('pelanggan.edit', compact('data'));
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Pelanggan tidak ada.'
            ];

            session()->flash('pesan', $pesan);
            return redirect()->route('pelanggan.index');
        }
    }

    public function update(Request $request)
    {
        $this->valdation['id'] = ['required'];
        $request->validate($this->valdation);
        $this->pelanggan->updateData($request);

        $pesan = [
            'status' => 'berhasil',
            'pesan' => 'Pelanggan berhasil diperbarui.'
        ];

        session()->flash('pesan', $pesan);
        return redirect()->route('pelanggan.index');
    }

    public function delete($id)
    {
        $dataExist = $this->pelanggan->checkData($id);

        if ($dataExist) {
            $this->pelanggan->deleteData($id);
            $pesan = [
                'status' => 'berhasil',
                'pesan' => 'Pelanggan berhasil dihapus.'
            ];
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Pelanggan tidak ada.'
            ];
        }

        session()->flash('pesan', $pesan);
        return redirect()->route('pelanggan.index');
    }
}
