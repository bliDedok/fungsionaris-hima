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
        body { font-family: 'Poppins', sans-serif; scroll-behavior: smooth; }
        
        /* Bingkai Ornamen Fungsionaris */
        .ornate-frame {
            border: 12px solid transparent;
            border-image: url('https://www.transparentpng.com/download/gold-frame/vN1X8X-gold-frame-clipart-transparent.png') 30 stretch;
            filter: drop-shadow(0 10px 10px rgba(0,0,0,0.4));
        }

        /* Swiper Background Config */
        .swiper { width: 100%; height: 100vh; position: absolute; top: 0; left: 0; z-index: 1; }
        .swiper-slide img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.35); }
        
        /* Konten di atas Slider */
        .hero-content { position: relative; z-index: 10; pointer-events: none; }
        
        .section-dark { background: linear-gradient(180deg, #121212 0%, #000000 100%); }
    </style>
</head>
<body class="bg-white text-gray-900 overflow-x-hidden">

<header class="relative min-h-screen flex items-center justify-center overflow-hidden">
    
    <div class="swiper heroSwiper absolute inset-0 z-0">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('img/hero/1.png') }}" class="w-full h-full object-cover brightness-[0.35]" alt="Slider 1">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/hero/2.png') }}" class="w-full h-full object-cover brightness-[0.35]" alt="Slider 2">
            </div>
            <div class="swiper-slide">
                <img src="https://via.placeholder.com/1920x1080/333/fff?text=Slide+3" class="w-full h-full object-cover brightness-[0.35]" alt="Slider 3">
            </div>
            <div class="swiper-slide">
                <img src="https://via.placeholder.com/1920x1080/444/fff?text=Slide+4" class="w-full h-full object-cover brightness-[0.35]" alt="Slider 4">
            </div>
            <div class="swiper-slide">
                <img src="https://via.placeholder.com/1920x1080/555/fff?text=Slide+5" class="w-full h-full object-cover brightness-[0.35]" alt="Slider 5">
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
</header>

    <section class="min-h-screen flex items-center justify-center py-24 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 inline-block border-b-4 border-yellow-500 pb-2">ABOUT US [cite: 5]</h2>
            <div class="max-w-4xl mx-auto space-y-6 text-gray-700 text-lg md:text-xl leading-relaxed">
                <p>
                    Himpunan Mahasiswa Teknologi Informasi atau biasa disebut HIMA TI merupakan organisasi kemahasiswaan di lingkungan Program Studi Teknologi Informasi, Fakultas Teknik dan Informatika, Universitas Pendidikan Nasional[cite: 6].
                </p>
                <p class="text-gray-500">
                    Kami bukan hanya sekadar organisasi mahasiswa, tetapi ruang tumbuh bagi ide, kreativitas, dan kolaborasi[cite: 7]. Bersama, kami belajar, berkembang, dan berkontribusi melalui berbagai program kerja, kegiatan akademik, serta inovasi digital[cite: 8].
                </p>
            </div>
        </div>
    </section>

    <section class="min-h-screen flex items-center justify-center py-24 section-dark text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <p class="italic text-yellow-500 text-xl font-serif">Susunan [cite: 9]</p>
                <h2 class="text-4xl md:text-6xl font-black tracking-widest uppercase">FUNGSIONARIS [cite: 10]</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 max-w-6xl mx-auto">
                <div class="text-center group">
                    <div class="ornate-frame w-64 h-80 mx-auto mb-6 overflow-hidden bg-gray-800">
                        <img src="https://via.placeholder.com/300x400" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                    </div>
                    <h3 class="font-bold text-xl uppercase">Renald Kevin Azzaky [cite: 11]</h3>
                    <p class="text-yellow-500">Ketua Umum [cite: 11]</p>
                </div>

                <div class="text-center group">
                    <div class="ornate-frame w-64 h-80 mx-auto mb-6 overflow-hidden bg-gray-800">
                        <img src="https://via.placeholder.com/300x400" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                    </div>
                    <h3 class="font-bold text-xl uppercase">Renald Kevin Azzaky [cite: 12]</h3>
                    <p class="text-yellow-500">Wakol Ketua [cite: 13]</p>
                </div>

                <div class="text-center group">
                    <div class="ornate-frame w-64 h-80 mx-auto mb-6 overflow-hidden bg-gray-800">
                        <img src="https://via.placeholder.com/300x400" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                    </div>
                    <h3 class="font-bold text-xl uppercase">Renald Kevin Azzoky [cite: 14]</h3>
                    <p class="text-yellow-500">Sekretaris Umum [cite: 14]</p>
                </div>
            </div>
        </div>
    </section>

    <section class="min-h-screen flex items-center justify-center py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <p class="italic text-gray-400 text-xl font-serif">Time Line [cite: 15]</p>
                <h2 class="text-4xl md:text-5xl font-bold text-yellow-600 uppercase">PROGRAM KERJA [cite: 16]</h2>
            </div>

            <div class="border-[6px] border-yellow-500 p-8 md:p-16 rounded-[40px] max-w-5xl mx-auto relative shadow-2xl">
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-900 text-white py-3 px-12 rounded-full font-bold text-2xl border-4 border-white">2025 [cite: 18]</div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                    <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                        <img src="https://via.placeholder.com/600x400" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 flex items-center justify-center"><h4 class="text-white font-bold text-2xl uppercase tracking-widest">IT-VERSARY [cite: 17]</h4></div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                        <img src="https://via.placeholder.com/600x400" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 flex items-center justify-center"><h4 class="text-white font-bold text-2xl uppercase tracking-widest">SEMINAR AKADEMIK [cite: 19]</h4></div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                        <img src="https://via.placeholder.com/600x400" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 flex items-center justify-center"><h4 class="text-white font-bold text-2xl uppercase tracking-widest">KERJA SOSIAL [cite: 20]</h4></div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl h-56 group bg-black">
                        <img src="https://via.placeholder.com/600x400" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 flex items-center justify-center"><h4 class="text-white font-bold text-2xl uppercase tracking-widest">IT-BOOTCAMP [cite: 21]</h4></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="min-h-screen flex items-center justify-center py-24 bg-gray-100">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">
            <div class="md:w-1/3 mb-12 md:mb-0">
                <h2 class="text-4xl font-light italic text-gray-400">Gallery [cite: 22]</h2>
                <h3 class="text-6xl md:text-8xl font-black text-gray-800 uppercase leading-none mt-[-10px]">KEGIATAN [cite: 22]</h3>
            </div>
            <div class="md:w-2/3 w-full grid grid-cols-1 sm:grid-cols-2 gap-x-12">
                @php
                    $gallery = ['IT-VERSARY' => 23, 'SEMINAR' => 24, 'KERJA SOSIAL' => 25, 'IT-BOOTCAMP' => 26, 'MONTHLY GATHERING' => 27, 'LAINNYA' => 28];
                @endphp
                @foreach($gallery as $name => $cite)
                <div class="border-b-2 border-gray-300 py-6 flex justify-between items-center group cursor-pointer hover:border-yellow-500 transition">
                    <span class="text-xl font-bold text-gray-700 group-hover:text-yellow-600 uppercase">{{ $name }}</span>
                    <i class="fas fa-arrow-right text-gray-300 group-hover:text-yellow-500 group-hover:translate-x-2 transition"></i>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-white pt-24 pb-12 border-t-8 border-yellow-500">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-16 text-sm">
            <div class="space-y-6">
                <h2 class="font-black text-2xl tracking-tighter">HIMA TI UNDIKNAS [cite: 31]</h2>
                <p class="text-gray-500">Ruang tumbuh bagi ide, kreativitas, dan kolaborasi mahasiswa TI.</p>
            </div>
            <div>
                <h4 class="font-bold text-yellow-600 mb-8 uppercase">CONTACT US [cite: 32]</h4>
                <ul class="space-y-4 text-gray-600">
                    <li><i class="fas fa-map-marker-alt mr-3 text-yellow-500"></i> JL. Bedugul No.39 Denpasar [cite: 32]</li>
                    <li><i class="fas fa-envelope mr-3 text-yellow-500"></i> shimatiundiknas@gmail.com [cite: 33]</li>
                    <li><i class="fab fa-instagram mr-3 text-yellow-500"></i> @himati_undiknas [cite: 33]</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-yellow-600 mb-8 uppercase">QUICK LINKS [cite: 34]</h4>
                <ul class="space-y-4 text-gray-600">
                    <li>Home [cite: 35]</li>
                    <li>Open Recruitment [cite: 35]</li>
                    <li>Susunan Fungsionaris [cite: 36]</li>
                    <li>Program Kerja [cite: 37]</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-yellow-600 mb-8 uppercase">TERKAIT [cite: 38]</h4>
                <ul class="space-y-4 text-gray-600">
                    <li>Universitas Pendidikan Nasional [cite: 39]</li>
                    <li>Fakultas Teknik dan Informatika [cite: 40]</li>
                    <li>Teknologi Informasi [cite: 41]</li>
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