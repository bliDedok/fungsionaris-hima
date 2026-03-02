<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin - Susunan Fungsionaris</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <div class="flex items-center gap-4 mb-4">
                <a href="{{ route('admin.member-period-roles.create') }}" class="px-4 py-2 bg-black text-white rounded">+ Assign Member</a>

                {{-- Filter by period --}}
                <form method="GET" class="flex items-center gap-2">
                    <select name="period_id" onchange="this.form.submit()" class="border rounded p-2 text-sm">
                        <option value="">Semua Periode</option>
                        @foreach($periods as $p)
                            <option value="{{ $p->id }}" @selected(request('period_id') == $p->id)>{{ $p->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="py-2">Foto</th>
                            <th class="py-2">Nama</th>
                            <th class="py-2">Jabatan</th>
                            <th class="py-2">Divisi</th>
                            <th class="py-2">Periode</th>
                            <th class="py-2">Core</th>
                            <th class="py-2">Aktif</th>
                            <th class="py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $r)
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="{{ $r->member->photo_url }}" class="w-10 h-10 rounded-full object-cover" alt="">
                                </td>
                                <td class="py-2 font-semibold">{{ $r->member->name }}</td>
                                <td class="py-2">{{ $r->position->name ?? '-' }}</td>
                                <td class="py-2">{{ $r->division->name ?? '-' }}</td>
                                <td class="py-2">{{ $r->period->name ?? '-' }}</td>
                                <td class="py-2">
                                    @if($r->is_core) <span class="text-yellow-600 font-bold">⭐</span> @endif
                                </td>
                                <td class="py-2">
                                    @if($r->is_active)
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Aktif</span>
                                    @else
                                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">Non-aktif</span>
                                    @endif
                                </td>
                                <td class="py-2 space-x-2">
                                    <a class="underline text-blue-600" href="{{ route('admin.member-period-roles.edit', $r) }}">Edit</a>
                                    <form action="{{ route('admin.member-period-roles.destroy', $r) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Hapus assignment ini?')">
                                        @csrf @method('DELETE')
                                        <button class="underline text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="py-4 text-gray-400 text-center">Belum ada data fungsionaris.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
