<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $registration->title }} - HIMA TI UNDIKNAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-2xl mx-auto py-12 px-4">
        <a href="/" class="text-yellow-600 hover:underline mb-6 inline-block">&larr; Kembali ke Beranda</a>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            @if($registration->banner_url)
                <img src="{{ $registration->banner_url }}" class="w-full h-48 object-cover" alt="">
            @endif

            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $registration->title }}</h1>

                @if($registration->description)
                    <p class="text-gray-600 mb-4">{{ $registration->description }}</p>
                @endif

                <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                    @if($registration->open_date && $registration->close_date)
                        <span>📅 {{ $registration->open_date->format('d M Y') }} - {{ $registration->close_date->format('d M Y') }}</span>
                    @endif
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-300 text-green-800 p-4 rounded-xl mb-6">
                        ✅ {{ session('success') }}
                    </div>
                @else
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-300 text-red-800 p-4 rounded-xl mb-6">
                            <ul class="list-disc pl-4">
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('registrations.store', $registration->slug) }}"
                          enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        @foreach($registration->form_fields as $field)
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">
                                    {{ $field['label'] }}
                                    @if(!empty($field['required']))
                                        <span class="text-red-500">*</span>
                                    @endif
                                </label>

                                @switch($field['type'])
                                    @case('textarea')
                                        <textarea name="fields[{{ $field['name'] }}]"
                                                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                                  rows="4" {{ !empty($field['required']) ? 'required' : '' }}>{{ old('fields.' . $field['name']) }}</textarea>
                                        @break

                                    @case('select')
                                        <select name="fields[{{ $field['name'] }}]"
                                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-yellow-400"
                                                {{ !empty($field['required']) ? 'required' : '' }}>
                                            <option value="">-- Pilih --</option>
                                            @foreach($field['options'] ?? [] as $opt)
                                                <option value="{{ $opt }}" @selected(old('fields.' . $field['name']) === $opt)>{{ $opt }}</option>
                                            @endforeach
                                        </select>
                                        @break

                                    @case('file')
                                        <input type="file" name="fields[{{ $field['name'] }}]"
                                               class="w-full border border-gray-300 rounded-lg p-3"
                                               {{ !empty($field['required']) ? 'required' : '' }}>
                                        @break

                                    @default
                                        <input type="{{ $field['type'] }}" name="fields[{{ $field['name'] }}]"
                                               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                               value="{{ old('fields.' . $field['name']) }}"
                                               {{ !empty($field['required']) ? 'required' : '' }}>
                                @endswitch
                            </div>
                        @endforeach

                        <button type="submit"
                                class="w-full py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-bold rounded-xl transition duration-300 shadow-lg">
                            Kirim Pendaftaran
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

</body>
</html>
