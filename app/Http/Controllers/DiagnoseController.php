<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RiwayatHasilDiagnosa;
use App\Services\NaiveBayes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DiagnoseController extends Controller
{
    protected $getGejalaWithPenyakit;
    protected $totalDiagnosePerUser;
    protected $mostFrequentDiagnose;

    public function __construct() {
        $this->getGejalaWithPenyakit = Gejala::with('penyakit')
                                        ->selectRaw('MIN(id) as id, MIN(penyakit_id) as penyakit_id, kode_gejala, MIN(nama_gejala) as nama_gejala')
                                        ->groupBy('kode_gejala')
                                        ->get();
        
        $this->totalDiagnosePerUser = RiwayatHasilDiagnosa::where('user_id', Auth::user()->id)->count();
        
        $this->mostFrequentDiagnose = RiwayatHasilDiagnosa::where('user_id', Auth::user()->id)
                                                    ->select('hasil_penyakit', DB::raw('count(hasil_penyakit) as count'))
                                                    ->groupBy('hasil_penyakit')
                                                    ->orderByDesc('count')
                                                    ->first();
    }
    
    public function index() {
        return view('main.diagnose', [
            'gejala' => $this->getGejalaWithPenyakit,
            'totalDiagnosePerUser' => $this->totalDiagnosePerUser,
            'mostFrequentDiagnose' => $this->mostFrequentDiagnose
        ]);
    }

    public function diagnose(Request $request) {
        DB::beginTransaction();
        try {
            $gejala = Gejala::get();
            $penyakit = Penyakit::get();
            $naive_bayes = NaiveBayes::init($gejala, $penyakit, $request->selected_gejala)
                                      ->calculatePrior()
                                      ->calculateLikelihood()
                                      ->calculatePosterior()
                                      ->result();
            $bobot = max($naive_bayes['bobot_probabillity']);
            $result = $naive_bayes['result'];
            $penyakit_result = array_search(max($result), $result);
            $related_penyakit = $penyakit->where('nama_penyakit', $penyakit_result)->first();
            $solusi_penyakit = $related_penyakit->solusi->solusi_penyakit;

            RiwayatHasilDiagnosa::create([
                'user_id' => Auth::user()->id,
                'hasil_penyakit' => $penyakit_result,
                'solusi_penyakit' => $solusi_penyakit,
                'bobot' => $bobot,
            ]);
            DB::commit();

            Cache::put('naive_bayes_result', $result, now()->addHours(1));

            return redirect()->route('diagnose.result');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('server-error', $th->getMessage());
        }
    }

    public function result() {
        $naive_bayes_result = Cache::get('naive_bayes_result');

        if ($naive_bayes_result) {
            $penyakit_result = array_search(max($naive_bayes_result), $naive_bayes_result);
            $related_penaykit = Penyakit::where('nama_penyakit', $penyakit_result)->first();
            $solusi_penyakit = $related_penaykit->solusi->solusi_penyakit;

            return view('main.diagnose_result', [
                'naive_bayes_result' => $naive_bayes_result,
                'penyakit_result' => $penyakit_result,
                'solusi' => $solusi_penyakit,
                'totalDiagnosePerUser' => $this->totalDiagnosePerUser,
                'mostFrequentDiagnose' => $this->mostFrequentDiagnose
            ]);
        } else {
            // return redirect()->route('diagnose.index')->with('no-result', 'Mohon maaf, hasil diagnosa tidak ditemukan.');
            return view('main.diagnose_result', [
                'naive_bayes_result' => [],
                'penyakit_result' => null,
                'solusi' => null,
                'totalDiagnosePerUser' => $this->totalDiagnosePerUser,
                'mostFrequentDiagnose' => $this->mostFrequentDiagnose
            ]);
        }
        
    }

    public function history($username) {
        $history = RiwayatHasilDiagnosa::where('user_id', Auth::user()->id)->orderByDesc('created_at')->paginate(5);
        return view('main.history', [
            'history' => $history
        ]);
    }
}
