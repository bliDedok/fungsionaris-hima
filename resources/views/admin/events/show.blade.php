<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Event</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 rounded shadow space-y-3">

        @if(session('success'))
          <div class="p-3 bg-green-100 rounded">{{ session('success') }}</div>
        @endif

        <div><b>Judul:</b> {{ $event->title }}</div>
        <div><b>Tipe:</b> {{ $event->type }}</div>
        <div><b>Mulai:</b> {{ $event->start_at }}</div>
        <div><b>Hanya inti:</b> {{ $event->only_core ? 'Ya' : 'Tidak' }}</div>
        <div><b>Peserta:</b> {{ $participantsCount }}</div>

        <div>
          <b>Absensi:</b>
          @if($event->open_from && $event->open_until)
            ON ({{ $event->open_from }} s/d {{ $event->open_until }})
          @else
            OFF
          @endif
        </div>

        <hr>

        <form method="POST" action="{{ route('admin.events.openAttendance', $event) }}" class="flex gap-2 items-end">
          @csrf
          <div>
            <label class="block text-sm font-semibold">Durasi (menit)</label>
            <input type="number" name="minutes" value="180" class="border rounded p-2 w-32">
          </div>
          <button class="px-4 py-2 bg-black text-white rounded">Buka Absensi</button>
        </form>

        <form method="POST" action="{{ route('admin.events.closeAttendance', $event) }}">
          @csrf
          <button class="mt-2 px-4 py-2 bg-gray-200 rounded">Tutup Absensi</button>
        </form>

        <a class="underline" href="{{ route('admin.events.index') }}">Kembali</a>
      </div>
    </div>
  </div>
</x-app-layout>
