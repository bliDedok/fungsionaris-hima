<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($gallery) ? 'Edit Foto' : 'Tambah Foto' }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow space-y-4">
                @if ($errors->any())
                    <div class="p-3 bg-red-100 rounded">{{ $errors->first() }}</div>
                @endif

                <form method="POST"
                      action="{{ isset($gallery) ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}"
                      enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if(isset($gallery)) @method('PUT') @endif

                    <div>
                        <label class="block font-semibold">Kategori <span class="text-red-500">*</span></label>
                        <input name="category" class="w-full border rounded p-2"
                               value="{{ old('category', $gallery->category ?? '') }}"
                               list="category-list" required placeholder="mis: IT-VERSARY, SEMINAR">
                        <datalist id="category-list">
                            @foreach($categories ?? [] as $cat)
                                <option value="{{ $cat }}">
                            @endforeach
                        </datalist>
                    </div>

                    <div>
                        <label class="block font-semibold">Program Kerja (opsional)</label>
                        <select name="program_id" class="w-full border rounded p-2">
                            <option value="">-- tidak ada --</option>
                            @foreach($programs as $p)
                                <option value="{{ $p->id }}" @selected(old('program_id', $gallery->program_id ?? '') == $p->id)>{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold">Judul</label>
                        <input name="title" class="w-full border rounded p-2"
                               value="{{ old('title', $gallery->title ?? '') }}">
                    </div>

                    <div>
                        <label class="block font-semibold">Foto {{ isset($gallery) ? '' : '*' }}</label>
                        @if(isset($gallery) && $gallery->image)
                            <img src="{{ $gallery->image_url }}" class="w-32 h-24 object-cover rounded mb-2" alt="">
                        @endif
                        <input name="image" type="file" accept="image/*" class="w-full border rounded p-2"
                               {{ isset($gallery) ? '' : 'required' }}>
                    </div>

                    <div>
                        <label class="block font-semibold">Caption</label>
                        <input name="caption" class="w-full border rounded p-2"
                               value="{{ old('caption', $gallery->caption ?? '') }}">
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-black text-white rounded">Simpan</button>
                        <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2 border rounded">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
