<aside
    class="fixed top-0 left-0 h-screen w-64 bg-gradient-to-b from-slate-50 to-white border-r border-slate-200/60 shadow-xl z-30 backdrop-blur-sm transition-transform duration-500 ease-in-out">

    {{-- Mobile Overlay --}}
    <div x-data="{ sidebarOpen: false }" @resize.window="sidebarOpen = window.innerWidth >= 1024 ? false : sidebarOpen"
        class="lg:hidden">
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-20 lg:hidden"
            @click="sidebarOpen = false"></div>
    </div>

    {{-- Logo Section --}}
    <div class="p-6 border-b border-slate-200/50 bg-gradient-to-r from-white to-slate-50/50">
        <div class="flex items-center justify-center group">
            <div class="relative transform transition-transform duration-500 group-hover:scale-105">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="h-10 w-auto drop-shadow-sm transition-all duration-500"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                <div
                    class="hidden w-10 h-10 bg-gradient-to-br from-[#6041CE] to-purple-600 rounded-xl items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z" />
                    </svg>
                </div>

                <div
                    class="absolute -inset-1 bg-gradient-to-r from-[#6041CE]/20 to-purple-500/20 rounded-lg blur opacity-30 group-hover:opacity-50 transition-opacity duration-500">
                </div>
            </div>
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-6 custom-scrollbar">
        {{-- Menu Utama --}}
        <div class="mb-6">
            <div class="flex items-center mb-4">
                <div class="h-px bg-gradient-to-r from-slate-300 to-transparent flex-1"></div>
                <span class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Menu Utama</span>
                <div class="h-px bg-gradient-to-l from-slate-300 to-transparent flex-1"></div>
            </div>

            <ul class="space-y-2">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-500 ease-in-out hover:bg-slate-50 hover:shadow-sm transform hover:scale-[1.02] {{ $activeMenu == 'dashboard' ? 'bg-gradient-to-r from-[#6041CE]/10 to-purple-500/5 text-[#6041CE] border border-[#6041CE]/20 shadow-sm scale-[1.02]' : 'text-slate-700 hover:text-slate-900' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-lg mr-3 transition-all duration-500 {{ $activeMenu == 'dashboard' ? 'bg-[#6041CE]/10 shadow-sm' : 'bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="w-4 h-4 transition-colors duration-500 {{ $activeMenu == 'dashboard' ? 'text-[#6041CE]' : 'text-slate-500 group-hover:text-slate-700' }}"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Dashboard</span>
                        @if ($activeMenu == 'dashboard')
                            <div class="ml-auto w-2 h-2 bg-[#6041CE] rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>
            </ul>
        </div>

        {{-- Menu Lainnya --}}
        <div>
            <div class="flex items-center mb-4">
                <div class="h-px bg-gradient-to-r from-slate-300 to-transparent flex-1"></div>
                <span class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Menu Lainnya</span>
                <div class="h-px bg-gradient-to-l from-slate-300 to-transparent flex-1"></div>
            </div>

            <ul class="space-y-2">
                <li class="nav-item">
                    <a href="{{ route('admin.prestasi.index') }}"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-500 ease-in-out hover:bg-slate-50 hover:shadow-sm transform hover:scale-[1.02] {{ $activeMenu == 'prestasi' ? 'bg-gradient-to-r from-[#6041CE]/10 to-purple-500/5 text-[#6041CE] border border-[#6041CE]/20 shadow-sm scale-[1.02]' : 'text-slate-700 hover:text-slate-900' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-lg mr-3 transition-all duration-500 {{ $activeMenu == 'prestasi' ? 'bg-[#6041CE]/10 shadow-sm' : 'bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="w-4 h-4 transition-colors duration-500 {{ $activeMenu == 'prestasi' ? 'text-[#6041CE]' : 'text-slate-500 group-hover:text-slate-700' }}"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.623 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Verifikasi Prestasi</span>
                        @if ($activeMenu == 'prestasi')
                            <div class="ml-auto w-2 h-2 bg-[#6041CE] rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.rekomendasi.index') }}"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-500 ease-in-out hover:bg-slate-50 hover:shadow-sm transform hover:scale-[1.02] {{ $activeMenu == 'rekomendasi' ? 'bg-gradient-to-r from-[#6041CE]/10 to-purple-500/5 text-[#6041CE] border border-[#6041CE]/20 shadow-sm scale-[1.02]' : 'text-slate-700 hover:text-slate-900' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-lg mr-3 transition-all duration-500 {{ $activeMenu == 'rekomendasi' ? 'bg-[#6041CE]/10 shadow-sm' : 'bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-4 h-4 transition-colors duration-500 {{ $activeMenu == 'rekomendasi' ? 'text-[#6041CE]' : 'text-slate-500 group-hover:text-slate-700' }}"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <span class="font-medium">Rekomendasi Lomba</span>
                        @if ($activeMenu == 'rekomendasi')
                            <div class="ml-auto w-2 h-2 bg-[#6041CE] rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.lomba.index') }}"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-500 ease-in-out hover:bg-slate-50 hover:shadow-sm transform hover:scale-[1.02] {{ $activeMenu == 'lomba' ? 'bg-gradient-to-r from-[#6041CE]/10 to-purple-500/5 text-[#6041CE] border border-[#6041CE]/20 shadow-sm scale-[1.02]' : 'text-slate-700 hover:text-slate-900' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-lg mr-3 transition-all duration-500 {{ $activeMenu == 'lomba' ? 'bg-[#6041CE]/10 shadow-sm' : 'bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-4 h-4 transition-colors duration-500 {{ $activeMenu == 'lomba' ? 'text-[#6041CE]' : 'text-slate-500 group-hover:text-slate-700' }}"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <span class="font-medium">Management Lomba</span>
                        @if ($activeMenu == 'lomba')
                            <div class="ml-auto w-2 h-2 bg-[#6041CE] rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-500 ease-in-out hover:bg-slate-50 hover:shadow-sm transform hover:scale-[1.02] {{ $activeMenu == 'users' ? 'bg-gradient-to-r from-[#6041CE]/10 to-purple-500/5 text-[#6041CE] border border-[#6041CE]/20 shadow-sm scale-[1.02]' : 'text-slate-700 hover:text-slate-900' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-lg mr-3 transition-all duration-500 {{ $activeMenu == 'users' ? 'bg-[#6041CE]/10 shadow-sm' : 'bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-4 h-4 transition-colors duration-500 {{ $activeMenu == 'users' ? 'text-[#6041CE]' : 'text-slate-500 group-hover:text-slate-700' }}"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                        </div>
                        <span class="font-medium">Management Pengguna</span>
                        @if ($activeMenu == 'users')
                            <div class="ml-auto w-2 h-2 bg-[#6041CE] rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.prodi.index') }}"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-500 ease-in-out hover:bg-slate-50 hover:shadow-sm transform hover:scale-[1.02] {{ $activeMenu == 'prodi' ? 'bg-gradient-to-r from-[#6041CE]/10 to-purple-500/5 text-[#6041CE] border border-[#6041CE]/20 shadow-sm scale-[1.02]' : 'text-slate-700 hover:text-slate-900' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-lg mr-3 transition-all duration-500 {{ $activeMenu == 'prodi' ? 'bg-[#6041CE]/10 shadow-sm' : 'bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-4 h-4 transition-colors duration-500 {{ $activeMenu == 'prodi' ? 'text-[#6041CE]' : 'text-slate-500 group-hover:text-slate-700' }}"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                        </div>
                        <span class="font-medium">Management Prodi</span>
                        @if ($activeMenu == 'prodi')
                            <div class="ml-auto w-2 h-2 bg-[#6041CE] rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.periode.index') }}"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-500 ease-in-out hover:bg-slate-50 hover:shadow-sm transform hover:scale-[1.02] {{ $activeMenu == 'periode' ? 'bg-gradient-to-r from-[#6041CE]/10 to-purple-500/5 text-[#6041CE] border border-[#6041CE]/20 shadow-sm scale-[1.02]' : 'text-slate-700 hover:text-slate-900' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-lg mr-3 transition-all duration-500 {{ $activeMenu == 'periode' ? 'bg-[#6041CE]/10 shadow-sm' : 'bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-4 h-4 transition-colors duration-500 {{ $activeMenu == 'periode' ? 'text-[#6041CE]' : 'text-slate-500 group-hover:text-slate-700' }}"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="font-medium">Management Periode</span>
                        @if ($activeMenu == 'periode')
                            <div class="ml-auto w-2 h-2 bg-[#6041CE] rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.bidang.index') }}"
                        class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-500 ease-in-out hover:bg-slate-50 hover:shadow-sm transform hover:scale-[1.02] {{ $activeMenu == 'bidang' ? 'bg-gradient-to-r from-[#6041CE]/10 to-purple-500/5 text-[#6041CE] border border-[#6041CE]/20 shadow-sm scale-[1.02]' : 'text-slate-700 hover:text-slate-900' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-lg mr-3 transition-all duration-500 {{ $activeMenu == 'bidang' ? 'bg-[#6041CE]/10 shadow-sm' : 'bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-4 h-4 transition-colors duration-500 {{ $activeMenu == 'bidang' ? 'text-[#6041CE]' : 'text-slate-500 group-hover:text-slate-700' }}"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <span class="font-medium">Management Bidang</span>
                        @if ($activeMenu == 'bidang')
                            <div class="ml-auto w-2 h-2 bg-[#6041CE] rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>

@push('styles')
    <style>
        /* Custom scrollbar for sidebar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Smooth transitions for all sidebar elements */
        .nav-item a {
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Active menu item subtle animation */
        .nav-item a.scale-\[1\.02\] {
            box-shadow: 0 4px 6px -1px rgba(96, 65, 206, 0.1), 0 2px 4px -1px rgba(96, 65, 206, 0.06);
        }

        /* Logo hover animation */
        .group:hover .absolute {
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                opacity: 0.3;
            }

            to {
                opacity: 0.6;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarItems = document.querySelectorAll('.nav-item');
            sidebarItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateX(-20px)';

                setTimeout(() => {
                    item.style.transition =
                        'opacity 0.5s ease, transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                }, index * 100);
            });

            const currentUrl = window.location.pathname;
            const menuLinks = document.querySelectorAll('.nav-item a');

            menuLinks.forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    link.classList.add('active-menu');
                }
            });

            console.log('Sidebar initialized');
            console.log('Current URL:', currentUrl);
        });
    </script>
@endpush
