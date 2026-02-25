<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin - Periode</h2>
      <a href="{{ route('admin.periods.create') }}" class="px-4 py-2 bg-black text-white rounded">Tambah Periode</a>
    </div>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 rounded">{{ session('success') }}</div>
      @endif

      <div class="bg-white p-6 rounded shadow">
        <table class="w-full">
          <thead>
            <tr class="text-left border-b">
              <th class="py-2">Nama</th>
              <th class="py-2">Mulai</th>
              <th class="py-2">Selesai</th>
              <th class="py-2">Status</th>
              <th class="py-2 w-48">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($periods as $p)
              <tr class="border-b">
                <td class="py-2 font-semibold">{{ $p->name }}</td>
                <td class="py-2">{{ $p->start_date?->format('Y-m-d') ?? '-' }}</td>
                <td class="py-2">{{ $p->end_date?->format('Y-m-d') ?? '-' }}</td>
                <td class="py-2">
                  @if($p->is_active)
                    <span class="px-2 py-1 text-xs bg-green-100 rounded">AKTIF</span>
                  @else
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">Nonaktif</span>
                  @endif
                </td>
                <td class="py-2 flex gap-2">
                  <a class="underline" href="{{ route('admin.periods.edit', $p) }}">Edit</a>

                  <form method="POST" action="{{ route('admin.periods.destroy', $p) }}"
                        onsubmit="return confirm('Hapus periode ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="underline text-red-600">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="py-4">Belum ada periode.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>
</x-app-layout>
