<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GejalaController extends Controller
{
    public function addGejala() {
        $penyakit = Penyakit::all();
        return view('dashboard.gejala.add_gejala', [
            'penyakit' => $penyakit,
        ]);
    }
    
    public function createGejala(Request $request) {
        DB::beginTransaction();
        try {
            $request->validate([
                'penyakit_id' => 'required',
                'kode_gejala' => 'required',
                'nama_gejala' => 'required',
            ], [
                'penyakit_id.required' => 'Golongan Penyakit Harus Dipilih.',
                'kode_gejala.required' => 'Kode Gejala Harus Diisi.',
                'nama_gejala.required' => 'Gejala Harus Diisi.',
            ]);
            $gejala = Gejala::create([
                'penyakit_id' => $request->penyakit_id,
                'kode_gejala' => $request->kode_gejala,
                'nama_gejala' => $request->nama_gejala,
            ]);
            DB::commit();

            if($gejala) {
                return redirect()->route('dashboard.gejala')->with('success-create-gejala', 'Gejala Berhasil Ditambahkan.');
            }

            return back()->with('invalid-create-gejala', 'Gejala Gagal Ditambahkan, Mohon Ulangi Sekali Lagi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('server-error', 'Ada Kesalahan Dalam Sisi Server: ' . $th->getMessage());
        }
        
    }

    public function editGejala($gejalaId) {
        $gejala = Gejala::find($gejalaId);
        $penyakit = Penyakit::all();
        return view('dashboard.gejala.edit_gejala', [
            'gejala' => $gejala,
            'penyakit' => $penyakit,
        ]);
    }

    public function updateGejala(Request $request, $gejalaId) {
        DB::beginTransaction();
        try {
            $request->validate([
                'penyakit_id' => 'required',
                'kode_gejala' => 'required',
                'nama_gejala' => 'required',
            ], [
                'penyakit_id.required' => 'Golongan Penyakit Harus Dipilih.',
                'kode_gejala.required' => 'Kode Gejala Harus Dipilih.',
                'nama_gejala.required' => 'Gejala Harus Diisi.',
            ]);
            $gejala = Gejala::where('id', $gejalaId)->update([
                'penyakit_id' => $request->penyakit_id,
                'kode_gejala' => $request->kode_gejala,
                'nama_gejala' => $request->nama_gejala,
            ]);
            DB::commit();

            if($gejala) {
                return redirect()->route('dashboard.gejala')->with('success-edit-gejala', 'Gejala Berhasil Diubah.');
            }

            return back()->with('invalid-edit-gejala', 'Gejala Gagal Diubah, Mohon Ulangi Sekali Lagi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('server-error', 'Ada Kesalahan Dalam Sisi Server: ' . $th->getMessage());
        }
        
    }

    public function deleteGejala($gejalaId) {
        $penyakit = Gejala::find($gejalaId);
        $penyakit->delete();

        return redirect()->route('dashboard.gejala')->with('success-delete-gejala', 'Gejala Berhasil Dihapus.');
    }
}
