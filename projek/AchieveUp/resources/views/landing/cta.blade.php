<section class="relative section-padding bg-cover bg-center bg-no-repeat overflow-hidden animate-on-scroll"
    style="background-image: linear-gradient(135deg, rgba(96, 65, 206, 0.9), rgba(81, 60, 153, 0.9)), url('{{ asset('images/cta1.png') }}');">

    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full animate-float"></div>
        <div class="absolute bottom-10 right-10 w-16 h-16 bg-white/10 rounded-full animate-float"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-1/4 w-12 h-12 bg-white/10 rounded-full animate-float"
            style="animation-delay: 2s;"></div>
    </div>

    <div class="container-main relative z-10">
        <div
            class="flex flex-col lg:flex-row justify-between items-center text-center lg:text-left gap-8 max-w-6xl mx-auto">
            <div class="flex-1 max-w-2xl">
                <p class="text-white/80 text-lg font-medium mb-4">Siap untuk Berubah?</p>
                <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight mb-6">
                    Siap menjadikan data prestasi sebagai dasar kemajuan kampus?
                </h2>
                <p class="text-xl text-white/90 leading-relaxed">
                    Bergabunglah dengan ribuan mahasiswa yang telah merasakan transformasi digital dalam pencatatan
                    prestasi akademik.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Filled Button -->
                <a href="{{ url('/login') }}"
                    class="group inline-flex items-center gap-3 px-8 py-3 bg-[#FB8500] text-white font-semibold text-lg rounded-md shadow-lg hover:bg-[#e87600] hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <span>Masuk ke Sistem</span>
                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>

                <!-- Outline Button -->
                <button
                    class="inline-flex items-center gap-3 px-8 py-3 border-2 border-[#FB8500] text-[#FB8500] bg-transparent font-semibold text-lg rounded-md hover:bg-[#FB8500] hover:text-white hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    <span>Pelajari Lebih Lanjut</span>
                </button>
            </div>
        </div>
    </div>
</section>
