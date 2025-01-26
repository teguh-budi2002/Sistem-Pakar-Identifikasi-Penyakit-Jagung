@extends('main.layout.app')
@section('title', 'Diagnosa Penyakit')
@section('content')

@if ($message = Session::get('server-error'))
<div class="bg-rose-500 mt-2 text-white p-2 text-center capitalize">
    <p>{{ $message }}</p>
</div>
@endif
<div class="md:flex md:items-start md:space-x-3 md:mt-8 md:p-8">
  @include('main.layout.side_info_diagnose', ['totalDiagnosePerUser' => $totalDiagnosePerUser, 'mostFrequentDiagnose' => $mostFrequentDiagnose])
  <div class="w-full">
    <div class="grid grid-cols-3 gap-3 p-2 outline-1 outline outline-slate-200">
      <p class="text-center">Kode Gejala</p>
      <p class="text-center">Gejala Yang Dialami</p>
      <p class="text-center">Pilihan Gejala</p>
    </div>
    <div class="p-4 outline-1 outline outline-slate-200 mt-4">
      <form action="{{ route('diagnose.process') }}" method="POST">
        @csrf
        <div class="list_gejala space-y-3">
          @foreach ($gejala as $g)
          <div class="w-full flex items-center space-x-5">
            <p class="w-1/4 text-center">{{ $g->kode_gejala }}</p>
            <p class="flex-1">{{ $g->nama_gejala }}</p>
            <div class="flex-1 flex justify-center">
              <input type="checkbox" name="selected_gejala[]" class="w-4 h-4 mx-auto text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer"  value="{{ $g->kode_gejala }}">
            </div>
          </div>
          @endforeach
        </div>
        <div class="mt-8 text-start">
          <button type="submit" class="py-1.5 px-6 rounded bg-sky-500 hover:bg-sky-400 text-white">Cek Sekarang!</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection