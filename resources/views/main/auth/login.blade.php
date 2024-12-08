@extends('main.layout.app')
@section('title', 'Login')
@section('content')
@if ($message = Session::get('register-success'))
<div class="flex justify-end">
  <div class="notif-el mt-5 mx-4 px-4 rounded-md border-l-4 border-green-500 bg-green-50 md:max-w-md">
    <div class="flex justify-between py-3">
      <div class="flex">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rounded-full text-green-500 animate-pulse" viewBox="0 0 20 20"
            fill="currentColor">
            <path fillRule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clipRule="evenodd" />
          </svg>
        </div>
        <div class="self-center ml-3">
          <span class="text-green-600 font-semibold">
            Pendaftaran Berhasil
          </span>
          <p class="text-green-600 mt-1">
            Silahkan login untuk mengakses fitur website.
          </p>
        </div>
      </div>
      <button class="self-start text-green-500" type="button" onclick="hideNotif()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fillRule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clipRule="evenodd" />
        </svg>
      </button>
    </div>
  </div>
</div>
@elseif ($message = Session::get('invalid-login'))
<div class="flex justify-end">
  <div class="notif-el mt-5 mx-4 px-4 rounded-md border-l-4 border-rose-500 bg-rose-50 md:max-w-md">
    <div class="flex justify-between py-3">
      <div class="flex">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20"
            fill="currentColor">
            <path fillRule="evenodd"
              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
              clipRule="evenodd" />
          </svg>
        </div>
        <div class="self-center ml-3">
          <span class="text-rose-600 font-semibold">
            Login Gagal
          </span>
          <p class="text-rose-600 mt-1">
            {{ $message }}
          </p>
        </div>
      </div>
      <button class="self-start text-rose-500" type="button" onclick="hideNotif(this)">
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
<div class="w-full h-screen flex flex-col items-center justify-center px-4">
    <div class="max-w-sm w-full text-gray-600">
        <div class="text-center">
            <img src="{{ asset('images/logo/LOGO_BlackColorText.png') }}" width="150" class="mx-auto" />
            <div class="mt-5 space-y-2">
                <h3 class="text-gray-600 text-2xl font-bold sm:text-4xl">Login</h3>
                <p class="">Belum punya akun? <a href="{{ route('register.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Daftar</a></p>
            </div>
        </div>
        <form action="{{ route('login.process') }}" method="POST" class="mt-8 space-y-5">
          @csrf
            <div>
                <label class="font-medium">
                    Username
                </label>
                @error('username')
                  <p class="text-sm text-rose-500">{{ $message }}</p>
                @enderror
                <input
                    type="text"
                    name="username"
                    class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
                />
            </div>
            <div>
                <label class="font-medium">
                    Password
                </label>
                @error('username')
                  <p class="text-sm text-rose-500">{{ $message }}</p>
                @enderror
                <input
                    type="password"
                    name="password"
                    class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
                />
            </div>
            <button
                class="w-full px-4 py-2 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150"
            >
                Login
            </button>
        </form>
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