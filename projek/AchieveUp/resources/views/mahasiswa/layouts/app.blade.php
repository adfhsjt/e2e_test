<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Portal Mahasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- External CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

    <!-- Vite CSS -->
    @vite('resources/css/app.css')

    <!-- Custom Styles -->
    @stack('styles')
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50/30 text-gray-800 antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('mahasiswa.layouts.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col ml-64 transition-all duration-300">
            <!-- Header -->
            @include('mahasiswa.layouts.header')

            <!-- Main Content -->
            <main class="flex-1 p-6 pt-24 overflow-auto">
                <!-- Breadcrumb Section -->
                <div class="breadcrumb mb-6">
                    @include('mahasiswa.layouts.breadcrumb')
                </div>

                <!-- Page Content -->
                <div id="main-content" class="space-y-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Loading Overlay (Optional) -->
    <div id="loading-overlay"
        class="fixed inset-0 bg-white/80 backdrop-blur-sm z-[100] hidden items-center justify-center">
        <div class="flex flex-col items-center space-y-3">
            <div class="w-8 h-8 border-4 border-blue-200 border-t-blue-600 rounded-full animate-spin"></div>
            <p class="text-sm text-gray-600 font-medium">Memuat...</p>
        </div>
    </div>

    <!-- External JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Vite JavaScript -->
    @vite('resources/js/app.js')

    <!-- Global JavaScript Setup -->
    <script>
        // CSRF Token Setup for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Global Loading Functions
        window.showLoading = function() {
            document.getElementById('loading-overlay')?.classList.remove('hidden');
            document.getElementById('loading-overlay')?.classList.add('flex');
        };

        window.hideLoading = function() {
            document.getElementById('loading-overlay')?.classList.add('hidden');
            document.getElementById('loading-overlay')?.classList.remove('flex');
        };

        // Global Toast Notification
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

        // Global Error Handler
        window.addEventListener('error', function(e) {
            console.error('Global Error:', e.error);
        });

        // Page Load Complete
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🎓 Portal Mahasiswa loaded at:', new Date().toLocaleString('id-ID', {
                timeZone: 'Asia/Jakarta'
            }));

            // Hide loading if visible
            setTimeout(() => {
                hideLoading();
            }, 500);
        });
    </script>

    <!-- Custom Scripts -->
    @stack('scripts')
    @stack('js')
</body>

</html>
