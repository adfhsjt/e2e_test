@php
    $notifUnread = \App\Models\DosenPembimbingRekomendasi::where('dosen_id', Auth::guard('dosen')->id())
        ->where('is_accepted', false)
        ->count();
@endphp

<header class="fixed top-0 left-64 right-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-200/50 shadow-lg">
    <div class="px-6 py-3">
        <div class="flex items-center justify-between">
            <!-- Left side - Brand/Logo section -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    <!-- Logo placeholder -->
                    <div
                        class="w-8 h-8 bg-gradient-to-br from-[#6041CE] to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                    </div>
                    <div class="hidden sm:block">
                        <h1
                            class="text-lg font-bold bg-gradient-to-r from-[#6041CE] to-purple-600 bg-clip-text text-transparent">
                            Portal Dosen
                        </h1>
                        <p class="text-xs text-gray-500">Sistem Rekomendasi Lomba</p>
                    </div>
                </div>
            </div>

            <!-- Right side - User section -->
            <div class="flex items-center space-x-4">
                <!-- Time and Date Display (WIB) -->
                <div class="hidden lg:flex items-center space-x-3 bg-gray-50/80 rounded-lg px-3 py-2">
                    <div class="flex items-center space-x-1 text-sm text-gray-600">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span id="current-time" class="font-mono text-xs">--:--:--</span>
                            <span class="text-xs text-gray-400 ml-1">WIB</span>
                        </div>
                        <div class="w-px h-4 bg-gray-300"></div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span id="current-date" class="text-xs">--/--/----</span>
                        </div>
                    </div>
                </div>

                <!-- Notification Bell -->
                <a href="{{ url('dosen_pembimbing/notifikasi') }}"
                    class="relative flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-[#6041CE]/20 to-purple-200 hover:from-[#6041CE]/30 hover:to-purple-300 transition-all duration-500 shadow-sm hover:shadow-md"
                    title="Notifikasi">
                    <svg class="w-5 h-5 text-[#6041CE]" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                    @if ($notifUnread > 0)
                        <span
                            class="absolute top-0 right-0 w-3 h-3 rounded-full bg-red-600 border-2 border-white animate-pulse"></span>
                    @endif
                </a>

                <!-- User Profile Section -->
                <div class="flex items-center space-x-3">
                    <!-- User info (hidden on mobile) -->
                    <div class="hidden sm:flex flex-col text-right leading-tight">
                        <span class="text-sm font-semibold text-gray-800 truncate max-w-32">
                            {{ Auth::guard('dosen')->user()->nama ?? 'Dosen' }}
                        </span>
                        <span class="text-xs text-gray-500">
                            {{ Auth::guard('dosen')->user()->nidn ?? '-' }}
                        </span>
                    </div>

                    <!-- User dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <!-- User avatar button -->
                        <button @click="open = !open"
                            class="group relative flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-[#6041CE] to-purple-600 hover:from-[#6041CE]/80 hover:to-purple-600/80 shadow-lg hover:shadow-xl transition-all duration-500 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:ring-offset-2">
                            <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                                onerror="this.onerror=null;this.src='{{ asset('images/default-user.png') }}';"
                                alt="User Avatar" class="w-8 h-8 rounded-lg object-cover border-2 border-white/20">

                            <!-- Online indicator -->
                            <div
                                class="absolute -bottom-0.5 -right-0.5 w-3 G1-l h-3 bg-green-400 border-2 border-white rounded-full animate-pulse">
                            </div>

                            <!-- Dropdown arrow -->
                            <div
                                class="absolute -bottom-1 -right-1 w-4 h-4 bg-white rounded-full shadow-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <svg class="w-2 h-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-500"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                            class="absolute right-0 mt-3 w-72 bg-white/95 backdrop-blur-md border border-gray-200/50 rounded-lg shadow-xl z-50 overflow-hidden ring-1 ring-black/5">

                            <!-- User Profile Section -->
                            <div
                                class="p-4 bg-gradient-to-br from-[#6041CE]/10 to-purple-50 border-b border-gray-200/50">
                                <a href="{{ route('dosen.profil.index') }}"
                                    class="group block hover:bg-white/50 rounded-xl p-2 transition-all duration-500">
                                    <div class="flex items-center space-x-3">
                                        <div class="relative">
                                            <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                                                onerror="this.onerror=null;this.src='{{ asset('images/default-user.png') }}';"
                                                alt="User Avatar"
                                                class="w-12 h-12 rounded-xl object-cover border-2 border-white shadow-sm group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 border-2 border-white rounded-full">
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div
                                                class="font-semibold text-gray-900 truncate group-hover:text-[#6041CE] transition-colors duration-500">
                                                {{ Auth::guard('dosen')->user()->nama ?? 'Dosen' }}
                                            </div>
                                            <div class="text-sm text-gray-500 truncate">
                                                {{ Auth::guard('dosen')->user()->email ?? 'dosen@example.com' }}
                                            </div>
                                            <div class="text-xs text-gray-400">
                                                NIDN: {{ Auth::guard('dosen')->user()->nidn ?? '-' }}
                                            </div>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-400 group-hover:text-[#6041CE] transition-colors duration-500"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </a>
                            </div>

                            <!-- Menu Items -->
                            <div class="p-2">
                                <a href="{{ route('dosen.profil.index') }}"
                                    class="group flex items-center space-x-3 w-full px-3 py-2 text-sm text-gray-700 hover:bg-[#6041CE]/10 hover:text-[#6041CE] rounded-lg transition-all duration-500">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center group-hover:from-[#6041CE]/20 group-hover:to-purple-200 transition-all duration-500">
                                        <svg class="w-4 h-4 text-blue-600 group-hover:text-[#6041CE]"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium">Profil Saya</div>
                                        <div class="text-xs text-gray-500">Kelola informasi profil</div>
                                    </div>
                                </a>

                                <div class="border-t border-gray-200/50 my-2"></div>

                                <!-- Logout Button -->
                                <button type="button" id="btn-logout"
                                    class="group flex items-center space-x-3 w-full px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-all duration-500">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-red-100 to-red-200 rounded-lg flex items-center justify-center group-hover:from-red-200 group-hover:to-red-300 transition-all duration-500">
                                        <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 01-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 text-left">
                                        <div class="font-medium">Keluar</div>
                                        <div class="text-xs text-red-500">Logout dari sistem</div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden form for logout -->
    <form id="logout-form" method="GET" action="{{ route('logout') }}" class="hidden">
        @csrf
    </form>
</header>

@push('scripts')
    <script>
        function showLoading() {
            // Create or show a loading overlay that does NOT obscure SweetAlert modals
            let overlay = document.getElementById('custom-loading-overlay');
            if (!overlay) {
                overlay = document.createElement('div');
                overlay.id = 'custom-loading-overlay';
                overlay.style.position = 'fixed';
                overlay.style.top = '0';
                overlay.style.left = '0';
                overlay.style.width = '100vw';
                overlay.style.height = '100vh';
                overlay.style.background = 'rgba(255,255,255,0.4)';
                overlay.style.zIndex = '1040';
                overlay.style.display = 'flex';
                overlay.style.alignItems = 'center';
                overlay.style.justifyContent = 'center';
                overlay.innerHTML = `
            <div class="loader-spinner" style="border: 6px solid #eee; border-top: 6px solid #6041ce; border-radius: 50%; width: 48px; height: 48px; animation: spin 1s linear infinite;"></div>
            <style>
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
            </style>
        `;
                document.body.appendChild(overlay);
            }
            overlay.style.display = 'flex';
        }

        document.addEventListener('DOMContentLoaded', function() {
            function updateDateTime() {
                const now = new Date();

                const wibOffset = 7 * 60; // 7 hours in minutes
                const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
                const wibTime = new Date(utc + (wibOffset * 60000));

                const timeString = wibTime.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                });

                const dateString = wibTime.toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });

                const timeElement = document.getElementById('current-time');
                const dateElement = document.getElementById('current-date');

                if (timeElement) {
                    timeElement.textContent = timeString;
                }

                if (dateElement) {
                    dateElement.textContent = dateString;
                }
            }

            updateDateTime();
            const clockInterval = setInterval(updateDateTime, 1000);

            window.addEventListener('beforeunload', function() {
                clearInterval(clockInterval);
            });

            const btnLogout = document.getElementById('btn-logout');
            if (btnLogout) {
                btnLogout.addEventListener('click', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Konfirmasi Logout',
                        text: 'Apakah Anda yakin ingin keluar dari sistem?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Keluar',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        backdrop: true,
                        allowOutsideClick: false,
                        customClass: {
                            popup: 'rounded-2xl',
                            confirmButton: 'rounded-lg px-6 py-2',
                            cancelButton: 'rounded-lg px-6 py-2'
                        },
                        buttonsStyling: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            showLoading();

                            Swal.fire({
                                title: 'Sedang Logout...',
                                text: 'Mohon tunggu sebentar',
                                icon: 'info',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                customClass: {
                                    popup: 'rounded-2xl'
                                },
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Logout Berhasil',
                                    text: 'Anda telah keluar dari sistem. Terima kasih!',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    showConfirmButton: false,
                                    customClass: {
                                        popup: 'rounded-2xl'
                                    },
                                    willClose: () => {
                                        document.getElementById('logout-form')
                                            .submit();
                                    }
                                });
                            }, 800);
                        }
                    });
                });
            }

            const header = document.querySelector('header');
            if (header) {
                header.style.transform = 'translateY(-100%)';
                header.style.transition = 'transform 0.5s ease-out';

                setTimeout(() => {
                    header.style.transform = 'translateY(0)';
                }, 100);
            }

            console.log('Header initialized with WIB timezone');
        });
    </script>
@endpush
