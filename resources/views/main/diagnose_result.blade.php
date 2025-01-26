@extends('main.layout.app')
@section('title', 'Hasil Diagnosa')
@section('content')
<div class="md:flex md:items-start md:space-x-3 md:mt-8 md:p-8">
  @include('main.layout.side_info_diagnose', ['totalDiagnosePerUser' => $totalDiagnosePerUser, 'mostFrequentDiagnose' => $mostFrequentDiagnose])
  @if(!empty($naive_bayes_result))
  <div class="w-full">
    <div class="p-2 outline-1 outline outline-slate-200">
      <p class="text-center text-2xl uppercase text-slate-600">Hasil Diagnosa</p>
      <div class="flex justify-center mt-5">
        <div class="w-1/2">
          <div class="grid grid-cols-2 gap-2">
            @foreach ($naive_bayes_result as $penyakit => $result)
            <div class="text-center md:text-xl text-sm">
              <p class="text-slate-600">{{ $penyakit }}</p>
            </div>
            @php
              $resultColor = '';

              if($result >= 80) {
                $resultColor = 'text-green-500';
              } else if($result >= 60) {
                $resultColor = 'text-yellow-500';
              } else {
                $resultColor = 'text-rose-500';
              }
            @endphp
            <div class="text-center md:text-xl text-sm">
              <p class="{{ $resultColor }}">{{ number_format($result, 2) }} %</p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="solusi_penyakit mt-4">
        <p>Solusi Mengatasi <span class="font-semibold">Penyakit {{ $penyakit_result }}</span> :</p>
        <p class="md:text-sm text-xs leading- mt-2">{{ $solusi }}</p>
        <p class="mt-4">Informasi Lengkap Mengenai <a href="{{ route('info.desease', ['jenisPenyakit' => strtolower(str_replace(" ", "-", $penyakit_result))]) }}" class="text-blue-500 hover:text-blue-400">{{ $penyakit_result }}</a></p>
      </div>
      <div class="mt-5 md:mb-0 mb-5">
        <a href="{{ route('diagnose.history', ['username' => Auth::user()->username]) }}" class="w-fit p-2 rounded-md bg-sky-500 hover:bg-sky-600 text-white flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
          </svg>
          <span>Riwayat Diagnosa</span>
        </a>
      </div>
    </div>
  </div>
  @else
    
  @endif

{{-- <div class="fixed inset-0 w-full h-full" x-transition>
  <div class="fixed inset-0 w-full h-full bg-black opacity-40"></div>
    <div class="fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] px-4 w-full max-w-lg">
      <div class="bg-white rounded-md shadow-lg px-4 py-4">
        <div class="flex items-center justify-between p-1 border-b">
            <h2 class="text-lg font-medium text-gray-800">Penilaian Akurasi Sistem</h2>
            <button class="p-2 text-gray-400 rounded-md hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="mt-2 text-center sm:ml-4 sm:text-left">
          <p class="mt-2 text-sm leading-relaxed text-gray-500">Terima kasih telah menggunakan sistem pakar kami. Apakah hasil yang diberikan sudah sesuai dengan harapan Anda? Silakan berikan penilaian Anda untuk membantu kami meningkatkan layanan ini.</p>
          <div class="items-center gap-2 mt-3 text-sm sm:flex">
              <a href="" class="w-full mt-2 p-2.5 text-white text-center bg-slate-800 hover:bg-slate-700 rounded-md">
                  Ya, Akurat
              </a>
              <button type="button" aria-label="Close" class="w-full mt-2 p-2.5 bg-gray-50 hover:bg-gray-100 text-gray-800 rounded-md border">
                  Tidak Akurat
              </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection