@extends('main.layout.app')
@section('title', 'Hasil Diagnosa')
@section('content')
<div class="w-full h-full">
@if (!empty($data))
  <div class="flex flex-col items-center justify-centestart mt-12 md:mx-0 mx-10">
    <img src="{{ asset('images/penyakit/' . $data['img_penyakit']) }}" class="w-auto max-h-96" alt="{{ $data['img_source'] }}">
    <p class="md:text-sm text-xs md:text-left text-center text-slate-600 font-semibold mt-2">Sumber: <span class="text-slate-400 font-normal">{{ $data['img_source'] }}</span></p>
  </div>
  <p class="text-center mt-5 text-4xl font-bold text-slate-600">Informasi Mengenai Penyakit {{ $data['name_of_penyakit'] }}</p>
  <div class="md:px-10 px-6 mt-5 mb-5">
    <p class="leading-relaxed indent-7">
      {!! nl2br(e($data['description'])) !!}
    </p>
  </div>
@else
  <div class="flex flex-col items-center justify-center mt-12">
    <img src="{{ asset('images/404_notfound.png') }}" class="w-auto max-h-96" alt="not found">
    <p class="text-slate-400 text-xl mt-4">Halaman Yang Anda Cari Tidak Ditemukan!</p>
  </div>  
@endif
</div>
@endsection