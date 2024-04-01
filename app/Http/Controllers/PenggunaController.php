<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{
    private $pengguna;
    private $valdation;

    public function __construct(Pengguna $pengguna)
    {
        $this->pengguna = $pengguna;
        $this->valdation = [
            'nama' => ['required'],
            'email' => ['required', 'email', Rule::unique('pengguna')],
            'password' => ['required'],
            'peran' => ['required']
        ];
    }

    public function index()
    {
        $data = $this->pengguna->getData();
        return view('pengguna.index', compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate($this->valdation);
        $this->pengguna->createData($request);

        $pesan = [
            'status' => 'berhasil',
            'pesan' => 'Pengguna berhasil ditambahkan.'
        ];

        session()->flash('pesan', $pesan);
        return redirect()->route('pengguna.index');
    }

    public function edit($id)
    {
        $dataExist = $this->pengguna->checkData($id);

        if ($dataExist) {
            $data = $this->pengguna->editData($id);
            return view('pengguna.edit', compact('data'));
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Pengguna tidak ada.'
            ];

            session()->flash('pesan', $pesan);
            return redirect()->route('pengguna.index');
        }
    }

    public function update(Request $request)
    {
        $this->valdation['id'] = ['required'];
        $this->valdation['email'] = ['required', 'email'];
        $request->validate($this->valdation);
        $this->pengguna->updateData($request);

        $pesan = [
            'status' => 'berhasil',
            'pesan' => 'Pengguna berhasil diperbarui.'
        ];

        session()->flash('pesan', $pesan);
        return redirect()->route('pengguna.index');
    }

    public function delete($id)
    {
        $dataExist = $this->pengguna->checkData($id);

        if ($dataExist) {
            $this->pengguna->deleteData($id);
            $pesan = [
                'status' => 'berhasil',
                'pesan' => 'Pengguna berhasil dihapus.'
            ];
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Pengguna tidak ada.'
            ];
        }

        session()->flash('pesan', $pesan);
        return redirect()->route('pengguna.index');
    }
}
