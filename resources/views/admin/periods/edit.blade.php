<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Periode</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 rounded shadow">

        @if($errors->any())
          <div class="mb-4 p-3 bg-red-100 rounded">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.periods.update', $period) }}" class="space-y-4">
          @csrf
          @method('PUT')

          <div>
            <label class="block font-semibold">Nama</label>
            <input name="name" class="w-full border rounded p-2" value="{{ old('name', $period->name) }}" required>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
              <label class="block font-semibold">Mulai</label>
              <input type="date" name="start_date" class="w-full border rounded p-2"
                     value="{{ old('start_date', $period->start_date?->format('Y-m-d')) }}">
            </div>
            <div>
              <label class="block font-semibold">Selesai</label>
              <input type="date" name="end_date" class="w-full border rounded p-2"
                     value="{{ old('end_date', $period->end_date?->format('Y-m-d')) }}">
            </div>
          </div>

          <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $period->is_active))>
            <span>Jadikan periode aktif</span>
          </label>

          <div class="flex gap-2">
            <button class="px-4 py-2 bg-black text-white rounded">Update</button>
            <a href="{{ route('admin.periods.index') }}" class="underline">Batal</a>
          </div>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>
