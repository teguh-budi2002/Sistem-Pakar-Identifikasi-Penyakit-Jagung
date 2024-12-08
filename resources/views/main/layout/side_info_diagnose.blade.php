<div class="w-full p-2 py-4 outline-1 outline outline-slate-200 flex flex-col items-center space-y-2">
  <img src="https://avatar.iran.liara.run/public/job/farmer/male" class="rounded-full w-20 h-20 mx-auto" alt="img user">
  <p class="font-medium">{{ Auth::user()->fullname }}</p>
  <div class="grid grid-cols-3 w-full">
    <div>
      <p class="text-center">Total Diagnosa</p>
      <p class="text-center text-4xl text-slate-500">{{ $totalDiagnosePerUser }}</p>
    </div>
    <div class="h-20 border-l border-1 border-slate-400 mx-auto"></div>
    <div>
      <p class="text-center">Diagnsoa Terbanyak</p>
      <p class="text-3xl text-center">{{ !empty($mostFrequentDiagnose) ? $mostFrequentDiagnose->hasil_penyakit : 'Belum Ada' }}</p>
    </div>
  </div>
</div>