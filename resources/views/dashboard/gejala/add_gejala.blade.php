@extends('dashboard.layouts.app_dashboard')
@section('title_db', 'Tambah Gejala')
@section('content_dashboard')
<section class="w-full h-full">
    <p class="text-lg uppercase">Tambah Data Gejala</p>
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-8 max-w-132.5 mt-3">
        <form action="{{ Route('create.gejala') }}" method="POST" x-data="{ isSubmitting: false }" @submit="isSubmitting = true">
            @csrf
            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Kode Gejala
                </label>
                @error('kode_gejala')
                <span class="text-xs text-meta-7/70 mb-1.5 capitalize" role="alert">{{ $message }}</span>
                @enderror
                <input type="text" name="kode_gejala" value="{{ old('kode_gejala') }}"
                    placeholder="Masukkan kode gejala..."
                    class="w-full rounded border-[1.5px] {{ $errors->has('kode_gejala') ? 'border-danger' : 'border-stroke' }} bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
            </div>
            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Deskripsi Gejala
                </label>
                @error('nama_gejala')
                <span class="text-xs text-meta-7/70 mb-1.5 capitalize" role="alert">{{ $message }}</span>
                @enderror
                <textarea name="nama_gejala" value="{{ old('nama_gejala') }}"
                    placeholder="Masukkan deskripsi gejala..."
                    class="w-full rounded border-[1.5px] {{ $errors->has('nama_gejala') ? 'border-danger' : 'border-stroke' }} bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
            </div>
            <div class="mb-4.5">
              <div class="flex justify-between items-center mb-2.5">
                <label class="block text-black dark:text-white">
                    Relasi Penyakit
                </label>
                </div>
                <div class="relative z-20 bg-transparent dark:bg-form-input">
                    <select name="penyakit_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option value="" selected disabled>Pilih Penyakit Yang Berelasi Dengan Gejala</option>
                        @foreach ($penyakit as $p)
                          <option value="{{ $p->id }}">{{ $p->nama_penyakit }}</option>
                        @endforeach
                    </select>
                    <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.8">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                    fill=""></path>
                            </g>
                        </svg>
                    </span>
                </div>
            </div>
            <button type="submit" :disabled="isSubmitting" class="mt-4 flex w-full justify-center rounded-md bg-primary hover:bg-meta-5 p-2 font-medium text-gray disabled:cursor-not-allowed" x-text="isSubmitting ? 'Processing...' : 'Submit'">
                    Submit
            </button>
        </form>
    </div>
</section>
@endsection