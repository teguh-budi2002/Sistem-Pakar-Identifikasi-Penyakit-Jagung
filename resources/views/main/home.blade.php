@extends('main.layout.app')

@section('title', 'Beranda')

@section('content')
@if ($message = Session::get('only-admin-can-access-dashboard'))
<div class="flex justify-end">
  <div class="notif-el mt-5 mx-4 px-4 rounded-md border-l-4 border-rose-500 bg-rose-50 md:max-w-md">
    <div class="flex justify-between py-3">
      <div class="flex">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 animate-pulse" viewBox="0 0 20 20"
          fill="currentColor">
            <path fillRule="evenodd"
              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
              clipRule="evenodd" />
          </svg>
        </div>
        <div class="self-center ml-3">
          <span class="text-rose-600 font-semibold">
            AKSES DITOLAK!
          </span>
          <p class="text-rose-600 mt-1">
            {{ $message }}
          </p>
        </div>
      </div>
      <button class="self-start text-rose-500" type="button" onclick="hideNotif()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fillRule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clipRule="evenodd" />
        </svg>
      </button>
    </div>
  </div>
</div>
@endif
<div class="welcome_section w-full h-[500px]">
  <div class="h-full flex justify-center items-center">
    <div class="absolute top-12 m-auto max-w-3xl h-[250px] blur-[130px] inset-0" style="background: linear-gradient(108.49deg, rgba(158, 52, 251, 0.24) 23.1%, rgba(46, 63, 248, 0.341) 72.53%);"></div>
    <div class="md:w-1/2 w-10/12">
      <div class="welcome_text text-center">
        <img src="{{ asset('images/jagung_mobile_main_page.png') }}" class="w-32 h-auto mx-auto md:hidden block" alt="img jagung">
        <div class="flex justify-center items-center md:text-5xl text-2xl font-extrabold text-slate-700 bg-gradient-to-r from-violet-500 to-rose-500 bg-clip-text text-transparent space-x-2">
          <p class="capitalize">Identifikasi penyakit <span class="md:hidden inline-block">Jagung</span></p>
          <div class="md:flex md:items-center hidden">
            <p>Ja</p>
            <img src="{{ asset('images/jagung_main_page.png') }}" class="w-20 h-auto -mr-5 -ml-5" alt="img jagung">
            <p>ung</p>
          </div>
        </div>
        <p class="md:text-5xl text-2xl font-extrabold capitalize text-slate-700">
        anda dalam hitungan singkat.
        </p>
        <p class="md:text-sm text-xs text-slate-500 mt-2">Temukan informasi tentang penyakit tanaman jagung secara cepat dan akurat, serta dapatkan solusi terbaik untuk setiap masalah yang anda hadapi.</p>
      </div>
      <div class="welcome_btn flex justify-center mt-5">
        @if (Auth::check())
        <a href="{{ route('diagnose.index') }}" class="w-max p-2 px-4 flex items-center space-x-1 rounded-full bg-blue-700 hover:bg-blue-500 transition-colors duration-100 ease-in-out">
          <span class="text-white text-sm">Diagnosa Sekarang</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
          </svg>
        </a>
        @else
        <div x-data="{ isOpen: false }" class="z-50">
          <button type="button" @click="isOpen = true" class="w-max p-2 px-4 flex items-center space-x-1 rounded-full bg-blue-700 hover:bg-blue-500 transition-colors duration-100 ease-in-out">
            <span class="text-white text-sm">Diagnosa Sekarang</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </button>
          <template x-if="isOpen">
            <div class="fixed inset-0 w-full h-full">
                <div class="fixed inset-0 w-full h-full bg-black opacity-40"></div>
                <div class="fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] px-4 w-full max-w-lg">
                    <div class="bg-white rounded-md shadow-lg px-4 py-6">
                        <div class="flex items-center justify-center flex-none w-16 h-16 mx-auto bg-red-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-rose-600">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div class="mt-2 text-center sm:ml-4 sm:text-left">
                            <p class="text-2xl text-center font-medium text-rose-600 uppercase">Anda Belum Login</p>
                            <p class="mt-2 text-sm leading-relaxed text-gray-500">Akses terbatas, silakan login terlebih dahulu untuk mengakses fitur.</p>
                            <div class="items-center gap-2 mt-3 text-sm flex">
                                <a href="{{ route('login.index') }}" class="w-full mt-2 p-2.5 text-white text-center bg-slate-800 hover:bg-slate-700 rounded-md">
                                    Login
                                </a>
                                <button type="button" aria-label="Close" @click="isOpen = false" class="w-full mt-2 p-2.5 bg-gray-50 hover:bg-gray-100 text-gray-800 rounded-md border">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </template>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@push('js')
<script>
  function hideNotif() {
    const el = document.querySelector('.notif-el');

    el.classList.add('opacity-0', 'translate-x-full','transition-all', 'duration-500', 'ease-out');

    setTimeout(() => {
      el.classList.add('hidden')
    }, 500);
  }
</script>
@endpush
@endsection
