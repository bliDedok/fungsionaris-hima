<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin - Galeri Kegiatan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <a href="{{ route('admin.galleries.create') }}" class="px-4 py-2 bg-black text-white rounded">Tambah Foto</a>

            <div class="bg-white p-6 rounded shadow mt-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($galleries as $g)
                        <div class="border rounded overflow-hidden">
                            <img src="{{ $g->image_url }}" class="w-full h-32 object-cover" alt="">
                            <div class="p-2 text-sm">
                                <p class="font-semibold">{{ $g->category }}</p>
                                <p class="text-gray-500 text-xs">{{ $g->title ?? '-' }}</p>
                                <div class="mt-2 flex gap-2">
                                    <a class="underline text-blue-600 text-xs" href="{{ route('admin.galleries.edit', $g) }}">Edit</a>
                                    <form action="{{ route('admin.galleries.destroy', $g) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Hapus foto ini?')">
                                        @csrf @method('DELETE')
                                        <button class="underline text-red-600 text-xs">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
