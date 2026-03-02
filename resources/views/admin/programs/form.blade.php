<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($program) ? 'Edit Program' : 'Tambah Program' }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow space-y-4">
                @if ($errors->any())
                    <div class="p-3 bg-red-100 rounded">{{ $errors->first() }}</div>
                @endif

                <form method="POST"
                      action="{{ isset($program) ? route('admin.programs.update', $program) : route('admin.programs.store') }}"
                      enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if(isset($program)) @method('PUT') @endif

                    <div>
                        <label class="block font-semibold">Periode <span class="text-red-500">*</span></label>
                        <select name="period_id" class="w-full border rounded p-2" required>
                            <option value="">-- pilih --</option>
                            @foreach($periods as $p)
                                <option value="{{ $p->id }}" @selected(old('period_id', $program->period_id ?? '') == $p->id)>{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold">Divisi</label>
                        <select name="division_id" class="w-full border rounded p-2">
                            <option value="">-- tidak ada --</option>
                            @foreach($divisions as $d)
                                <option value="{{ $d->id }}" @selected(old('division_id', $program->division_id ?? '') == $d->id)>{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold">Nama Program <span class="text-red-500">*</span></label>
                        <input name="name" class="w-full border rounded p-2"
                               value="{{ old('name', $program->name ?? '') }}" required>
                    </div>

                    <div>
                        <label class="block font-semibold">Deskripsi</label>
                        <textarea name="description" class="w-full border rounded p-2" rows="3">{{ old('description', $program->description ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-semibold">Gambar</label>
                        @if(isset($program) && $program->image)
                            <img src="{{ $program->image_url }}" class="w-32 h-20 object-cover rounded mb-2" alt="">
                        @endif
                        <input name="image" type="file" accept="image/*" class="w-full border rounded p-2">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold">Mulai</label>
                            <input type="datetime-local" name="start_at" class="w-full border rounded p-2"
                                   value="{{ old('start_at', isset($program) && $program->start_at ? $program->start_at->format('Y-m-d\TH:i') : '') }}">
                        </div>
                        <div>
                            <label class="block font-semibold">Selesai</label>
                            <input type="datetime-local" name="end_at" class="w-full border rounded p-2"
                                   value="{{ old('end_at', isset($program) && $program->end_at ? $program->end_at->format('Y-m-d\TH:i') : '') }}">
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-black text-white rounded">Simpan</button>
                        <a href="{{ route('admin.programs.index') }}" class="px-4 py-2 border rounded">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
