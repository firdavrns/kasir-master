<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    private $auth;
    private $valdation;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        $this->valdation = [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate($this->valdation);
        $dataExist = $this->auth->loginProcess($request);

        if ($dataExist) {
            return redirect()->route('dashboard.index');
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Masuk gagal.'
            ];

            session()->flash('pesan', $pesan);
            return redirect()->route('auth.login');
        }
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function registrationProcess(Request $request)
    {
        $this->valdation['nama'] = ['required'];
        $this->valdation['email'] = ['required', 'email', Rule::unique('pengguna')];
        $this->valdation['peran'] = ['required'];
        $request->validate($this->valdation);
        $dataExist = $this->auth->registrationProcess($request);

        if ($dataExist) {
            $pesan = [
                'status' => 'berhasil',
                'pesan' => 'Registrasi berhasil.'
            ];

            session()->flash('pesan', $pesan);
            return redirect()->route('auth.login');
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Registrasi gagal.'
            ];

            session()->flash('pesan', $pesan);
            return redirect()->route('auth.registration');
        }
    }

    public function logoutProcess()
    {
        session()->forget('user');
        return redirect()->route('auth.login');
    }
}
