<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('main.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|confirmed',
            'gender' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'fullname.required' => 'Nama lengkap tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'role_user_id' => 2,
                'username' => $request->username,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => $request->password,
                'gender' => $request->gender
            ]);
            DB::commit();

            if($user) {
                return redirect()->route('login.index')->with('register-success', 'Registrasi Berhasil, Silahkan Login.');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage());
            return back()->with('server-error', 'Registrasi Gagal, Ada Kesalahan Pada Sisi Server.');
        }


    }
}
