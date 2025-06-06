@extends('dashboard.layouts.app_dashboard')
@section('title_db', 'Pengguna')
@section('content_dashboard')
<section>
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Pengguna
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li><button type="button" class="font-medium">Dashboard /</button></li>
                <li class="font-medium text-primary">Pengguna</li>
            </ol>
        </nav>
    </div>
    <div class="alert w-full mb-4">
        @if ($message = Session::get('success-delete-pengguna'))
            <div class="bg-danger text-white p-2 rounded text-center capitalize">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('error-delete-pengguna'))
            <div class="bg-danger text-white p-2 rounded text-center capitalize">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div
        class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="header_table flex justify-between items-center mb-3">
            <p class="uppercase font-bold">Daftar Pengguna</p>
        </div>
        <div class="overflow-x-auto no-scrollbar">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                        <th
                            class="p-2 whitespace-nowrap text-center font-semibold text-bodydark2 uppercase text-sm dark:text-white">
                            No
                        </th>
                        <th
                            class="p-2 whitespace-nowrap text-center font-semibold text-bodydark2 uppercase text-sm dark:text-white">
                            Username
                        </th>
                        <th
                            class="p-2 whitespace-nowrap text-center font-semibold text-bodydark2 uppercase text-sm dark:text-white">
                            Nama Lengkap
                        </th>
                        <th
                            class="p-2 whitespace-nowrap text-center  font-semibold text-bodydark2 uppercase text-sm dark:text-white">
                            Role
                        </th>
                        <th
                            class="p-2 whitespace-nowrap  font-semibold text-bodydark2 uppercase text-sm dark:text-white">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @if ($users->isNotEmpty())
                      @foreach ($users as $user)
                      <tr>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark text-center">
                            <p class="text-graydark dark:text-white text-sm font-semibold capitalize whitespace-nowrap">{{ ($loop->iteration + ($users->currentPage() - 1) * $users->perPage()) }}</p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark text-center">
                            <p class="text-graydark dark:text-white text-sm">{{ $user->username }}</p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark text-center">
                            <p class="text-sm whitespace-nowrap">{{ $user->fullname }}</p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark text-center">
                            <p class="text-sm whitespace-nowrap {{ $user->role->role_name === 'Admin' ? 'text-danger' : 'text-success' }}">{{ $user->role->role_name }}</p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <div class="" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                                <a class="flex items-center" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                                    <svg :class="dropdownOpen && 'rotate-180'" class="fill-current" width="12"
                                        height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                                            fill="" />
                                    </svg>
                                </a>

                                <div x-show="dropdownOpen" x-data="{ modelOpen: false }"
                                    class="absolute md:right-20 right-10 mt-4 flex w-fit h-auto flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                                    <ul class="flex flex-col gap-5 border-b border-stroke p-2 dark:border-strokedark">
                                        <li>
                                            <form action="{{ route('delete.user', ['userId' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center gap-2 text-xs font-medium duration-300 ease-in-out hover:text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[14px] h-[14px]">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                    Hapus Pengguna
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                  @endif
                </tbody>
            </table>
            @if ($users->isEmpty())
            <div class="empty_project w-full h-48 bg-white flex justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-14 h-14 text-danger">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="mt-3">Tidak ada daftar pengguna!</p>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="pagination mt-5">
        {{ $users->links('vendor.pagination.simple-tailwind') }}
    </div>
</section>
@endsection