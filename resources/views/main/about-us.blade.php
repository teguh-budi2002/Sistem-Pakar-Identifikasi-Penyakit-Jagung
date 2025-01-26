@extends('main.layout.app')

@section('title', 'Beranda')

@section('content')
<div class="w-full h-full">
  <div class="mt-20">
    <div class="flex justify-center">
      <div class="shadow-xl rounded-md">
        <img src="{{ asset('images/photo_founder.jpg') }}" loading="eager" class="w-60 h-auto" alt="photo owner">
      </div>
    </div>
    <p class="text-center mt-8 text-4xl font-semibold text-slate-600">Teguh Budi Laksono</p>
    <p class="text-center mt-1 text-slate-400 font-light">Fullstack Website Developer</p>
    <p class="text-center text-slate-400 font-light">Founder JagungQu</p>
    <div class="px-20 mt-2 mb-8">
      <h1 class="text-4xl font-bold mb-1">Halo!</h1>
      <p class="text-md leading-relaxed">
        Saya adalah seorang <span class="font-bold">Fullstack Website Developer</span> dengan pengalaman lebih dari 
        <span class="font-bold">3 tahun</span> dalam dunia pemrograman. Selama perjalanan karier saya, saya telah 
        menguasai berbagai bahasa pemrograman, termasuk 
        <span class="font-bold text-sky-600">PHP</span>, 
        <span class="font-bold text-sky-600">CSS</span>, 
        <span class="font-bold text-sky-600">JavaScript</span>, 
        <span class="font-bold text-sky-600">TypeScript</span>, 
        dan berbagai teknologi terkait seperti
        <span class="font-bold text-sky-600">Laravel</span>,
        <span class="font-bold text-sky-600">Vue.js</span>,
        <span class="font-bold text-sky-600">Next JS</span>, dan
        <span class="font-bold text-sky-600">Express JS</span>.

        Kemampuan saya tidak hanya terbatas pada pemrograman, tetapi 
        juga meliputi perancangan, pengembangan, dan penerapan solusi digital yang efektif untuk berbagai kebutuhan bisnis.
      </p>

      <h2 class="text-2xl font-bold mt-3 mb-1">Pengalaman Proyek:</h2>
      <ul class="list-disc pl-6 space-y-2">
        <li>
          <span class="font-bold text-sky-600">Sistem Point of Sale (POS) untuk Apotek</span>, 
          yang dirancang untuk memudahkan manajemen inventaris, penjualan, dan laporan keuangan.
        </li>
        <li>
          <span class="font-bold text-sky-600">Platform PPOB (Payment Point Online Banking)</span>, 
          layanan top-up terintegrasi dengan 
          <span class="font-bold text-sky-600">Payment Gateway Midtrans</span>, memungkinkan pengguna untuk melakukan 
          transaksi dengan aman dan cepat.
        </li>
        <li>
          <span class="font-bold text-sky-600">Sistem Pakar Identifikasi Penyakit Tanaman Jagung</span>, 
          dengan mengimplementasikan metode
          <span class="font-bold text-sky-600">Naive Bayes</span>, memungkinkan pengguna untuk melakukan 
          identifikasi penyakit pada tanaman jagung beserta solusi sesuai penyakit yang teridentifikasi.
        </li>
        <li>
          <span class="font-bold text-sky-600">Website CMS (Content Management System)</span>, 
          sebuah sistem dinamis yang memungkinkan pengguna untuk mengelola konten website dengan mudah dan cepat seperti website artikel dan lain-lain. 
        </li>
        <li>
          Proyek-proyek lainnya, termasuk aplikasi berbasis web, sistem manajemen data, dan berbagai solusi custom yang 
          disesuaikan dengan kebutuhan klien.
        </li>
      </ul>

      <h2 class="text-2xl font-bold mt-3 mb-1">Keahlian:</h2>
      <p class="text-md leading-relaxed">
        Saya memiliki kemampuan dalam pengembangan frontend dan backend, penerapan API, integrasi sistem pembayaran, serta optimasi 
        performa aplikasi agar dapat memberikan pengalaman pengguna yang terbaik. Saya juga terbiasa bekerja dalam tim maupun secara 
        individu, dengan pendekatan yang berorientasi pada hasil dan solusi.  Saya selalu bersemangat untuk mempelajari teknologi terbaru dan terus berinovasi dalam setiap proyek yang saya kerjakan. Visi saya adalah menciptakan aplikasi yang tidak hanya fungsional, tetapi juga memberikan nilai tambah bagi pengguna dan bisnis.
      </p>
    </div>

  </div>
</div>
@endsection