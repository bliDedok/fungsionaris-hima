<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($role) ? 'Edit Fungsionaris' : 'Assign Member ke Jabatan' }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow space-y-4">
                @if ($errors->any())
                    <div class="p-3 bg-red-100 rounded">
                        <ul class="list-disc pl-4">
                            @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                    action="{{ isset($role) ? route('admin.member-period-roles.update', $role) : route('admin.member-period-roles.store') }}"
                    class="space-y-4">
                    @csrf
                    @if(isset($role)) @method('PUT') @endif

                    <div>
                        <label class="block font-semibold">Member <span class="text-red-500">*</span></label>
                        <select name="member_id" class="w-full border rounded p-2" required>
                            <option value="">-- pilih member --</option>
                            @foreach($members as $m)
                                <option value="{{ $m->id }}" @selected(old('member_id', $role->member_id ?? '') == $m->id)>
                                    {{ $m->name }} {{ $m->nim ? '(' . $m->nim . ')' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold">Periode <span class="text-red-500">*</span></label>
                        <select name="period_id" class="w-full border rounded p-2" required>
                            <option value="">-- pilih --</option>
                            @foreach($periods as $p)
                                <option value="{{ $p->id }}" @selected(old('period_id', $role->period_id ?? '') == $p->id)>
                                    {{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold">Jabatan (Position) <span
                                class="text-red-500">*</span></label>
                        <select name="position_id" class="w-full border rounded p-2" required>
                            <option value="">-- pilih --</option>
                            @foreach($positions as $pos)
                                <option value="{{ $pos->id }}" @selected(old('position_id', $role->position_id ?? '') == $pos->id)>{{ $pos->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-600 mt-1">
                            Terdapat batasan: 1 Ketua Umum, 1 Wakil Ketua Umum, 1 Sekretaris Umum,
                            max 2 Sekretaris, max 2 Bendahara; masing‑masing divisi hanya boleh
                            memiliki 1 Koordinator.
                        </p>
                    </div>

                    <div>
                        <label class="block font-semibold">Divisi <span class="text-red-500">*</span></label>
                        <select name="division_id" class="w-full border rounded p-2" required>
                            <option value="">-- pilih --</option>
                            @foreach($divisions as $d)
                                <option value="{{ $d->id }}" @selected(old('division_id', $role->division_id ?? '') == $d->id)>{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold">Tanggal Bergabung</label>
                        <input type="date" name="joined_at" class="w-full border rounded p-2"
                            value="{{ old('joined_at', isset($role) && $role->joined_at ? \Carbon\Carbon::parse($role->joined_at)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="flex gap-6">
                        <label class="inline-flex items-center gap-2">
                            <input type="hidden" name="is_core" value="0">
                            <input type="checkbox" name="is_core" value="1" @checked(old('is_core', $role->is_core ?? false))>
                            <span>BPH / Core</span>
                        </label>

                        <label class="inline-flex items-center gap-2">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $role->is_active ?? true))>
                            <span>Aktif</span>
                        </label>
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-black text-white rounded">Simpan</button>
                        <a href="{{ route('admin.member-period-roles.index') }}"
                            class="px-4 py-2 border rounded">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>