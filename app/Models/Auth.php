<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Auth extends Model
{
    protected $table = 'pengguna';

    public function loginProcess($request)
    {
        $data = DB::table($this->table)
            ->where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if ($data) {
            session(['user' => $data]);
            return true;
        } else {
            return false;
        }
    }

    public function registrationProcess($request)
    {
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => md5($request->password),
            'peran' => $request->peran
        ];

        DB::table($this->table)
            ->insert($data);
    }
}
