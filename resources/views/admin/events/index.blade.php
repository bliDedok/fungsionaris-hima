<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin - Events</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.events.create') }}" class="px-3 py-2 bg-black text-white rounded">Buat Event</a>

            <div class="bg-white p-6 rounded shadow mt-4">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="py-2">Judul</th>
                            <th class="py-2">Tipe</th>
                            <th class="py-2">Mulai</th>
                            <th class="py-2">Absensi</th>
                            <th class="py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $e)
                            <tr class="border-b">
                                <td class="py-2">{{ $e->title }}</td>
                                <td class="py-2">{{ $e->type }}</td>
                                <td class="py-2">{{ $e->start_at }}</td>
                                <td class="py-2">
                                    @if($e->open_from && $e->open_until)
                                        ON
                                    @else
                                        OFF
                                    @endif
                                </td>
                                <td class="py-2">
                                    <a class="underline" href="{{ route('admin.events.show', $e) }}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
