<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMA TI UNDIKNAS</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        /* Bingkai Ornamen Fungsionaris */
        .ornate-frame {
            border: 12px solid transparent;
            border-image: url('https://www.transparentpng.com/download/gold-frame/vN1X8X-gold-frame-clipart-transparent.png') 30 stretch;
            filter: drop-shadow(0 10px 10px rgba(0, 0, 0, 0.4));
        }

        /* Swiper Background Config */
        .swiper {
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.35);
        }

        /* Konten di atas Slider */
        .hero-content {
            position: relative;
            z-index: 10;
            pointer-events: none;
        }

        .section-dark {
            background: linear-gradient(180deg, #121212 0%, #000000 100%);
        }

        .swiper-pagination-bullet-active {
            background-color: #eab308;
            box-shadow: 0 0 10px rgba(234, 179, 8, 0.8);
            transform: scale(1.2);
        }

        .swiper-pagination-bullet {
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body class="bg-white text-gray-900 overflow-x-hidden">

    @include('components.navbar')

    {{-- ================================ HERO ================================ --}}
    <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">

        <div class="swiper heroSwiper absolute inset-0 z-0">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/hero/1.png') }}" class="w-full h-full object-cover brightness-[0.35]"
                        alt="Slider 1">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/hero/2.png') }}" class="w-full h-full object-cover brightness-[0.35]"
                        alt="Slider 2">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/hero/3.png') }}" class="w-full h-full object-cover brightness-[0.35]"
                        alt="Slider 3">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/hero/4.png') }}" class="w-full h-full object-cover brightness-[0.35]"
                        alt="Slider 4">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/hero/5.png') }}" class="w-full h-full object-cover brightness-[0.35]"
                        alt="Slider 5">
                </div>
            </div>

            <div class="swiper-button-next !text-yellow-500 !w-10 !h-10 md:!flex hidden"></div>
            <div class="swiper-button-prev !text-yellow-500 !w-10 !h-10 md:!flex hidden"></div>

            <div class="swiper-pagination !bottom-10"></div>
        </div>

        <div class="relative z-10 text-center text-white px-6 pointer-events-none">
            <h1 class="text-4xl md:text-7xl font-bold text-yellow-500 uppercase tracking-tighter drop-shadow-2xl">
                Himpunan Mahasiswa
            </h1>
            <p class="text-lg md:text-2xl mt-4 font-light tracking-widest uppercase text-gray-300">
                Teknologi Informasi Universitas Pendidikan Nasional
            </p>
        </div>
    </section>

    {{-- ================================ ABOUT ================================ --}}
    <section id="about" class="min-h-screen flex items-center py-24 bg-gray-50">
        <div class="container mx-auto px-6">

            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!-- KOLOM KIRI (VIDEO) -->
                <div class="w-full">
                    <div class="aspect-video bg-gray-300 rounded-xl shadow-lg flex items-center justify-center">
                        <iframe class="w-full h-full rounded-xl shadow-lg"
                            src="https://www.youtube.com/embed/JN1hmWrMX8g" title="YouTube video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- KOLOM KANAN (TEXT) -->
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-yellow-500 mb-6">
                        ABOUT US
                    </h2>

                    <p class="text-gray-800 text-lg leading-relaxed mb-4">
                        Himpunan Mahasiswa Teknologi Informasi atau biasa disebut HIMA TI merupakan organisasi
                        kemahasiswaan di lingkungan Program Studi Teknologi Informasi, Fakultas Teknik dan Informatika,
                        Universitas Pendidikan Nasional.
                    </p>

                    <p class="text-gray-600 text-lg leading-relaxed">
                        Kami bukan hanya sekadar organisasi mahasiswa, tetapi ruang tumbuh bagi ide, kreativitas, dan
                        kolaborasi. Bersama, kami belajar, berkembang, dan berkontribusi melalui berbagai program kerja,
                        kegiatan akademik, serta inovasi digital.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ================================ FUNGSIONARIS ================================ --}}
    <section id="fungsionaris" class="min-h-screen flex items-center justify-center py-24 section-dark text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <p class="italic text-yellow-500 text-xl font-serif">Susunan</p>
                <h2 class="text-4xl md:text-6xl font-black tracking-widest uppercase">FUNGSIONARIS</h2>
                @if($activePeriod)
                    <p class="text-gray-400 mt-2">Periode {{ $activePeriod->name }}</p>
                @endif
            </div>

            @if($fungsionaris->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-16 max-w-6xl mx-auto">
                    @foreach($fungsionaris->take(3) as $f)
                        <div class="text-center group">
                            <div class="ornate-frame w-64 h-80 mx-auto mb-6 overflow-hidden bg-gray-800">
                                <img src="{{ $f->member->photo_url }}"
                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                            </div>
                            <h3 class="font-bold text-xl uppercase">{{ $f->member->name }}</h3>
                            <p class="text-yellow-500">{{ $f->position->name ?? '' }}</p>
                        </div>
                    @endforeach
                </div>

                @if($fungsionaris->count() > 3)
                    {{-- Additional functionaries in smaller grid --}}
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-10 max-w-6xl mx-auto mt-16">
                        @foreach($fungsionaris->slice(3) as $f)
                            <div class="text-center group">
                                <div class="ornate-frame w-40 h-52 mx-auto mb-4 overflow-hidden bg-gray-800">
                                    <img src="{{ $f->member->photo_url }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                                </div>
                                <h3 class="font-bold text-sm uppercase">{{ $f->member->name }}</h3>
                                <p class="text-yellow-500 text-xs">{{ $f->position->name ?? '' }}</p>
                                @if($f->division)
                                    <p class="text-gray-400 text-xs">{{ $f->division->name }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <p class="text-center text-gray-400">Data fungsionaris belum tersedia.</p>
            @endif

        </div>
    </section>

    {{-- ================================ PROGRAM KERJA ================================ --}}
    <section id="program-kerja" class="min-h-screen flex items-center justify-center py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <p class="italic text-gray-400 text-xl font-serif">Time Line</p>
                <h2 class="text-4xl md:text-5xl font-bold text-yellow-600 uppercase">PROGRAM KERJA</h2>
            </div>

            {{-- Year tabs --}}
            @if($periods->count() > 0)
                <div class="flex flex-wrap justify-center gap-3 mb-10">
                    @foreach($periods as $idx => $period)
                        <button onclick="showPeriod({{ $period->id }})"
                            class="period-tab px-6 py-2 rounded-full font-bold text-sm border-2 transition-all duration-300
                                   {{ $idx === 0 ? 'bg-gray-900 text-white border-gray-900' : 'bg-white text-gray-800 border-yellow-500 hover:bg-yellow-500 hover:text-white' }}"
                            data-period="{{ $period->id }}">
                            {{ $period->name }}
                        </button>
                    @endforeach
                </div>

                {{-- Programs per period --}}
                @foreach($periods as $idx => $period)
                    <div class="period-content border-[6px] border-yellow-500 p-8 md:p-16 rounded-[40px] max-w-5xl mx-auto relative shadow-2xl {{ $idx === 0 ? '' : 'hidden' }}"
                         data-period="{{ $period->id }}">
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-900 text-white py-3 px-12 rounded-full font-bold text-2xl border-4 border-white">
                            {{ $period->name }}
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                            @php $periodPrograms = $programsByPeriod[$period->id] ?? collect(); @endphp
                            @forelse($periodPrograms as $program)
                                <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                                    <img src="{{ $program->image_url }}"
                                        class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <h4 class="text-white font-bold text-2xl uppercase tracking-widest text-center px-4">{{ $program->name }}</h4>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-400 col-span-2 text-center py-8">Belum ada program kerja untuk periode ini.</p>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-400">Data program kerja belum tersedia.</p>
            @endif
        </div>
    </section>

    {{-- ================================ INFO PENDAFTARAN ================================ --}}
    <section id="info-pendaftaran"
        class="relative bg-gradient-to-b from-gray-700 via-gray-100 to-gray-800 py-20 font-[Poppins]">

        <div class="container mx-auto px-4 md:px-10">

            <div class="mb-16 relative">
                <h2 class="text-white text-5xl md:text-6xl ml-4 md:ml-10 drop-shadow-md font-['Great_Vibes']">
                    Info Pendaftaran
                </h2>
                <div class="w-full h-1 bg-blue-500 mt-4 shadow-[0_0_10px_rgba(59,130,246,0.8)]"></div>
            </div>

            @if($registrations->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-20 gap-x-8">
                    @foreach($registrations as $reg)
                        <div class="relative group">
                            <div class="bg-white rounded-[30px] h-64 p-5 flex flex-col justify-between border border-gray-200 shadow-lg transition-transform hover:-translate-y-1 duration-300 z-0">
                                @if($reg->banner_url)
                                    <div class="flex-grow bg-gray-100 rounded-t-2xl overflow-hidden">
                                        <img src="{{ $reg->banner_url }}" class="w-full h-full object-cover rounded-t-2xl" alt="">
                                    </div>
                                @else
                                    <div class="flex-grow bg-white rounded-t-2xl flex items-center justify-center">
                                        <p class="text-gray-300 text-4xl font-bold">{{ Str::upper(Str::limit($reg->title, 10)) }}</p>
                                    </div>
                                @endif

                                <div class="flex justify-between items-center mt-4 border-t pt-2 border-gray-100">
                                    <span class="text-xs md:text-sm font-semibold text-gray-800">
                                        @if($reg->open_date && $reg->close_date)
                                            {{ $reg->open_date->format('d M') }} - {{ $reg->close_date->format('d M Y') }}
                                        @else
                                            Selalu Terbuka
                                        @endif
                                    </span>
                                    @if($reg->isOpen())
                                        <a href="{{ route('registrations.show', $reg->slug) }}"
                                            class="flex items-center gap-2 border-2 border-yellow-400 rounded-lg px-4 py-1 text-sm font-bold text-gray-800 hover:bg-yellow-400 transition-colors duration-300">
                                            Join <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    @else
                                        <span class="text-xs text-red-500 font-semibold">Ditutup</span>
                                    @endif
                                </div>
                            </div>
                            <div class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 bg-white border-2 border-yellow-400 rounded-full px-8 py-1 shadow-md z-10 whitespace-nowrap">
                                <span class="text-gray-800 font-bold text-sm uppercase tracking-wide">{{ $reg->title }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-300 text-lg">Belum ada informasi pendaftaran saat ini.</p>
            @endif
        </div>
    </section>

    {{-- ================================ GALLERY ================================ --}}
    <section id="gallery" class="bg-[#F9F9F9] py-20 font-[Poppins]">
        <div class="container mx-auto px-4">

            <div class="relative text-center mb-16 h-24 flex items-center justify-center">
                <span
                    class="absolute text-7xl md:text-9xl font-['Great_Vibes'] text-gray-300 select-none z-0 transform -translate-y-4 md:-translate-y-10">
                    Gallery
                </span>
                <h2
                    class="relative text-5xl md:text-10xl font-black text-yellow-500 z-10 uppercase tracking-tighter drop-shadow-sm">
                    KEGIATAN
                </h2>
            </div>

            <div class="bg-gray-200 border-[8px] border-yellow-400 rounded-[50px] p-6 md:p-12 shadow-xl max-w-7xl mx-auto">

                {{-- Category filter buttons --}}
                <div class="flex flex-wrap justify-center gap-3 md:gap-5 mb-10">
                    <button onclick="filterGallery('all')"
                        class="gallery-filter bg-yellow-400 text-white border-2 border-yellow-400 px-6 py-2 rounded-xl font-bold text-xs md:text-sm transition-all duration-300 shadow-sm uppercase"
                        data-cat="all">
                        SEMUA
                    </button>
                    @foreach($categories as $cat)
                        <button onclick="filterGallery('{{ $cat }}')"
                            class="gallery-filter bg-white border-2 border-yellow-400 px-6 py-2 rounded-xl font-bold text-xs md:text-sm text-gray-800 hover:bg-yellow-400 hover:text-white transition-all duration-300 shadow-sm uppercase"
                            data-cat="{{ $cat }}">
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>

                {{-- Gallery grid --}}
                @if($galleries->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="gallery-grid">
                        @foreach($galleries as $g)
                            <div class="gallery-item group h-56 md:h-64 rounded-2xl overflow-hidden shadow-lg border border-gray-300 relative"
                                 data-category="{{ $g->category }}">
                                <img src="{{ $g->image_url }}"
                                    alt="{{ $g->title ?? $g->category }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-end">
                                    @if($g->caption || $g->title)
                                        <div class="p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            @if($g->title)<p class="font-bold text-sm">{{ $g->title }}</p>@endif
                                            @if($g->caption)<p class="text-xs">{{ $g->caption }}</p>@endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-gray-400 py-8">Belum ada dokumentasi kegiatan.</p>
                @endif

            </div>
        </div>
    </section>


    {{-- ================================ FOOTER ================================ --}}
    <footer id="contact" class="bg-white pt-24 pb-12 border-t-8 border-yellow-500">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-16 text-sm">
            <div class="space-y-6">
                <h2 class="font-black text-2xl tracking-tighter">HIMA TI UNDIKNAS</h2>
                <p class="text-gray-500">Ruang tumbuh bagi ide, kreativitas, dan kolaborasi mahasiswa TI.</p>
            </div>
            <div>
                <h4 class="font-bold text-yellow-600 mb-8 uppercase">CONTACT US</h4>
                <ul class="space-y-4 text-gray-600">
                    <li><i class="fas fa-map-marker-alt mr-3 text-yellow-500"></i>JL. Bedugul No.39 Denpasar
                    </li>
                    <li><i class="fas fa-envelope mr-3 text-yellow-500"></i>himatiundiknas@gmail.com</li>
                    <li><i class="fab fa-instagram mr-3 text-yellow-500"></i>@himati_undiknas</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-yellow-600 mb-8 uppercase">QUICK LINKS</h4>
                <ul class="space-y-4 text-gray-600">
                    <li>Home</li>
                    <li>Open Recruitment</li>
                    <li>Susunan Fungsionaris</li>
                    <li>Program Kerja</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-yellow-600 mb-8 uppercase">TERKAIT</h4>
                <ul class="space-y-4 text-gray-600">
                    <li>Universitas Pendidikan Nasional</li>
                    <li>Fakultas Teknik dan Informatika</li>
                    <li>Teknologi Informasi</li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-20 text-gray-400 border-t pt-8">
            &copy; 2026 HIMA TI UNDIKNAS.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // ====== Swiper Hero ======
        var swiper = new Swiper(".heroSwiper", {
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            effect: "slide",
            speed: 1000,
        });

        // ====== Program Kerja Year Tabs ======
        function showPeriod(periodId) {
            // Hide all
            document.querySelectorAll('.period-content').forEach(el => el.classList.add('hidden'));
            // Show selected
            document.querySelector(`.period-content[data-period="${periodId}"]`)?.classList.remove('hidden');

            // Update tab styles
            document.querySelectorAll('.period-tab').forEach(btn => {
                btn.classList.remove('bg-gray-900', 'text-white', 'border-gray-900');
                btn.classList.add('bg-white', 'text-gray-800', 'border-yellow-500');
            });
            const activeTab = document.querySelector(`.period-tab[data-period="${periodId}"]`);
            if (activeTab) {
                activeTab.classList.add('bg-gray-900', 'text-white', 'border-gray-900');
                activeTab.classList.remove('bg-white', 'text-gray-800', 'border-yellow-500');
            }
        }

        // ====== Gallery Filter ======
        function filterGallery(category) {
            const items = document.querySelectorAll('.gallery-item');
            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });

            // Update button styles
            document.querySelectorAll('.gallery-filter').forEach(btn => {
                btn.classList.remove('bg-yellow-400', 'text-white');
                btn.classList.add('bg-white', 'text-gray-800');
            });
            const activeBtn = document.querySelector(`.gallery-filter[data-cat="${category}"]`);
            if (activeBtn) {
                activeBtn.classList.add('bg-yellow-400', 'text-white');
                activeBtn.classList.remove('bg-white', 'text-gray-800');
            }
        }
    </script>

</body>

</html>