<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Events</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset($error)
                <div class="mb-4 p-4 bg-yellow-100 rounded">{{ $error }}</div>
            @endisset

            <div class="bg-white p-6 rounded shadow">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="py-2">Judul</th>
                            <th class="py-2">Waktu</th>
                            <th class="py-2">Status Absensi</th>
                            <th class="py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $e)
                            <tr class="border-b">
                                <td class="py-2">{{ $e->title }}</td>
                                <td class="py-2">{{ $e->start_at }}</td>
                                <td class="py-2">
                                    @php
                                        $a = $e->attendances->firstWhere('member_id', auth()->user()->member?->id);
                                    @endphp
                                    {{ $a?->status ?? '-' }}
                                </td>
                                <td class="py-2">
                                    <a class="underline" href="{{ route('events.show', $e) }}">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="py-4">Belum ada event.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
