<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Buat Event</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 rounded shadow space-y-4">

        @if ($errors->any())
          <div class="p-3 bg-red-100 rounded">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.events.store') }}" class="space-y-4">
          @csrf

          <div>
            <label class="block font-semibold">Periode</label>
            <select name="period_id" class="w-full border rounded p-2" required>
              <option value="">-- pilih --</option>
              @foreach($periods as $p)
                <option value="{{ $p->id }}" @selected(old('period_id')==$p->id)>{{ $p->name }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block font-semibold">Tipe</label>
            <select name="type" id="type" class="w-full border rounded p-2" required>
              <option value="FUNCTIONARY_MEETING" @selected(old('type')==='FUNCTIONARY_MEETING')>Rapat Fungsionaris</option>
              <option value="PROGRAM_MEETING" @selected(old('type')==='PROGRAM_MEETING')>Rapat Proker</option>
            </select>
          </div>

          <div id="programWrap" style="display:none;">
            <label class="block font-semibold">Program/Proker</label>
            <select name="program_id" class="w-full border rounded p-2">
              <option value="">-- pilih --</option>
              @foreach($programs as $pr)
                <option value="{{ $pr->id }}" @selected(old('program_id')==$pr->id)>{{ $pr->name }}</option>
              @endforeach
            </select>
            <p class="text-sm text-gray-500 mt-1">Wajib kalau tipe rapat proker.</p>
          </div>

          <div>
            <label class="block font-semibold">Judul</label>
            <input name="title" class="w-full border rounded p-2" value="{{ old('title') }}" required>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
              <label class="block font-semibold">Mulai</label>
              <input type="datetime-local" name="start_at" class="w-full border rounded p-2" value="{{ old('start_at') }}" required>
            </div>
            <div>
              <label class="block font-semibold">Selesai (opsional)</label>
              <input type="datetime-local" name="end_at" class="w-full border rounded p-2" value="{{ old('end_at') }}">
            </div>
          </div>

          <div>
            <label class="inline-flex items-center gap-2">
              <input type="checkbox" name="only_core" value="1" @checked(old('only_core'))>
              <span>Hanya inti</span>
            </label>
          </div>

          <div>
            <label class="block font-semibold">Lokasi (opsional)</label>
            <input name="location" class="w-full border rounded p-2" value="{{ old('location') }}">
          </div>

          <div>
            <label class="block font-semibold">Mode Absensi</label>
            <select name="attendance_mode" class="w-full border rounded p-2">
              <option value="MANUAL" @selected(old('attendance_mode')==='MANUAL')>Manual (klik hadir + TTD)</option>
              <option value="QR" @selected(old('attendance_mode')==='QR')>QR (nanti scan)</option>
            </select>
          </div>

          <button class="px-4 py-2 bg-black text-white rounded">Simpan</button>
          <a href="{{ route('admin.events.index') }}" class="ml-2 underline">Batal</a>
        </form>

      </div>
    </div>
  </div>

  <script>
    const type = document.getElementById('type');
    const wrap = document.getElementById('programWrap');
    function toggle() {
      wrap.style.display = (type.value === 'PROGRAM_MEETING') ? 'block' : 'none';
    }
    toggle();
    type.addEventListener('change', toggle);
  </script>
</x-app-layout>
