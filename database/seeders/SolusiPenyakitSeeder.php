<?php

namespace Database\Seeders;

use App\Models\SolusiPenyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolusiPenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SolusiPenyakit::create([
            'penyakit_id' => 1,
            'solusi_penyakit' => 'Bulai diakibatkan oleh cendawan Peronosclerospora maydis. Penanganannya dapat dilakukan dengan menanam benih yang sudah diberi perlakuan fungisida sistemik, seperti metalaksil. Perhatikan pola tanam dan rotasi, serta hindari kondisi yang terlalu lembap di lahan.',
        ]);

        SolusiPenyakit::create([
            'penyakit_id' => 2,
            'solusi_penyakit' => 'Hawar Daun disebabkan oleh jamur Exserohilum turcicum. Untuk mengatasinya, gunakan benih jagung yang tahan terhadap penyakit ini. Lakukan rotasi tanaman dengan jenis tanaman lain seperti kacang-kacangan untuk memutus siklus hidup patogen. Jika diperlukan, semprotkan fungisida yang mengandung mankozeb atau azoksistrobin sesuai dosis yang dianjurkan.',
        ]);

        SolusiPenyakit::create([
            'penyakit_id' => 3,
            'solusi_penyakit' => 'Busuk Pelepah, yang sering disebabkan oleh cendawan Fusarium spp. atau Rhizoctonia solani, mengakibatkan pelepah daun menjadi cokelat dan lunak. Pengendalian meliputi penggunaan benih yang tahan penyakit, penerapan drainase yang baik untuk menghindari genangan air, serta pemangkasan bagian tanaman yang terinfeksi untuk mengurangi penyebaran penyakit.',
        ]);

        SolusiPenyakit::create([
            'penyakit_id' => 4,
            'solusi_penyakit' => 'Karat Daun, yang disebabkan oleh jamur Puccinia sorghi, memunculkan bercak-bercak kecil berwarna kuning hingga cokelat kemerahan pada daun. Pengendalian dilakukan dengan menjaga kebersihan lahan, menanam varietas tahan karat, dan jika serangan sudah parah, semprotkan fungisida berbahan aktif seperti propikonazol.',
        ]);

        SolusiPenyakit::create([
            'penyakit_id' => 5,
            'solusi_penyakit' => 'Penyakit Gosong, yang disebabkan oleh jamur Ustilago maydis, ditandai dengan pembengkakan hitam pada bagian tanaman seperti tongkol, batang, dan daun. Untuk mencegahnya, pilih varietas jagung yang resisten, hindari kerusakan mekanis pada tanaman saat proses pemeliharaan, dan pangkas serta musnahkan bagian tanaman yang terinfeksi.',
        ]);
    }
}
