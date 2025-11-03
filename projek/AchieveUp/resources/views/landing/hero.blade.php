<section id="home" class="relative w-full min-h-screen gradient-soft overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-20 h-20 bg-purple-200/50 rounded-full animate-float"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-blue-200/50 rounded-full animate-float"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-pink-200/50 rounded-full animate-float"
            style="animation-delay: 2s;"></div>
    </div>

    <div class="container-main flex flex-col-reverse lg:flex-row items-center min-h-screen pt-24 pb-16 gap-12 lg:gap-20">
        <!-- Content -->
        <div class="flex-1 flex flex-col items-start gap-6 text-center lg:text-left animate-on-scroll max-w-2xl">
            <p class="text-purple-600 text-sm lg:text-base font-medium">Selamat Datang di AchieveUp</p>

            <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                <span class="text-gradient">Catat</span>
                <span class="text-gray-900">Setiap Prestasi</span><br>
                <span class="text-gradient">Raih</span>
                <span class="text-gray-900">Peringkat Terbaik</span>
            </h1>

            <p class="text-lg lg:text-xl text-gray-600 leading-relaxed">
                Sistem pencatatan prestasi mahasiswa yang membantu melacak, mengevaluasi, dan memeringkat pencapaian
                akademik secara komprehensif.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 w-full justify-center lg:justify-start">
                <button
                    class="px-8 py-3 rounded-md font-semibold text-white text-lg transition-all duration-300 hover:shadow-lg hover:scale-105 active:scale-95 min-w-[180px]"
                    style="background: linear-gradient(180deg, #5F40CB 0%, #5039a1 100%);">
                    Mulai Sekarang
                </button>

                <button
                    class="px-8 py-3 rounded-md font-semibold text-lg transition-all duration-300 hover:shadow-lg hover:scale-105 active:scale-95 min-w-[180px] bg-transparent text-[#5F40CB] hover:bg-[#5F40CB] hover:text-white"
                    style="border: 1px solid #5039a1;">
                    Pelajari Lebih Lanjut
                </button>
            </div>
        </div>

        <!-- Image -->
        <div class="flex-1 flex justify-center lg:justify-end lg:ml-16 items-center animate-on-scroll max-w-lg lg:ml-12"
            style="animation-delay: 0.2s;">
            <div class="relative">
                <img src="{{ asset('images/head_mobile.png') }}" alt="Gambar Hero"
                    class="max-w-full h-64 sm:hidden animate-float">
                <img src="{{ asset('images/mascot v1.png') }}" alt="Gambar Hero"
                    class="w-full max-w-md h-auto hidden sm:block animate-float drop-shadow-2xl">

                <!-- Floating decorative elements -->
                <div class="absolute -top-4 -left-4 w-8 h-8 bg-yellow-400 rounded-full animate-float opacity-80"></div>
                <div class="absolute -bottom-4 -right-4 w-6 h-6 bg-green-400 rounded-full animate-float opacity-80"
                    style="animation-delay: 1.5s;"></div>
                <div class="absolute top-1/4 -right-8 w-4 h-4 bg-red-400 rounded-full animate-float opacity-80"
                    style="animation-delay: 0.5s;"></div>
            </div>
        </div>
    </div>
</section>
