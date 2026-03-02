<nav
    class="fixed inset-x-0 top-0 z-30 mx-auto w-full max-w-screen-md border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-3xl lg:max-w-screen-lg">
    <div class="px-4">
        <div class="relative flex items-center justify-center">

            <!-- Logo kiri -->
            <div class="absolute left-0 flex shrink-0">
                <a href="#" onclick="event.preventDefault(); scrollToSection('home')">
                    <img class="h-7 w-auto" src="{{ asset('assets/img/logo.png') }}" alt="Logo HIMA TI">
                </a>
            </div>

            <!-- Menu tengah -->
            <div class="hidden md:flex items-center gap-6 text-xs md:text-sm">
                <a class="nav-link" href="" onclick="event.preventDefault(); scrollToSection('home')">Home</a>
                <a class="nav-link" href="" onclick="event.preventDefault(); scrollToSection('about')">About</a>
                <a class="nav-link" href=""
                    onclick="event.preventDefault(); scrollToSection('fungsionaris')">Fungsionaris</a>
                <a class="nav-link" href="" onclick="event.preventDefault(); scrollToSection('program-kerja')">Program
                    Kerja</a>
                <a class="nav-link" href="" onclick="event.preventDefault(); scrollToSection('info-pendaftaran')">Info
                    Pendaftaran</a>
                <a class="nav-link" href="" onclick="event.preventDefault(); scrollToSection('gallery')">Gallery</a>
                <a class="nav-link" href="" onclick="event.preventDefault(); scrollToSection('contact')">Contact</a>
            </div>

        </div>
    </div>
</nav>

<script>
    function scrollToSection(id) {
        const section = document.getElementById(id);
        if (!section) return;

        section.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
</script>