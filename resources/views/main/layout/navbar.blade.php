<nav class="w-full flex items-center justify-between md:p-4 py-4 px-2 border-b border-slate-200">
  <div class="logo">
    <img src="{{ asset('images/logo/LOGO_Only.png') }}" class="w-16 h-16" alt="logo web">
  </div>
  <div class="w-full flex items-center justify-between" x-data="{ isOpen: false }">
    <div class="menu_desktop ">
      <ul class="flex items-center md:space-x-8 space-x-5">
        <li><a href="{{ route('home') }}" class="text-sm hover:text-slate-700 {{ Request::is('/') ? 'text-slate-700' : 'text-slate-400' }}">Beranda</a></li>
        @if (Auth::check())
        <li><a href="{{ route('diagnose.index') }}" class="text-sm hover:text-slate-700 {{ Request::is('diagnosa-penyakit') ? 'text-slate-700' : 'text-slate-400' }}">Diagnosa Penyakit</a></li>
        @endif
        <li><a href="{{ route('about.us') }}" class="text-slate-400 text-sm hover:text-slate-700">Tentang Kami</a></li>
      </ul>
    </div>
    <div class="button_login_register flex items-center justify-end space-x-3">
      @if (Auth::check())
      <div class="flex items-center gap-x-1 relative" x-data="{ isDropdownProfileOpen: false }">
        @if (Auth::user()->gender === 'L')
          <img src="https://avatar.iran.liara.run/public/job/farmer/male" loading="eager" class="w-12 h-12 rounded-full" />
        @else
          <img src="https://avatar.iran.liara.run/public/job/farmer/female" loading="eager" class="w-12 h-12 rounded-full" />
        @endif
        <button type="button" @click="isDropdownProfileOpen = !isDropdownProfileOpen">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-400">
            <path fillRule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clipRule="evenodd" />
          </svg>
        </button>
        <div class="dropdown_profile absolute top-16 right-0" x-show="isDropdownProfileOpen" x-transition>
          <div class="ring-1 ring-slate-200 bg-white w-40">
            <ul>
              <li>
                <a href="{{ route('diagnose.history', ['username' => Auth::user()->username]) }}" class="block py-2 px-4 hover:bg-gray-100 whitespace-nowrap">Riwayat Diagnosa</a>
              </li>
              <li>
                <button type="button" @click="isOpen = true" class="md:hidden w-full block py-2 px-4 hover:bg-gray-100 text-left">Logout</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div>
        <button type="button" @click="isOpen = true" class="w-max p-2 px-4 md:flex items-center space-x-1 rounded-full bg-rose-700 hover:bg-rose-500 transition-colors duration-100 ease-in-out hidden">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
          </svg>
          <span class="text-white text-sm">Logout</span>
        </button>
        <template x-teleport="body">
          <div class="fixed inset-0 w-full h-full" x-show="isOpen" x-transition>
              <div class="fixed inset-0 w-full h-full bg-black opacity-40"></div>
              <div class="fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] px-4 w-full max-w-lg">
                  <div class="bg-white rounded-md shadow-lg px-4 py-6">
                      <div class="flex items-center justify-center flex-none w-16 h-16 mx-auto bg-red-100 rounded-full">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                          </svg>
                      </div>
                      <div class="mt-2 text-center sm:ml-4 sm:text-left">
                          <p class="mt-2 text-sm leading-relaxed text-gray-500 text-center">Apakah yakin anda ingin logout?</p>
                          <div class="items-center gap-2 mt-3 text-sm sm:flex">
                            <form action="{{ route('logout') }}" method="POST" class="w-full">
                              @csrf
                              <button type="submit" class="w-full mt-2 p-2.5 text-white text-center bg-rose-700 hover:bg-rose-500 rounded-md">
                                  Iya, Logout
                              </button>
                            </form>
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
      @else
      <a href="{{ route('register.index') }}">Daftar</a>
      <a href="{{ route('login.index') }}" class="p-2 w-28 rounded-full bg-slate-800 hover:bg-slate-600 flex justify-center items-center space-x-1">
        <span class="text-white font-light">Login</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
      </a>
      @endif
    </div>
  </div>
</nav>