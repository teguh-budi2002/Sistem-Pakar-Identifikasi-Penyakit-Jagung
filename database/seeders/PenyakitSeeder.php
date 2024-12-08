<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penyakit::create([
            'nama_penyakit' => 'Bulai'
        ]);
        
        Penyakit::create([
            'nama_penyakit' => 'Hawar Daun'
        ]);
        
        Penyakit::create([
            'nama_penyakit' => 'Busuk Pelepah'
        ]);
        
        Penyakit::create([
            'nama_penyakit' => 'Karat Daun'
        ]);
        
        Penyakit::create([
            'nama_penyakit' => 'Penyakit Gosong'
        ]);
    }
}
