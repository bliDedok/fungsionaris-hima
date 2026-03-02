<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin - Pendaftaran</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <a href="{{ route('admin.registrations.create') }}" class="px-4 py-2 bg-black text-white rounded">Buat Pendaftaran</a>

            <div class="bg-white p-6 rounded shadow mt-4">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="py-2">Judul</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Periode</th>
                            <th class="py-2">Entries</th>
                            <th class="py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $r)
                            <tr class="border-b">
                                <td class="py-2">{{ $r->title }}</td>
                                <td class="py-2">
                                    @if($r->isOpen())
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">BUKA</span>
                                    @else
                                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">TUTUP</span>
                                    @endif
                                </td>
                                <td class="py-2">
                                    {{ $r->open_date?->format('d M Y') ?? '-' }} s/d {{ $r->close_date?->format('d M Y') ?? '-' }}
                                </td>
                                <td class="py-2">{{ $r->entries_count }}</td>
                                <td class="py-2 space-x-2">
                                    <a class="underline text-blue-600" href="{{ route('admin.registrations.entries', $r) }}">Lihat Data</a>
                                    <a class="underline text-blue-600" href="{{ route('admin.registrations.edit', $r) }}">Edit</a>
                                    <form action="{{ route('admin.registrations.destroy', $r) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Hapus pendaftaran ini?')">
                                        @csrf @method('DELETE')
                                        <button class="underline text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
