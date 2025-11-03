<div
    class="relative overflow-hidden bg-gradient-to-r from-white via-gray-50 to-[#6041CE]/5 rounded-lg shadow-sm border border-gray-200/50 p-6 group hover:shadow-md transition-all duration-500">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-gradient-to-br from-[#6041CE]/10 via-purple-500/5 to-blue-500/10"></div>
        <svg class="absolute top-0 right-0 w-32 h-32 transform translate-x-16 -translate-y-16 text-[#6041CE]/20"
            fill="currentColor" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="40" />
        </svg>
    </div>

    <div class="relative">
        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex-1">
                <!-- Page Title -->
                <h1
                    class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3 group-hover:text-[#6041CE] transition-colors duration-500 animate-fade-in-fast">
                    {{ $breadcrumb->list[count($breadcrumb->list) - 1] ?? 'Dashboard' }}
                </h1>

                <!-- Enhanced Breadcrumb Navigation -->
                <nav class="flex items-center space-x-1 text-sm" aria-label="Breadcrumb">
                    <div class="flex items-center space-x-2">
                        <!-- Home Icon -->
                        <div
                            class="flex items-center justify-center w-6 h-6 bg-gradient-to-br from-[#6041CE]/20 to-purple-200 rounded-lg group-hover:from-[#6041CE]/30 group-hover:to-purple-300 transition-all duration-500">
                            <svg class="w-3 h-3 text-[#6041CE]" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L8 6.414V17a1 1 0 102 0V6.414l4.293 4.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                        </div>

                        @foreach ($breadcrumb->list as $key => $value)
                            @if ($key == 0)
                                <!-- First item (usually "Home" or "Dashboard") -->
                                <span
                                    class="font-medium text-gray-600 hover:text-[#6041CE] transition-colors duration-500 cursor-default">
                                    {{ $value }}
                                </span>
                            @elseif ($key == count($breadcrumb->list) - 1)
                                <!-- Current page (last item) -->
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-400 animate-pulse-fast" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-semibold bg-gradient-to-r from-[#6041CE] to-purple-600 text-white shadow-sm hover:shadow-md transition-shadow duration-500">
                                        <div class="w-2 h-2 bg-white/30 rounded-full mr-2 animate-pulse-fast"></div>
                                        {{ $value }}
                                    </span>
                                </div>
                            @else
                                <!-- Middle items -->
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="text-gray-500 hover:text-gray-700 transition-colors duration-500 cursor-default font-medium">
                                        {{ $value }}
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </nav>
            </div>

            <!-- Right Side - Page Status or Quick Actions -->
            <div class="flex items-center space-x-3">
                <!-- Current User Welcome (Small) -->
                <div
                    class="hidden xl:flex items-center space-x-2 bg-white/70 backdrop-blur-sm rounded-xl px-4 py-2 border border-gray-200/50 transition-all duration-500 hover:bg-white/90">
                    <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse-fast"></div>
                    <span class="text-xs font-medium text-gray-700">
                        Welcome, {{ explode(' ', Auth::guard('mahasiswa')->user()->nama ?? 'Mahasiswa')[0] }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        /* Fast animations - 0.5s (500ms) */
        @keyframes fade-in-fast {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes breadcrumb-slide-fast {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse-fast {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Apply fast animations */
        .animate-fade-in-fast {
            animation: fade-in-fast 0.5s ease-out;
        }

        .animate-pulse-fast {
            animation: pulse-fast 1s infinite;
        }

        /* Breadcrumb fast animations with stagger */
        nav span,
        nav div {
            animation: breadcrumb-slide-fast 0.5s ease-out forwards;
        }

        nav span:nth-child(1) {
            animation-delay: 0ms;
        }

        nav span:nth-child(2) {
            animation-delay: 50ms;
        }

        nav span:nth-child(3) {
            animation-delay: 100ms;
        }

        nav span:nth-child(4) {
            animation-delay: 150ms;
        }

        nav span:nth-child(5) {
            animation-delay: 200ms;
        }

        nav span:nth-child(6) {
            animation-delay: 250ms;
        }

        /* Fast hover effects */
        nav span:hover {
            transform: translateY(-2px);
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fast entrance animations with reduced stagger timing
            const breadcrumbItems = document.querySelectorAll('nav span, nav div');
            breadcrumbItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateX(-10px)';

                // Faster stagger - 50ms intervals
                setTimeout(() => {
                    item.style.transition =
                        'opacity 0.5s ease, transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                }, index * 50);
            });

            // Log current page for debugging
            const currentPage = document.querySelector('h1')?.textContent;
            if (currentPage) {
                console.log('📍 Current Page:', currentPage);
                console.log('👤 Welcome,',
                    '{{ explode(' ', Auth::guard('mahasiswa')->user()->nama ?? 'Mahasiswa')[0] }}');
            }
        });
    </script>
@endpush
