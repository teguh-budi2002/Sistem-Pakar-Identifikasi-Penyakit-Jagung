@extends('dashboard.layouts.app_dashboard')
@section('title_db', 'Tambah atau Edit Solusi Penyakit')
@section('content_dashboard')
<section class="w-full h-full">
    <p class="text-lg uppercase">Tambah / Edit Solusi Penyakit</p>
    @if ($message = Session::get('server-error'))
        <div class="bg-danger mt-2 text-white p-2 rounded text-center capitalize">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-8 max-w-132.5 mt-3">
        <form action="{{ Route('add.penyakit.solution.process', ['penyakitId' => $penyakit->id]) }}" method="POST">
            @csrf
            <div class="mb-4.5">
               <p>Nama Penyakit : <span class="font-bold">Penyakit {{ $penyakit->nama_penyakit }}</span></p>
            </div>
            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Solusi Penyakit
                </label>
                @error('solusi_penyakit')
                  <span class="text-xs text-meta-7/70 mb-1.5 capitalize" role="alert">{{ $message }}</span>
                @enderror
                <textarea type="text" name="solusi_penyakit" value="{{ old('solusi_penyakit') }}"
                    placeholder="Masukkan solusi penyakit..."
                    class="w-full rounded border-[1.5px] {{ $errors->has('solusi_penyakit') ? 'border-danger' : 'border-stroke' }} bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ !empty($solusi_penyakit) ? $solusi_penyakit->solusi_penyakit : '' }}</textarea>
            </div>
            <button type="submit" class="mt-4 flex w-full justify-center rounded-md bg-primary hover:bg-meta-5 p-2 font-medium text-gray">
                    Submit
            </button>
        </form>
    </div>
</section>
@endsection