<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('main.auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $userLogin = User::with('role:id,role_name')->whereUsername($request->username)->first();

        if(Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            
            if ($userLogin->role->role_name === 'Admin') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->with('invalid-login', 'Login Gagal, Akun Tidak Ditemukan.');

    }
}
