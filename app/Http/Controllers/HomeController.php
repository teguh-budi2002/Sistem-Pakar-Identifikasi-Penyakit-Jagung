<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('main.home');
    }

    public function informationDesease($jenisPenyakit) {
        $dataToParse = [];
        $formattedJenisPenyakit = ucwords(str_replace('-', ' ', $jenisPenyakit));
        $getDescriptionPenyakit = Penyakit::select('id', 'nama_penyakit', 'deskripsi')->where('nama_penyakit', $formattedJenisPenyakit)->first();

        switch ($formattedJenisPenyakit) {
            case 'Bulai':
                $dataToParse = [
                    'name_of_penyakit' => 'Bulai',
                    'img_penyakit' => 'bulai.jpeg',
                    'img_source' => 'https://distan.bulelengkab.go.id/informasi/detail/artikel/mengendalikan-penyakit-bulai-pada-tanaman-jagung-64',
                    'description' => $getDescriptionPenyakit->deskripsi,
                ];
                break;

            case 'Hawar Daun':
                $dataToParse = [
                    'name_of_penyakit' => 'Hawar Daun',
                    'img_penyakit' => 'hawar-daun.webp',
                    'img_source' => 'https://www.kampustani.com/cara-mengatasi-hawar-daun-pada-tanaman-jagung/',
                    'description' => $getDescriptionPenyakit->deskripsi,
                ];
                break;

            case 'Busuk Pelepah':
                $dataToParse = [
                    'name_of_penyakit' => 'Busuk Pelepah',
                    'img_penyakit' => 'busuk-pelepah.jpg',
                    'img_source' => 'https://plantix.net/id/library/plant-diseases/300035/bacterial-stalk-rot-of-maize/',
                    'description' => $getDescriptionPenyakit->deskripsi,
                ];
                break;

            case 'Karat Daun':
                $dataToParse = [
                    'name_of_penyakit' => 'Karat Daun',
                    'img_penyakit' => 'karat-daun.jpg',
                    'img_source' => 'https://agri.kompas.com/image/2023/01/18/170637084/gejala-dan-cara-mengendalikan-penyakit-karat-pada-jagung?page=2',
                    'description' => $getDescriptionPenyakit->deskripsi,
                ];
                break;

            case 'Penyakit Gosong':
                $dataToParse = [
                    'name_of_penyakit' => 'Penyakit Gosong',
                    'img_penyakit' => 'gosong.jpg',
                    'img_source' => 'https://www.dgwfertilizer.co.id/10-hama-dan-penyakit-penting-tanaman-jagung-serta-pengendaliannya/',
                    'description' => $getDescriptionPenyakit->deskripsi,
                ];
                break;
        }

        return view('main.information-desease', [
            'data' => $dataToParse
        ]);
    }

    public function aboutUs() {
        return view('main.about-us');
    }
}
