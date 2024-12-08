<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_of_users = User::count();
        $gejala = Gejala::selectRaw('MIN(id) as id, kode_gejala, MIN(nama_gejala) as nama_gejala')
                                ->groupBy('kode_gejala')
                                ->get();
        $total_of_gejala = count($gejala);
        $total_of_penyakit = Penyakit::count();

        return view('dashboard.main_dashboard', [
            'total_of_users' => $total_of_users,
            'total_of_gejala' => $total_of_gejala,
            'total_of_penyakit' => $total_of_penyakit,
        ]);
    }

    public function gejala() 
    {
        $gejala = $gejala = Gejala::with('penyakit')
                                ->selectRaw('MIN(id) as id, MIN(penyakit_id) as penyakit_id, kode_gejala, MIN(nama_gejala) as nama_gejala')
                                ->groupBy('kode_gejala')
                                ->paginate(10);

        return view('dashboard.gejala.index', [
            'gejala' => $gejala,
        ]);
    }

    public function penyakit() 
    {
        $penyakit = Penyakit::paginate(10);
        return view('dashboard.penyakit.index', [
            'penyakit' => $penyakit,
        ]);
    }
    
    public function pengguna() 
    {
        $users = User::with('role')
                    ->orderBy('id', 'asc')
                    ->paginate(10);
        return view('dashboard.pengguna.index', [
            'users' => $users
        ]);
    }
}
