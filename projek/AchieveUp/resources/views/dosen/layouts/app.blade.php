<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Portal Dosen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <meta name="description" content="Sistem Rekomendasi Lomba - Portal Dosen">
    <meta name="author" content="clockingoffbye">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <style>
        /* Smooth scrolling for entire page */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar for main content */
        main::-webkit-scrollbar {
            width: 6px;
        }

        main::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }

        main::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        main::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Loading animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Page transition */
        #main-content {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        #main-content.page-loading {
            opacity: 0.7;
            transform: translateY(10px);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gradient-to-br from-slate-50 via-gray-50 to-indigo-50/30 text-gray-800 antialiased">
    <div class="loading-overlay" id="loadingOverlay">
        <div class="flex flex-col items-center space-y-4">
            <div class="w-12 h-12 border-4 border-indigo-200 border-t-indigo-600 rounded-full animate-spin"></div>
            <div class="text-sm font-medium text-gray-600">Memuat...</div>
        </div>
    </div>

    <div class="flex min-h-screen">
        @include('dosen.layouts.sidebar')

        <div class="flex-1 flex flex-col ml-64 min-h-screen">
            @include('dosen.layouts.header')

            <main class="flex-1 p-6 mt-20 overflow-auto bg-transparent">
                <div class="breadcrumb-container mb-6">
                    @include('dosen.layouts.breadcrumb')
                </div>

                <div id="main-content" class="transition-all duration-300 ease-in-out">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite('resources/js/app.js')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        window.DosenApp = {
            user: {
                name: '{{ Auth::guard('dosen')->user()->nama ?? 'Dosen' }}',
                email: '{{ Auth::guard('dosen')->user()->email ?? '' }}',
                nidn: '{{ Auth::guard('dosen')->user()->nidn ?? '' }}',
                role: 'Dosen'
            },
            config: {
                timezone: 'Asia/Jakarta',
                dateFormat: 'id-ID',
                animationDuration: 500
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const loadingOverlay = document.getElementById('loadingOverlay');
                if (loadingOverlay) {
                    loadingOverlay.classList.remove('active');
                }
            }, 800);

            if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            console.log('Portal Dosen Loaded');
            console.log('User:', window.DosenApp.user.name);
            console.log('Time:', new Date().toLocaleString(window.DosenApp.config.dateFormat, {
                timeZone: window.DosenApp.config.timezone
            }));
        });

        function showLoading() {
            const loadingOverlay = document.getElementById('loadingOverlay');
            const mainContent = document.getElementById('main-content');

            if (loadingOverlay) loadingOverlay.classList.add('active');
            if (mainContent) mainContent.classList.add('page-loading');
        }

        function hideLoading() {
            const loadingOverlay = document.getElementById('loadingOverlay');
            const mainContent = document.getElementById('main-content');

            setTimeout(() => {
                if (loadingOverlay) loadingOverlay.classList.remove('active');
                if (mainContent) mainContent.classList.remove('page-loading');
            }, 200);
        }

        window.addEventListener('beforeunload', function() {
            showLoading();
        });

        $(document).ajaxError(function(event, xhr, settings, error) {
            hideLoading();
            console.error('AJAX Error:', error);

            if (xhr.status === 419) {
                Swal.fire({
                    title: 'Session Expired',
                    text: 'Your session has expired. Please refresh the page.',
                    icon: 'warning',
                    confirmButtonText: 'Refresh',
                    allowOutsideClick: false
                }).then(() => {
                    window.location.reload();
                });
            }
        });

        $(document).ajaxSuccess(function(event, xhr, settings) {
            hideLoading();
        });

        window.showToast = function(type, title, message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'rounded-xl shadow-lg',
                },
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: type,
                title: title,
                text: message
            });
        };
    </script>

    @stack('scripts')
    @stack('js')
</body>

</html>
