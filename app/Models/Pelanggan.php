<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    public function getData()
    {
        $query = DB::table($this->table);

        return $query->get();
    }

    public function createData($request)
    {
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon
        ];

        DB::table($this->table)
            ->insert($data);
    }

    public function editData($id)
    {
        $query = DB::table($this->table)
            ->where('id', $id);

        return $query->first();
    }

    public function updateData($request)
    {
        $id = $request->id;
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon
        ];

        DB::table($this->table)
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function checkData($id)
    {
        $query = DB::table($this->table)
            ->where('id', $id);
        $data = $query->first();
        return isset($data);
    }
}
