<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($member) ? 'Edit Member' : 'Tambah Member' }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow space-y-4">
                @if ($errors->any())
                    <div class="p-3 bg-red-100 rounded">{{ $errors->first() }}</div>
                @endif

                <form method="POST"
                      action="{{ isset($member) ? route('admin.members.update', $member) : route('admin.members.store') }}"
                      enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if(isset($member)) @method('PUT') @endif

                    <div>
                        <label class="block font-semibold">Nama <span class="text-red-500">*</span></label>
                        <input name="name" class="w-full border rounded p-2"
                               value="{{ old('name', $member->name ?? '') }}" required>
                    </div>

                    <div>
                        <label class="block font-semibold">NIM</label>
                        <input name="nim" class="w-full border rounded p-2"
                               value="{{ old('nim', $member->nim ?? '') }}">
                    </div>

                    <div>
                        <label class="block font-semibold">Email</label>
                        <input name="email" type="email" class="w-full border rounded p-2"
                               value="{{ old('email', $member->email ?? '') }}">
                    </div>

                    <div>
                        <label class="block font-semibold">Phone</label>
                        <input name="phone" class="w-full border rounded p-2"
                               value="{{ old('phone', $member->phone ?? '') }}">
                    </div>

                    <div>
                        <label class="block font-semibold">Foto</label>
                        @if(isset($member) && $member->photo)
                            <img src="{{ $member->photo_url }}" class="w-24 h-32 object-cover rounded mb-2" alt="">
                        @endif
                        <input name="photo" type="file" accept="image/*" class="w-full border rounded p-2">
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-black text-white rounded">Simpan</button>
                        <a href="{{ route('admin.members.index') }}" class="px-4 py-2 border rounded">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
