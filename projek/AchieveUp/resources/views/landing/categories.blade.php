<section id="categories"
    class="relative section-padding-lg bg-gradient-to-br from-purple-50/50 to-blue-50/50 overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-32 h-32 bg-purple-300 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-40 h-40 bg-blue-300 rounded-full blur-3xl"></div>
    </div>

    <img src="{{ asset('images/absolute1.png') }}" class="absolute left-0 lg:left-96 w-32 opacity-20 animate-float"
        alt="dekorasi">

    <div class="container-main relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <p class="text-purple-600 text-sm lg:text-base font-medium mb-4">Eksplorasi Bidang Prestasi
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                <span class="text-gradient">Bidang Unggulan</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Temukan berbagai bidang pengembangan yang akan membantu Anda mencapai tujuan akademik dan profesional
                Anda.
            </p>
        </div>

        <!-- Fields Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
            @php
                $fields = [
                    ['name' => 'Sains', 'count' => '110', 'color' => 'from-cyan-500 to-blue-500', 'icon' => 'science'],
                    [
                        'name' => 'UI/UX Designer',
                        'count' => '60',
                        'color' => 'from-fuchsia-500 to-purple-400',
                        'icon' => 'uiux',
                    ],
                    [
                        'name' => 'Keamanan Siber',
                        'count' => '42',
                        'color' => 'from-gray-700 to-blue-400',
                        'icon' => 'cyber',
                    ],
                    [
                        'name' => 'Pengembangan Aplikasi',
                        'count' => '87',
                        'color' => 'from-green-400 to-blue-500',
                        'icon' => 'appdev',
                    ],
                    [
                        'name' => 'Data Science',
                        'count' => '74',
                        'color' => 'from-blue-600 to-green-300',
                        'icon' => 'datascience',
                    ],
                    [
                        'name' => 'Business Plan',
                        'count' => '54',
                        'color' => 'from-yellow-400 to-orange-500',
                        'icon' => 'bplan',
                    ],
                    [
                        'name' => 'Teknologi Informasi',
                        'count' => '203',
                        'color' => 'from-teal-500 to-green-500',
                        'icon' => 'tech',
                    ],
                    [
                        'name' => 'Jaringan Komputer',
                        'count' => '69',
                        'color' => 'from-indigo-500 to-blue-500',
                        'icon' => 'network',
                    ],
                ];
            @endphp

            @foreach ($fields as $index => $field)
                <div class="group card-modern p-6 cursor-pointer animate-on-scroll"
                    style="animation-delay: {{ ($index + 1) * 0.07 }}s;">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex-shrink-0 w-16 h-16 bg-gradient-to-br {{ $field['color'] }} rounded-xl flex items-center justify-center text-white shadow-lg group-hover:rotate-12 transition-all duration-300">
                            @switch($field['icon'])
                                @case('science')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="8" />
                                        <path d="M10 2v16M2 10h16" stroke="white" stroke-width="2" />
                                    </svg>
                                @break

                                @case('uiux')
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 20 20">
                                        <rect x="3" y="3" width="14" height="14" rx="3" />
                                        <path d="M3 8h14M3 12h14" />
                                    </svg>
                                @break

                                @case('cyber')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <rect x="2" y="7" width="16" height="10" rx="2" />
                                        <circle cx="10" cy="12" r="2" fill="white" />
                                    </svg>
                                @break

                                @case('appdev')
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 20 20">
                                        <rect x="4" y="4" width="12" height="12" rx="2" />
                                        <path d="M8 8h4v4H8z" />
                                    </svg>
                                @break

                                @case('datascience')
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="8" />
                                        <path d="M10 2v16M2 10h16" />
                                    </svg>
                                @break

                                @case('bplan')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <rect x="4" y="4" width="12" height="6" rx="2" />
                                        <rect x="4" y="12" width="12" height="4" rx="2" />
                                    </svg>
                                @break

                                @case('tech')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <rect x="4" y="4" width="12" height="12" rx="3" />
                                    </svg>
                                @break

                                @case('network')
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 20 20">
                                        <circle cx="6" cy="6" r="2" />
                                        <circle cx="14" cy="6" r="2" />
                                        <circle cx="10" cy="14" r="2" />
                                        <path d="M6 8v2.5l4 3V14m0-3.5l4-3V8" />
                                    </svg>
                                @break
                            @endswitch
                        </div>
                        <div class="flex-1">
                            <h3
                                class="text-lg lg:text-xl font-semibold text-gray-800 group-hover:text-purple-600 transition-colors duration-300">
                                {{ $field['name'] }}
                            </h3>
                            <p class="text-sm lg:text-base text-gray-500">{{ $field['count'] }} Unggahan</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
