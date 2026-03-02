<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin - Members</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <a href="{{ route('admin.members.create') }}" class="px-4 py-2 bg-black text-white rounded">Tambah Member</a>

            <div class="bg-white p-6 rounded shadow mt-4">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="py-2">Foto</th>
                            <th class="py-2">Nama</th>
                            <th class="py-2">NIM</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Phone</th>
                            <th class="py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $m)
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="{{ $m->photo_url }}" class="w-12 h-12 rounded-full object-cover" alt="">
                                </td>
                                <td class="py-2">{{ $m->name }}</td>
                                <td class="py-2">{{ $m->nim ?? '-' }}</td>
                                <td class="py-2">{{ $m->email ?? '-' }}</td>
                                <td class="py-2">{{ $m->phone ?? '-' }}</td>
                                <td class="py-2 space-x-2">
                                    <a class="underline text-blue-600" href="{{ route('admin.members.edit', $m) }}">Edit</a>
                                    <form action="{{ route('admin.members.destroy', $m) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Hapus member ini?')">
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
