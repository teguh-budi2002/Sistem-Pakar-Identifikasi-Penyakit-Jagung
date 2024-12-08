@extends('dashboard.layouts.app_dashboard')
@section('title_db', 'Penyakit')
@section('content_dashboard')
<section>
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Penyakit
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li><button type="button" class="font-medium">Dashboard /</button></li>
                <li class="font-medium text-primary">Penyakit</li>
            </ol>
        </nav>
    </div>
    <div class="alert w-full mb-4">
        @if ($message = Session::get('success-create-penyakit'))
            <div class="bg-success text-white p-2 rounded text-center capitalize">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('success-edit-penyakit'))
            <div class="bg-success text-white p-2 rounded text-center capitalize">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('success-add-solution'))
            <div class="bg-success text-white p-2 rounded text-center capitalize">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('success-delete-penyakit'))
            <div class="bg-danger text-white p-2 rounded text-center capitalize">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('server-error'))
            <div class="bg-danger text-white p-2 rounded text-center capitalize">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div
        class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="header_table flex justify-between items-center mb-3">
            <p class="uppercase font-bold">Daftar Penyakit</p>
             <a href="{{ Route('add.penyakit') }}" class="inline-flex items-center rounded-md justify-center gap-2.5 bg-black py-1.5 px-4 text-center
                font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-8">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                </span>
                Tambah Penyakit
            </a>
        </div>
        <div class="overflow-x-auto no-scrollbar">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                        <th
                            class="p-2 whitespace-nowrap text-center font-semibold text-bodydark2 uppercase text-sm dark:text-white">
                            Nama Penyakit
                        </th>
                        <th
                            class="p-2 whitespace-nowrap text-center font-semibold text-bodydark2 uppercase text-sm dark:text-white">
                            Deskripsi Penyakit
                        </th>
                        <th
                            class="p-2 whitespace-nowrap  font-semibold text-bodydark2 uppercase text-sm dark:text-white">

                        </th>
                    </tr>
                </thead>
                <tbody>
                  @if ($penyakit->isNotEmpty())
                      @foreach ($penyakit as $p)
                      <tr>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark text-center">
                            <p class="text-graydark dark:text-white text-sm font-semibold capitalize whitespace-nowrap">{{ $p->nama_penyakit }}</p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark text-center">
                            <p class="text-sm whitespace-nowrap">{{ Str::limit($p->deskripsi, 50) }}</p>
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
                                            <a href="{{ Route('add.penyakit.solution', ['penyakitId' => $p->id]) }}"
                                                class="flex items-center gap-2 text-xs font-medium duration-300 ease-in-out hover:text-meta-6">
                                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[14px] h-[14px]">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12.75c1.148 0 2.278.08 3.383.237 1.037.146 1.866.966 1.866 2.013 0 3.728-2.35 6.75-5.25 6.75S6.75 18.728 6.75 15c0-1.046.83-1.867 1.866-2.013A24.204 24.204 0 0 1 12 12.75Zm0 0c2.883 0 5.647.508 8.207 1.44a23.91 23.91 0 0 1-1.152 6.06M12 12.75c-2.883 0-5.647.508-8.208 1.44.125 2.104.52 4.136 1.153 6.06M12 12.75a2.25 2.25 0 0 0 2.248-2.354M12 12.75a2.25 2.25 0 0 1-2.248-2.354M12 8.25c.995 0 1.971-.08 2.922-.236.403-.066.74-.358.795-.762a3.778 3.778 0 0 0-.399-2.25M12 8.25c-.995 0-1.97-.08-2.922-.236-.402-.066-.74-.358-.795-.762a3.734 3.734 0 0 1 .4-2.253M12 8.25a2.25 2.25 0 0 0-2.248 2.146M12 8.25a2.25 2.25 0 0 1 2.248 2.146M8.683 5a6.032 6.032 0 0 1-1.155-1.002c.07-.63.27-1.222.574-1.747m.581 2.749A3.75 3.75 0 0 1 15.318 5m0 0c.427-.283.815-.62 1.155-.999a4.471 4.471 0 0 0-.575-1.752M4.921 6a24.048 24.048 0 0 0-.392 3.314c1.668.546 3.416.914 5.223 1.082M19.08 6c.205 1.08.337 2.187.392 3.314a23.882 23.882 0 0 1-5.223 1.082" />
                                                </svg>
                                                Solusi Penyakit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('edit.penyakit', ['penyakitId' => $p->id]) }}"
                                                class="flex items-center gap-2 text-xs font-medium duration-300 ease-in-out hover:text-meta-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[14px] h-[14px]">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                                Edit Penyakit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('delete.penyakit', ['penyakitId' => $p->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center gap-2 text-xs font-medium duration-300 ease-in-out hover:text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[14px] h-[14px]">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                    Delete Penyakit
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
            @if ($penyakit->isEmpty())
            <div class="empty_project w-full h-48 bg-white flex justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-14 h-14 text-danger">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="mt-3">Tidak ada project yang dibuat!</p>
                    <a href="{{ Route('add.gejala') }}"
                        class="py-1.5 px-6 mt-2 rounded bg-boxdark hover:bg-bodydark2 transition-colors text-gray">Tambah Gejala</a>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="pagination mt-5">
        {{ $penyakit->links('vendor.pagination.simple-tailwind') }}
    </div>
</section>
@endsection