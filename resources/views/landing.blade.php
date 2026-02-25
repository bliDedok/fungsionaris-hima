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

    <section id="about" class="min-h-screen flex items-center py-24 bg-gray-50">
        <div class="container mx-auto px-6">

            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!-- KOLOM KIRI (VIDEO) -->
                <div class="w-full">
                    <div class="aspect-video bg-gray-300 rounded-xl shadow-lg flex items-center justify-center">
                        <!-- Nanti ganti ini dengan iframe Google Drive -->
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

    <section id="fungsionaris" class="min-h-screen flex items-center justify-center py-24 section-dark text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <p class="italic text-yellow-500 text-xl font-serif">Susunan</p>
                <h2 class="text-4xl md:text-6xl font-black tracking-widest uppercase">FUNGSIONARIS</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 max-w-6xl mx-auto">
                <div class="text-center group">
                    <div class="ornate-frame w-64 h-80 mx-auto mb-6 overflow-hidden bg-gray-800">
                        <img src="https://via.placeholder.com/300x400"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                    </div>
                    <h3 class="font-bold text-xl uppercase">Renald Kevin Azzaky</h3>
                    <p class="text-yellow-500">Ketua Umum</p>
                </div>

                <div class="text-center group">
                    <div class="ornate-frame w-64 h-80 mx-auto mb-6 overflow-hidden bg-gray-800">
                        <img src="https://via.placeholder.com/300x400"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                    </div>
                    <h3 class="font-bold text-xl uppercase">Renald Kevin Azzaky</h3>
                    <p class="text-yellow-500">Wakil Ketua</p>
                </div>

                <div class="text-center group">
                    <div class="ornate-frame w-64 h-80 mx-auto mb-6 overflow-hidden bg-gray-800">
                        <img src="https://via.placeholder.com/300x400"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                    </div>
                    <h3 class="font-bold text-xl uppercase">Renald Kevin Azzoky</h3>
                    <p class="text-yellow-500">Sekretaris Umum</p>
                </div>
            </div>
            <div class="text-center mt-16">
                <a href="#" class="inline-block px-10 py-3 bg-yellow-500 text-black font-semibold uppercase tracking-wider rounded-full transition duration-300
                hover:bg-yellow-400 hover:scale-105 hover:shadow-lg hover:shadow-yellow-500/40">Lihat Selengkapnya</a>
            </div>
        </div>
    </section>

    <section id="program-kerja" class="min-h-screen flex items-center justify-center py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <p class="italic text-gray-400 text-xl font-serif">Time Line</p>
                <h2 class="text-4xl md:text-5xl font-bold text-yellow-600 uppercase">PROGRAM KERJA</h2>
            </div>

            <div
                class="border-[6px] border-yellow-500 p-8 md:p-16 rounded-[40px] max-w-5xl mx-auto relative shadow-2xl">
                <div
                    class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-900 text-white py-3 px-12 rounded-full font-bold text-2xl border-4 border-white">
                    2025</div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                    <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                        <img src="{{ asset('assets/img/program-kerja/it-versary.png')}}"
                            class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h4 class="text-white font-bold text-2xl uppercase tracking-widest">IT-VERSARY</h4>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                        <img src="https://via.placeholder.com/600x400"
                            class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h4 class="text-white font-bold text-2xl uppercase tracking-widest">SEMINAR AKADEMIK</h4>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                        <img src="https://via.placeholder.com/600x400"
                            class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h4 class="text-white font-bold text-2xl uppercase tracking-widest">KERJA SOSIAL
                            </h4>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                        <img src="https://via.placeholder.com/600x400"
                            class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h4 class="text-white font-bold text-2xl uppercase tracking-widest">IT-BOOTCAMP</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative bg-gradient-to-b from-gray-700 via-gray-100 to-gray-800 py-20 font-[Poppins]">

        <div class="container mx-auto px-4 md:px-10">

            <div class="mb-16 relative">
                <h2 class="text-white text-5xl md:text-6xl ml-4 md:ml-10 drop-shadow-md font-['Great_Vibes']">
                    Info Pendaftaran
                </h2>
                <div class="w-full h-1 bg-blue-500 mt-4 shadow-[0_0_10px_rgba(59,130,246,0.8)]"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-20 gap-x-8">

                <div class="relative group">
                    <div
                        class="bg-white rounded-[30px] h-64 p-5 flex flex-col justify-between border border-gray-200 shadow-lg transition-transform hover:-translate-y-1 duration-300 z-0">
                        <div class="flex-grow bg-white rounded-t-2xl"></div>

                        <div class="flex justify-between items-center mt-4 border-t pt-2 border-gray-100">
                            <span class="text-xs md:text-sm font-semibold text-gray-800">
                                01 - 28 February 2026
                            </span>
                            <button
                                class="flex items-center gap-2 border-2 border-yellow-400 rounded-lg px-4 py-1 text-sm font-bold text-gray-800 hover:bg-yellow-400 transition-colors duration-300">
                                Join <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 bg-white border-2 border-yellow-400 rounded-full px-8 py-1 shadow-md z-10 whitespace-nowrap">
                        <span class="text-gray-800 font-bold text-sm uppercase tracking-wide">IT - VERSARY</span>
                    </div>
                </div>

                <div class="relative group">
                    <div
                        class="bg-white rounded-[30px] h-64 p-5 flex flex-col justify-between border border-gray-200 shadow-lg transition-transform hover:-translate-y-1 duration-300">
                        <div class="flex-grow bg-white rounded-t-2xl"></div>
                        <div class="flex justify-between items-center mt-4 border-t pt-2 border-gray-100">
                            <span class="text-xs md:text-sm font-semibold text-gray-800">01 - 28 February 2026</span>
                            <button
                                class="flex items-center gap-2 border-2 border-yellow-400 rounded-lg px-4 py-1 text-sm font-bold text-gray-800 hover:bg-yellow-400 transition-colors duration-300">
                                Join <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 bg-white border-2 border-yellow-400 rounded-full px-8 py-1 shadow-md z-10 whitespace-nowrap">
                        <span class="text-gray-800 font-bold text-sm uppercase tracking-wide">WORKSHOP</span>
                    </div>
                </div>

                <div class="relative group">
                    <div
                        class="bg-white rounded-[30px] h-64 p-5 flex flex-col justify-between border border-gray-200 shadow-lg transition-transform hover:-translate-y-1 duration-300">
                        <div class="flex-grow bg-white rounded-t-2xl"></div>
                        <div class="flex justify-between items-center mt-4 border-t pt-2 border-gray-100">
                            <span class="text-xs md:text-sm font-semibold text-gray-800">01 - 28 February 2026</span>
                            <button
                                class="flex items-center gap-2 border-2 border-yellow-400 rounded-lg px-4 py-1 text-sm font-bold text-gray-800 hover:bg-yellow-400 transition-colors duration-300">
                                Join <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 bg-white border-2 border-yellow-400 rounded-full px-8 py-1 shadow-md z-10 whitespace-nowrap">
                        <span class="text-gray-800 font-bold text-sm uppercase tracking-wide">KERJA SOSIAL</span>
                    </div>
                </div>

                <div class="relative group">
                    <div
                        class="bg-white rounded-[30px] h-64 p-5 flex flex-col justify-between border border-gray-200 shadow-lg transition-transform hover:-translate-y-1 duration-300">
                        <div class="flex-grow bg-white rounded-t-2xl"></div>
                        <div class="flex justify-between items-center mt-4 border-t pt-2 border-gray-100">
                            <span class="text-xs md:text-sm font-semibold text-gray-800">01 - 28 February 2026</span>
                            <button
                                class="flex items-center gap-2 border-2 border-yellow-400 rounded-lg px-4 py-1 text-sm font-bold text-gray-800 hover:bg-yellow-400 transition-colors duration-300">
                                Join <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 bg-white border-2 border-yellow-400 rounded-full px-8 py-1 shadow-md z-10 whitespace-nowrap">
                        <span class="text-gray-800 font-bold text-sm uppercase tracking-wide">WEBINAR</span>
                    </div>
                </div>

                <div class="relative group">
                    <div
                        class="bg-white rounded-[30px] h-64 p-5 flex flex-col justify-between border border-gray-200 shadow-lg transition-transform hover:-translate-y-1 duration-300">
                        <div class="flex-grow bg-white rounded-t-2xl"></div>
                        <div class="flex justify-between items-center mt-4 border-t pt-2 border-gray-100">
                            <span class="text-xs md:text-sm font-semibold text-gray-800">01 - 28 February 2026</span>
                            <button
                                class="flex items-center gap-2 border-2 border-yellow-400 rounded-lg px-4 py-1 text-sm font-bold text-gray-800 hover:bg-yellow-400 transition-colors duration-300">
                                Join <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 bg-white border-2 border-yellow-400 rounded-full px-8 py-1 shadow-md z-10 whitespace-nowrap">
                        <span class="text-gray-800 font-bold text-sm uppercase tracking-wide">SERTIJAB</span>
                    </div>
                </div>

                <div class="relative group">
                    <div
                        class="bg-white rounded-[30px] h-64 p-5 flex flex-col justify-between border border-gray-200 shadow-lg transition-transform hover:-translate-y-1 duration-300">
                        <div class="flex-grow bg-white rounded-t-2xl"></div>
                        <div class="flex justify-between items-center mt-4 border-t pt-2 border-gray-100">
                            <span class="text-xs md:text-sm font-semibold text-gray-800">01 - 28 February 2026</span>
                            <button
                                class="flex items-center gap-2 border-2 border-yellow-400 rounded-lg px-4 py-1 text-sm font-bold text-gray-800 hover:bg-yellow-400 transition-colors duration-300">
                                Join <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 bg-white border-2 border-yellow-400 rounded-full px-8 py-1 shadow-md z-10 whitespace-nowrap">
                        <span class="text-gray-800 font-bold text-sm uppercase tracking-wide">SEMINAR TI</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-[#F9F9F9] py-20 font-[Poppins]">
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

            <div
                class="bg-gray-200 border-[8px] border-yellow-400 rounded-[50px] p-6 md:p-12 shadow-xl max-w-7xl mx-auto">

                <div class="flex flex-wrap justify-center gap-3 md:gap-5 mb-10">
                    <button
                        class="bg-white border-2 border-yellow-400 px-6 py-2 rounded-xl font-bold text-xs md:text-sm text-gray-800 hover:bg-yellow-400 hover:text-white transition-all duration-300 shadow-sm uppercase">
                        IT - VERSARY
                    </button>
                    <button
                        class="bg-white border-2 border-yellow-400 px-6 py-2 rounded-xl font-bold text-xs md:text-sm text-gray-800 hover:bg-yellow-400 hover:text-white transition-all duration-300 shadow-sm uppercase">
                        SEMINAR
                    </button>
                    <button
                        class="bg-white border-2 border-yellow-400 px-6 py-2 rounded-xl font-bold text-xs md:text-sm text-gray-800 hover:bg-yellow-400 hover:text-white transition-all duration-300 shadow-sm uppercase">
                        KERJA SOSIAL
                    </button>
                    <button
                        class="bg-white border-2 border-yellow-400 px-6 py-2 rounded-xl font-bold text-xs md:text-sm text-gray-800 hover:bg-yellow-400 hover:text-white transition-all duration-300 shadow-sm uppercase">
                        IT - BOOTCAMP
                    </button>
                    <button
                        class="bg-white border-2 border-yellow-400 px-6 py-2 rounded-xl font-bold text-xs md:text-sm text-gray-800 hover:bg-yellow-400 hover:text-white transition-all duration-300 shadow-sm uppercase">
                        MONTHLY GATHERING
                    </button>
                    <button
                        class="bg-white border-2 border-yellow-400 px-6 py-2 rounded-xl font-bold text-xs md:text-sm text-gray-800 hover:bg-yellow-400 hover:text-white transition-all duration-300 shadow-sm uppercase">
                        LAINNYA
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div
                        class="group h-56 md:h-64 rounded-2xl overflow-hidden shadow-lg border border-gray-300 relative">
                        <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="IT Versary"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300">
                        </div>
                    </div>

                    <div
                        class="group h-56 md:h-64 rounded-2xl overflow-hidden shadow-lg border border-gray-300 relative">
                        <img src="https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Camping"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300">
                        </div>
                    </div>

                    <div
                        class="group h-56 md:h-64 rounded-2xl overflow-hidden shadow-lg border border-gray-300 relative">
                        <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Seminar Group"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300">
                        </div>
                    </div>

                    <div
                        class="group h-56 md:h-64 rounded-2xl overflow-hidden shadow-lg border border-gray-300 relative">
                        <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Indoor Event"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300">
                        </div>
                    </div>

                    <div
                        class="group h-56 md:h-64 rounded-2xl overflow-hidden shadow-lg border border-gray-300 relative">
                        <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Gathering"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300">
                        </div>
                    </div>

                    <div
                        class="group h-56 md:h-64 rounded-2xl overflow-hidden shadow-lg border border-gray-300 relative">
                        <img src="https://images.unsplash.com/photo-1551818255-e6e10975bc17?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Award"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>



    <footer id="contact" class="bg-white pt-24 pb-12 border-t-8 border-yellow-500">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-16 text-sm">
            <div class="space-y-6">
                <h2 class="font-black text-2xl tracking-tighter">HIMA TI UNDIKNAS</h2>
                <p class="text-gray-500">Ruang tumbuh bagi ide, kreativitas, dan kolaborasi mahasiswa TI.</p>
            </div>
            <div>
                <h4 class="font-bold text-yellow-600 mb-8 uppercase">CONTACT US</h4>
                <ul class="space-y-4 text-gray-600">
                    <li><i class="fas fa-map-marker-alt mr-3 text-yellow-500"></i> JL. Bedugul No.39 Denpasar
                    </li>
                    <li><i class="fas fa-envelope mr-3 text-yellow-500"></i> himatiundiknas@gmail.com</li>
                    <li><i class="fab fa-instagram mr-3 text-yellow-500"></i> @himati_undiknas</li>
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
        var swiper = new Swiper(".heroSwiper", {
            loop: true,
            effect: "fade",
            autoplay: { delay: 4000, disableOnInteraction: false },
            speed: 1500,
        });
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
            var swiper = new Swiper(".heroSwiper", {
                loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 5000, // Geser otomatis tiap 5 detik
            disableOnInteraction: false, // Tetap otomatis meski sudah dipencet manual
                },
            pagination: {
                el: ".swiper-pagination",
            clickable: true, // Titik-titik bisa diklik
                },
            navigation: {
                nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
                },
            effect: "slide", // Gunakan 'slide' untuk efek carousel klasik atau 'fade' untuk transisi halus
            speed: 1000,
            });
    </script>
    </script>
</body>

</html>