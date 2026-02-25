<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $event->title }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow space-y-4">
                <div>
                    <div><b>Mulai:</b> {{ $event->start_at }}</div>
                    <div><b>Absensi:</b>
                        @if($event->open_from && $event->open_until)
                            {{ $event->open_from }} s/d {{ $event->open_until }}
                        @else
                            Belum dibuka
                        @endif
                    </div>
                    <div><b>Status kamu:</b> {{ $attendance->status }}</div>
                </div>

                @if(session('success'))
                    <div class="p-3 bg-green-100 rounded">{{ session('success') }}</div>
                @endif
                @if(session('info'))
                    <div class="p-3 bg-blue-100 rounded">{{ session('info') }}</div>
                @endif
                @if($errors->any())
                    <div class="p-3 bg-red-100 rounded">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('events.checkin', $event) }}">
                    @csrf

                    <div class="space-y-2">
                        <p class="font-semibold">Tanda Tangan (wajib):</p>
                        <canvas id="sig" width="520" height="200" style="border:1px solid #ccc; border-radius:8px;"></canvas>
                        <input type="hidden" name="signature" id="signature">
                        <div class="flex gap-2">
                            <button type="button" id="clear" class="px-3 py-2 bg-gray-200 rounded">Hapus</button>
                            <button type="submit" class="px-3 py-2 bg-black text-white rounded">Check-in + Simpan TTD</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script>
        const canvas = document.getElementById('sig');
        const pad = new SignaturePad(canvas);

        document.getElementById('clear').onclick = () => pad.clear();

        document.querySelector('form').addEventListener('submit', (e) => {
            if (pad.isEmpty()) {
                e.preventDefault();
                alert('TTD wajib diisi.');
                return;
            }
            document.getElementById('signature').value = pad.toDataURL('image/png');
        });
    </script>
</x-app-layout>
