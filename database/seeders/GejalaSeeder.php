<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * penyakit_id
         * 
         * 1 = Penyakit Bulai
         * 2 = Penyakit Hawar Daun
         * 3 = Penyakit Busuk Pelepah
         * 4 = Karat Daun
         * 5 = Penyakit Gosong
         */
        Gejala::create([
            'kode_gejala' => 'G-01',
            'nama_gejala' => 'Daun menunjukkan gejala klorosis.',
            'penyakit_id' => 1,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-02',
            'nama_gejala' => 'Pertumbuhan tanaman terhambat.',
            'penyakit_id' => 1,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-03',
            'nama_gejala' => 'Lapisan putih seperti tepung muncul di kedua sisi daun yang mengalami klorosis.',
            'penyakit_id' => 1,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-04',
            'nama_gejala' => 'Daun terlihat melengkung dan terpelintir.',
            'penyakit_id' => 1,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-05',
            'nama_gejala' => 'Proses pembentukan tongkol terganggu.',
            'penyakit_id' => 1,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-06',
            'nama_gejala' => 'Daun yang terkena penyakit tampak tidak segar.',
            'penyakit_id' => 2,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-07',
            'nama_gejala' => 'Bercak-bercak kecil menyatu membentuk area yang lebih luas.',
            'penyakit_id' => 2,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-07',
            'nama_gejala' => 'Bercak-bercak kecil menyatu membentuk area yang lebih luas.',
            'penyakit_id' => 3,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-07',
            'nama_gejala' => 'Bercak-bercak kecil menyatu membentuk area yang lebih luas.',
            'penyakit_id' => 4,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-08',
            'nama_gejala' => 'Muncul bercak memanjang berwarna coklat muda berbentuk seperti kumparan atau perahu.',
            'penyakit_id' => 2,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-09',
            'nama_gejala' => 'Bercak coklat berbentuk oval terlihat pada daun.',
            'penyakit_id' => 2,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-10',
            'nama_gejala' => 'Daun terlihat mengering.',
            'penyakit_id' => 2,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-10',
            'nama_gejala' => 'Daun terlihat mengering.',
            'penyakit_id' => 4,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-11',
            'nama_gejala' => 'Bintik-bintik kecil berwarna coklat atau kering muncul di permukaan daun.',
            'penyakit_id' => 4,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-12',
            'nama_gejala' => 'Pelepah daun menunjukkan bercak kemerahan.',
            'penyakit_id' => 3,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-13',
            'nama_gejala' => 'Terlihat benang-benang tidak beraturan berwarna putih yang kemudian berubah menjadi coklat.',
            'penyakit_id' => 3,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-14',
            'nama_gejala' => 'Serbuk halus berwarna coklat kekuningan keluar dari tanaman.',
            'penyakit_id' => 4,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-15',
            'nama_gejala' => 'Tongkol mengalami pembengkakan.',
            'penyakit_id' => 5,
        ]);

        Gejala::create([
            'kode_gejala' => 'G-16',
            'nama_gejala' => 'Biji-bijian diselimuti oleh jamur hingga kehitaman.',
            'penyakit_id' => 5,
        ]);
        Gejala::create([
            'kode_gejala' => 'G-17',
            'nama_gejala' => 'Biji-bijian membesar secara tidak normal.',
            'penyakit_id' => 5,
        ]);
        Gejala::create([
            'kode_gejala' => 'G-18',
            'nama_gejala' => 'Kalenjar terbentuk pada biji.',
            'penyakit_id' => 5,
        ]);
        Gejala::create([
            'kode_gejala' => 'G-19',
            'nama_gejala' => 'Kelobot terbuka dan dipenuhi oleh jamur berwarna putih hingga kehitaman.',
            'penyakit_id' => 5,
        ]);
    }
}
