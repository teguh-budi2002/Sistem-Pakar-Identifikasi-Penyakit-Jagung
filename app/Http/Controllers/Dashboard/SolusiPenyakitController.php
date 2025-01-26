<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SolusiPenyakit;
use Illuminate\Http\Request;

class SolusiPenyakitController extends Controller
{
    public function createSolusiPenyakit(Request $request) {
        $validation = $request->validate([
            'id_penyakit' => 'required',
            'solusi_penyakit' => 'required',
        ], [
            'id_penyakit.required' => 'Jenis Penyakit Harus Dipilih.',
            'solusi_penyakit.required' => 'Solusi Penyakit Harus Diisi.',
        ]);

        $solusiPenyakit = SolusiPenyakit::create($validation);

        if($solusiPenyakit) {
            return redirect()->route('dashboard.solusi.index')->with('success-create-solusi', 'Solusi Penyakit Berhasil Ditambahkan.');
        }

        return back()->with('invalid-create-solusi', 'Solusi Penyakit Gagal Ditambahkan, Mohon Ulangi Sekali Lagi.');
    }
}
