<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Pendaftar — {{ $registration->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.registrations.index') }}" class="underline text-blue-600 mb-4 inline-block">&larr; Kembali</a>

            <div class="bg-white p-6 rounded shadow mt-2">
                @if($entries->isEmpty())
                    <p class="text-gray-500">Belum ada pendaftar.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-left border-b">
                                    <th class="py-2 px-2">#</th>
                                    @foreach($registration->form_fields as $field)
                                        <th class="py-2 px-2">{{ $field['label'] }}</th>
                                    @endforeach
                                    <th class="py-2 px-2">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($entries as $idx => $entry)
                                    <tr class="border-b">
                                        <td class="py-2 px-2">{{ $idx + 1 }}</td>
                                        @foreach($registration->form_fields as $field)
                                            <td class="py-2 px-2">
                                                @if($field['type'] === 'file' && !empty($entry->data[$field['name']]))
                                                    <a href="{{ \Illuminate\Support\Facades\Storage::url($entry->data[$field['name']]) }}" target="_blank"
                                                       class="underline text-blue-600">Lihat File</a>
                                                @else
                                                    {{ $entry->data[$field['name']] ?? '-' }}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="py-2 px-2">{{ $entry->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
