@extends('main.layout.app')
@section('title', 'Riwayat Diagnosa Penyakit')
@section('content')
<div class="flex justify-center">
  <div class="md:w-10/12 w-11/12 mt-12">
    <p>Riwayat Hasil Diagnosa : <span class="font-semibold">{{ Auth::user()->fullname }}</span></p>
    <div class="mt-5 shadow-sm border rounded-lg overflow-x-auto">
      @if ($history->isNotEmpty())
        <table class="w-full table-auto text-sm text-left">
          <thead class="text-gray-600 font-medium border-b">
            <tr>
              <th class="py-3 px-6">No</th>
              <th class="py-3 px-6">Hasil Penyakit</th>
              <th class="py-3 px-6">Bobot Probabilitas</th>
              <th class="py-3 px-6">Waktu</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 divide-y">
            @foreach ($history as $h)
            <tr class="odd:bg-gray-50 even:bg-white">
                <td class="px-6 py-4 whitespace-nowrap">{{ ($loop->iteration + ($history->currentPage() - 1) * $history->perPage())  }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $h->hasil_penyakit }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $h->bobot }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $h->created_at->diffForHumans() }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
      <div class="p-2">
        <p class="text-gray-500 font-semibold text-center">Tidak Ada Riwayat Diagnosa</p>
      </div>
      @endif
      </div>
      <div class="mt-4">
        {{ $history->links('vendor.pagination.tailwind') }}
      </div>
    </div>
  </div>
</div>
@endsection