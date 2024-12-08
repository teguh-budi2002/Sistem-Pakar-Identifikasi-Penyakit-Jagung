@extends('dashboard.layouts.app_dashboard')
@section('title_db', 'Tambah Penyakit')
@section('content_dashboard')
<section class="w-full h-full">
    <p class="text-lg uppercase">Edit Data Penyakit</p>
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-8 max-w-132.5 mt-3">
        <form action="{{ Route('update.penyakit', ['penyakitId' => $penyakit->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Nama Penyakit
                </label>
                @error('nama_penyakit')
                <span class="text-xs text-meta-7/70 mb-1.5 capitalize" role="alert">{{ $message }}</span>
                @enderror
                <input type="text" name="nama_penyakit" value="{{ old('nama_penyakit', $penyakit->nama_penyakit) }}"
                    placeholder="Masukkan nama penyakit..."
                    class="w-full rounded border-[1.5px] {{ $errors->has('nama_penyakit') ? 'border-danger' : 'border-stroke' }} bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
            </div>
            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Deskripsi Penyakit <span class="text-xs text-danger">(Opsional)</span>
                </label>
                @error('deskripsi')
                <span class="text-xs text-meta-7/70 mb-1.5 capitalize" role="alert">{{ $message }}</span>
                @enderror
                <textarea type="text" name="deskripsi" value="{{ old('deskripsi') }}"
                    placeholder="Masukkan deskripsi penyakit..."
                    class="w-full rounded border-[1.5px] {{ $errors->has('deskripsi') ? 'border-danger' : 'border-stroke' }} bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ $penyakit->deskripsi }}</textarea>
            </div>
            <button type="submit" class="mt-4 flex w-full justify-center rounded-md bg-primary hover:bg-meta-5 p-2 font-medium text-gray">
                    Update
            </button>
        </form>
    </div>
</section>
@endsection