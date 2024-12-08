<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use App\Models\SolusiPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyakitController extends Controller
{
    public function addPenyakit() {
        return view('dashboard.penyakit.add_penyakit');
    }
    
    public function createPenyakit(Request $request) {

        DB::beginTransaction();
        try {
            $validation = $request->validate([
                'nama_penyakit' => 'required',
                'deskripsi' => 'nullable|string',
            ], [
                'nama_penyakit.required' => 'Nama Penyakit Harus Diisi.',
            ]);
    
            $penyakit = Penyakit::create($validation);
            DB::commit();

            if($penyakit) {
                return redirect()->route('dashboard.penyakit')->with('success-create-penyakit', 'Penyakit Berhasil Ditambahkan.');
            }
    
            return back()->with('invalid-create-penyakit', 'Penyakit Gagal Ditambahkan, Mohon Ulangi Sekali Lagi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('server-error', 'Ada Kesalahan Dalam Sisi Server: ' . $th->getMessage());
        }
    }

    public function editPenyakit($penyakitId) {
        $penyakit = Penyakit::find($penyakitId);
        return view('dashboard.penyakit.edit_penyakit', [
            'penyakit' => $penyakit,
        ]);
    }

    public function updatePenyakit(Request $request, $penyakitId) {

        DB::beginTransaction();
        try {
            $validation = $request->validate([
                'nama_penyakit' => 'required',
                'deskripsi' => 'nullable|string',
            ], [
                'nama_penyakit.required' => 'Nama Penyakit Harus Diisi.',
            ]);
    
            $penyakit = Penyakit::where('id', $penyakitId)->update($validation);
            DB::commit();

            if($penyakit) {
                return redirect()->route('dashboard.penyakit')->with('success-edit-penyakit', 'Penyakit Berhasil Diubah.');
            }
    
            return back()->with('invalid-edit-penyakit', 'Penyakit Gagal Diubah, Mohon Ulangi Sekali Lagi.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('server-error', 'Ada Kesalahan Dalam Sisi Server: ' . $th->getMessage());
        }
    }

    public function deletePenyakit($penyakitId) {
        $penyakit = Penyakit::find($penyakitId);
        $penyakit->delete();

        return redirect()->route('dashboard.penyakit')->with('success-delete-penyakit', 'Penyakit Berhasil Dihapus.');
    }

    public function addPenyakitSolution($penyakitId) {
        $penyakit = Penyakit::findOrFail($penyakitId);
        $solusi_penyakit = SolusiPenyakit::where('penyakit_id', $penyakitId)->first();

        return view('dashboard.penyakit.add_penyakit_solution', [
            'penyakit' => $penyakit,
            'solusi_penyakit' => $solusi_penyakit,
        ]);
    }

    public function addPenyakitSolutionProcess($penyakitId) {
        DB::beginTransaction();
        try {
            $validation = request()->validate([
                'solusi_penyakit' => 'required|string',
            ], [
                'solusi_penyakit.required' => 'Solusi Penyakit Harus Diisi.',
            ]);

            SolusiPenyakit::updateOrCreate([
                'penyakit_id' => $penyakitId,
            ], $validation);
            DB::commit();

            return redirect()->route('dashboard.penyakit')->with('success-add-solution', 'Solusi Penyakit Berhasil Ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('server-error', 'Ada Kesalahan Dalam Sisi Server: ' . $th->getMessage());
        }
    }
}
