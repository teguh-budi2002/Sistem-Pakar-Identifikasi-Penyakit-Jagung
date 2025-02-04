@extends('main.layout.app')
@section('title', 'Register')
@section('content')
<div class="w-full flex">
  <div
      class="relative flex-1 hidden items-center justify-center h-screen bg-gray-900 lg:flex"
    >
    <div class="relative z-10 w-full max-w-md">
      <div class="">
        <img src="{{ asset('images/logo/LOGO_Only.png') }}" class="w-52 h-auto mx-auto" alt="logo">
      </div>
      <div class="mt-16 space-y-7">
        <h3 class="text-white text-3xl font-bold">
          Optimalkan Produksi Jagung Anda
        </h3>
        <p class="text-gray-300 text-sm">
          Daftar dan optimalkan hasil panen jagung anda dengan dukungan sistem pakar diagnosis yang memberikan solusi akurat untuk setiap masalah penyakit pada tanaman jagung.
        </p>
      </div>
    </div>
    <div
      class="absolute inset-0 my-auto h-[500px]"
      style="
        background: linear-gradient(
          152.92deg,
          rgba(100, 108, 255, 0.2) 4.54%,
          rgba(91, 80, 243, 0.26) 34.2%,
          rgba(150, 136, 222, 0.211) 77.55%
        );
        filter: blur(118px);
      "
    ></div>
  </div>
  <div class="flex-1 flex items-center justify-center md:h-screen h-full">
    <div
      class="w-full max-w-md space-y-8 mb-10 px-4 bg-white text-gray-600 sm:px-0"
    >
      <div>
        <div class="mt-5 space-y-2">
          <h3 class="text-gray-800 text-2xl font-bold sm:text-3xl">
            Daftar
          </h3>
          <p class="">
            Sudah punya akun?
            <a
              href="{{ route('login.index') }}"
              class="font-medium text-indigo-600 hover:text-indigo-500"
              >Log in</a
            >
          </p>
        </div>
        <div class="alert mt-4">
          @if ($message = Session::get('server-error'))
            <div class="bg-rose-500 text-white p-2 rounded text-center capitalize">
                <p>{{ $message }}</p>
            </div>
          @endif
        </div>
      </div>
      <form action="{{ route('register.process') }}" method="POST" class="space-y-5">
        @csrf
        <div>
          <label class="font-medium">Username</label>
          @error('username')
            <p class="text-sm text-rose-500">{{ $message }}</p>
          @enderror
          <input
            type="text"
            name="username"
            value="{{ old('username') }}"
            class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
          />
        </div>
        <div>
          <label class="font-medium">Nama Lengkap</label>
          @error('fullname')
            <p class="text-sm text-rose-500">{{ $message }}</p>
          @enderror
          <input
            type="text"
            name="fullname"
            value="{{ old('fullname') }}"
            class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
          />
        </div>
        <div>
          <label class="font-medium">Jenis Kelamin</label>
          @error('gender')
            <p class="text-sm text-rose-500">{{ $message }}</p>
          @enderror
          <select name="gender" class="w-full mt-2 p-2 outline outline-2 outline-gray-100" id="gender">
            <option selected disabled>Pilih Jenis Kelamin</option>
            <option value="L">Laki Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <div>
          <label class="font-medium">Email</label>
          @error('email')
            <p class="text-sm text-rose-500">{{ $message }}</p>
          @enderror
          <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
          />
        </div>
        <div>
          <label class="font-medium">Password</label>
          @error('password')
            <p class="text-sm text-rose-500">{{ $message }}</p>
          @enderror
          <input
            type="password"
            name="password"
            class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
          />
        </div>
        <div>
          <label class="font-medium">Konfirmasi Password</label>
          <input
            type="password"
            name="password_confirmation"
            class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
          />
        </div>
        <div class="md:text-start text-center">
          <button class="md:w-full w-1/2 px-4 py-2 md:mb-0 mb-10 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150">
            DAFTAR
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection