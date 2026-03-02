<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($registration) ? 'Edit Pendaftaran' : 'Buat Pendaftaran' }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow space-y-4">
                @if ($errors->any())
                    <div class="p-3 bg-red-100 rounded">
                        <ul class="list-disc pl-4">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ isset($registration) ? route('admin.registrations.update', $registration) : route('admin.registrations.store') }}"
                      enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if(isset($registration)) @method('PUT') @endif

                    <div>
                        <label class="block font-semibold">Judul Pendaftaran <span class="text-red-500">*</span></label>
                        <input name="title" class="w-full border rounded p-2"
                               value="{{ old('title', $registration->title ?? '') }}" required>
                    </div>

                    <div>
                        <label class="block font-semibold">Deskripsi</label>
                        <textarea name="description" class="w-full border rounded p-2" rows="3">{{ old('description', $registration->description ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-semibold">Banner</label>
                        @if(isset($registration) && $registration->banner)
                            <img src="{{ $registration->banner_url }}" class="w-40 h-24 object-cover rounded mb-2" alt="">
                        @endif
                        <input name="banner" type="file" accept="image/*" class="w-full border rounded p-2">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold">Tanggal Buka</label>
                            <input type="date" name="open_date" class="w-full border rounded p-2"
                                   value="{{ old('open_date', isset($registration) && $registration->open_date ? $registration->open_date->format('Y-m-d') : '') }}">
                        </div>
                        <div>
                            <label class="block font-semibold">Tanggal Tutup</label>
                            <input type="date" name="close_date" class="w-full border rounded p-2"
                                   value="{{ old('close_date', isset($registration) && $registration->close_date ? $registration->close_date->format('Y-m-d') : '') }}">
                        </div>
                    </div>

                    <div>
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="is_active" value="1"
                                   @checked(old('is_active', $registration->is_active ?? true))>
                            <span>Aktif</span>
                        </label>
                    </div>

                    {{-- Dynamic Form Fields Builder --}}
                    <div>
                        <label class="block font-semibold mb-2">Form Fields <span class="text-red-500">*</span></label>
                        <p class="text-sm text-gray-500 mb-3">Tentukan field yang harus diisi pendaftar.</p>

                        <div id="fields-container" class="space-y-3">
                            {{-- Fields will be added by JS --}}
                        </div>

                        <button type="button" onclick="addField()"
                                class="mt-3 px-4 py-2 bg-gray-200 rounded text-sm font-semibold hover:bg-gray-300">
                            + Tambah Field
                        </button>
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-black text-white rounded">Simpan</button>
                        <a href="{{ route('admin.registrations.index') }}" class="px-4 py-2 border rounded">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let fieldIndex = 0;
        const existingFields = @json(old('form_fields', $registration->form_fields ?? []));

        function addField(data = null) {
            const container = document.getElementById('fields-container');
            const i = fieldIndex++;
            const d = data || {name: '', label: '', type: 'text', required: false, options: ''};

            // If options is an array, join it
            const opts = Array.isArray(d.options) ? d.options.join(', ') : (d.options || '');

            const html = `
                <div class="border rounded p-3 bg-gray-50 relative" id="field-${i}">
                    <button type="button" onclick="document.getElementById('field-${i}').remove()"
                            class="absolute top-2 right-2 text-red-500 font-bold">&times;</button>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                        <div>
                            <label class="text-xs font-semibold">Nama Field</label>
                            <input name="form_fields[${i}][name]" class="w-full border rounded p-1 text-sm"
                                   value="${d.name}" placeholder="mis: nama_lengkap" required>
                        </div>
                        <div>
                            <label class="text-xs font-semibold">Label</label>
                            <input name="form_fields[${i}][label]" class="w-full border rounded p-1 text-sm"
                                   value="${d.label}" placeholder="mis: Nama Lengkap" required>
                        </div>
                        <div>
                            <label class="text-xs font-semibold">Tipe</label>
                            <select name="form_fields[${i}][type]" class="w-full border rounded p-1 text-sm" onchange="toggleOptions(this, ${i})">
                                <option value="text" ${d.type==='text'?'selected':''}>Text</option>
                                <option value="email" ${d.type==='email'?'selected':''}>Email</option>
                                <option value="number" ${d.type==='number'?'selected':''}>Number</option>
                                <option value="textarea" ${d.type==='textarea'?'selected':''}>Textarea</option>
                                <option value="select" ${d.type==='select'?'selected':''}>Select (Dropdown)</option>
                                <option value="file" ${d.type==='file'?'selected':''}>File Upload</option>
                            </select>
                        </div>
                        <div class="flex items-end gap-2">
                            <label class="inline-flex items-center gap-1 text-sm">
                                <input type="hidden" name="form_fields[${i}][required]" value="0">
                                <input type="checkbox" name="form_fields[${i}][required]" value="1"
                                       ${d.required ? 'checked' : ''}>
                                Wajib
                            </label>
                        </div>
                    </div>
                    <div id="options-wrap-${i}" class="mt-2" style="display:${d.type==='select'?'block':'none'}">
                        <label class="text-xs font-semibold">Opsi (pisahkan dengan koma)</label>
                        <input name="form_fields[${i}][options]" class="w-full border rounded p-1 text-sm"
                               value="${opts}" placeholder="Pilihan A, Pilihan B, Pilihan C">
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function toggleOptions(el, i) {
            document.getElementById('options-wrap-' + i).style.display = el.value === 'select' ? 'block' : 'none';
        }

        // Load existing fields
        if (existingFields.length > 0) {
            existingFields.forEach(f => addField(f));
        } else {
            // Default fields for new form
            addField({name: 'nama_lengkap', label: 'Nama Lengkap', type: 'text', required: true, options: ''});
            addField({name: 'email', label: 'Email', type: 'email', required: true, options: ''});
            addField({name: 'nim', label: 'NIM', type: 'text', required: true, options: ''});
        }
    </script>
</x-app-layout>
