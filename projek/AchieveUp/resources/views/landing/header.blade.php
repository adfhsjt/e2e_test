<header class="fixed top-0 left-0 right-0 z-50 w-full h-20 glass-morphism transition-all duration-300">
    <div class="container-main h-full flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center gap-4 lg:gap-14">
            <img src="{{ asset('images/logo.png') }}" class="h-10 hover-scale" alt="Logo AchieveUp">
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-14">
            <a href="#home"
                class="text-gray-500 font-medium text-base transition-all duration-300 hover:text-purple-600 relative group">
                Beranda
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="#categories"
                class="text-gray-500 font-medium text-base transition-all duration-300 hover:text-purple-600 relative group">
                Kategori
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#leaderboard"
                class="text-gray-500 font-medium text-base transition-all duration-300 hover:text-purple-600 relative group">
                Peringkat
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-purple-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
        </nav>

        <!-- Desktop CTA -->
        <div class="hidden lg:flex items-center">
            <a href="{{ url('/login') }}"
                class="px-8 py-2 rounded-md font-semibold text-white text-lg transition-all duration-300 hover:shadow-lg hover:scale-105 active:scale-95 min-w-[180px]"
                style="background: linear-gradient(180deg, #5F40CB 0%, #5039a1 100%);">
                Masuk ke Sistem
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-toggle"
            class="lg:hidden p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-all duration-300">
            <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden absolute top-20 left-0 w-full glass-morphism shadow-xl z-50 transition-all duration-300 transform -translate-y-full opacity-0">
            <div class="flex flex-col gap-4 p-6">
                <a href="#home"
                    class="text-gray-500 font-medium py-2 px-4 rounded-lg hover:bg-white/20 transition-all duration-300">Beranda</a>

                <a href="#categories"
                    class="text-gray-500 font-medium py-2 px-4 rounded-lg hover:bg-white/20 transition-all duration-300">Kategori</a>
                <a href="#leaderboard"
                    class="text-gray-500 font-medium py-2 px-4 rounded-lg hover:bg-white/20 transition-all duration-300">Peringkat</a>
                <div class="mt-4">
                    <a href="{{ url('/login') }}" class="btn-primary w-full text-center block">Masuk ke Sistem</a>
                </div>

            </div>
        </div>
    </div>
</header>

<script>
    const toggleButton = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const toggleIcon = toggleButton.querySelector('svg');

    toggleButton.addEventListener('click', () => {
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.remove('-translate-y-full', 'opacity-0');
                mobileMenu.classList.add('translate-y-0', 'opacity-100');
            }, 10);
            toggleIcon.style.transform = 'rotate(90deg)';
        } else {
            mobileMenu.classList.add('-translate-y-full', 'opacity-0');
            mobileMenu.classList.remove('translate-y-0', 'opacity-100');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
            toggleIcon.style.transform = 'rotate(0deg)';
        }
    });

    // Close mobile menu on resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            mobileMenu.classList.add('hidden', '-translate-y-full', 'opacity-0');
            mobileMenu.classList.remove('translate-y-0', 'opacity-100');
            toggleIcon.style.transform = 'rotate(0deg)';
        }
    });

    // Header background on scroll
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.style.background = 'rgba(255, 255, 255, 0.95)';
        } else {
            header.style.background = 'rgba(255, 255, 255, 0.1)';
        }
    });
</script>
