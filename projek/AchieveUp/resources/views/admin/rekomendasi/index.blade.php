@extends('admin.layouts.app')

@section('title', 'Rekomendasi')

@section('content')
    <div class="mx-auto max-w-full h-full flex flex-col">
        <!-- Modern Header with Gradient -->
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-[#6041CE] to-[#8B5CF6] opacity-10"></div>
            <div class="relative bg-white rounded-lg shadow-md border border-gray-100 mb-6">
                <div class="px-6 py-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 mb-1">Rekomendasi Lomba</h1>
                            <p class="text-gray-600 text-sm">Temukan lomba yang sesuai dengan minat dan kemampuan Anda</p>
                        </div>
                        <div class="hidden md:flex items-center space-x-2">
                            <div
                                class="w-12 h-12 bg-gradient-to-r from-[#6041CE] to-[#8B5CF6] rounded-xl flex items-center justify-center">
                                <i class="fas fa-trophy text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Controls Section -->
        <div class="bg-white rounded-lg shadow-md border border-gray-100 mb-6">
            <div class="px-6 py-5">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <!-- Filter Section -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                        <div class="flex items-center space-x-3">
                            <label for="filter-bidang" class="text-sm font-semibold text-gray-700 whitespace-nowrap">
                                <i class="fas fa-filter mr-2 text-[#6041CE]"></i>Filter Bidang
                            </label>
                            <select id="filter-bidang"
                                class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE]/20 focus:border-[#6041CE] transition-all duration-200 hover:border-gray-400 min-w-[150px]">
                                <option value="">Semua Bidang</option>
                                @foreach ($bidangList ?? [] as $bidang)
                                    <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Search and Action Section -->
                    <div class="flex items-center gap-3 w-full lg:w-auto">
                        <div class="relative flex-1 lg:flex-none lg:min-w-[280px]">
                            <input id="search-bar" type="text" placeholder="Cari nama lomba atau bidang..."
                                class="w-full pl-11 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE]/20 focus:border-[#6041CE] transition-all duration-200 hover:border-gray-400 bg-gray-50 focus:bg-white" />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <a href="{{ route('admin.rekomendasi.list') }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-[#6041CE] to-[#8B5CF6] hover:from-[#4e35a5] hover:to-[#7C3AED] text-white rounded-lg transition-all duration-200 text-sm font-semibold shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                            <i class="fas fa-list mr-2"></i>
                            <span>List Rekomendasi</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Cards Container -->
        <div class="bg-white rounded-lg shadow-md border border-gray-100">
            <div class="p-6">
                <div id="lomba-container" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">
                    @forelse ($lombaAktif as $lomba)
                        <div class="lomba-card group" data-bidang="{{ $lomba->bidang->pluck('id')->join(',') }}"
                            data-title="{{ $lomba->judul }}">
                            <a href="{{ route('admin.lomba.detail', $lomba->id) }}"
                                class="block bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group-hover:border-[#6041CE]/30 transform hover:-translate-y-1">

                                <!-- Card Header with Enhanced Gradient -->
                                <div class="relative p-5 bg-gradient-to-br from-gray-50 to-white">
                                    <div
                                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-[#6041CE]/10 to-transparent rounded-bl-full">
                                    </div>

                                    <div class="relative">
                                        <div class="flex items-center justify-between mb-4">
                                            <span
                                                class="inline-flex px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide
                                                {{ $lomba->tingkat == 'internasional'
                                                    ? 'bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800'
                                                    : ($lomba->tingkat == 'nasional'
                                                        ? 'bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800'
                                                        : ($lomba->tingkat == 'regional'
                                                            ? 'bg-gradient-to-r from-green-100 to-green-200 text-green-800'
                                                            : 'bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800')) }}">
                                                {{ $lomba->tingkat }}
                                            </span>
                                            <div
                                                class="w-8 h-8 bg-gradient-to-r from-amber-400 to-orange-500 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-trophy text-white text-sm"></i>
                                            </div>
                                        </div>

                                        <h3
                                            class="text-lg font-bold text-gray-900 line-clamp-2 h-14 group-hover:text-[#6041CE] transition-colors duration-200">
                                            {{ $lomba->judul }}
                                        </h3>

                                        <!-- Enhanced Bidang Tags -->
                                        <div class="mt-4 flex flex-wrap gap-1.5">
                                            @foreach ($lomba->bidang->take(2) as $bidang)
                                                <span
                                                    class="inline-flex px-2.5 py-1 bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 text-xs font-semibold rounded-md border border-blue-100">
                                                    {{ $bidang->nama }}
                                                </span>
                                            @endforeach
                                            @if ($lomba->bidang->count() > 2)
                                                <span
                                                    class="inline-flex px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-md">
                                                    +{{ $lomba->bidang->count() - 2 }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="px-5 py-4">
                                    <div class="flex items-center text-gray-600 text-sm">
                                        <div class="flex items-center bg-gray-50 rounded-lg px-3 py-2 w-full">
                                            <i class="fas fa-calendar-alt mr-2 text-[#6041CE]"></i>
                                            <span class="font-medium">
                                                {{ \Carbon\Carbon::parse($lomba->tanggal_daftar)->format('d M') }} -
                                                {{ \Carbon\Carbon::parse($lomba->tanggal_daftar_terakhir)->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Enhanced Card Footer -->
                                <div
                                    class="bg-gradient-to-r from-gray-50 to-gray-100 px-5 py-4 flex justify-between items-center border-t border-gray-100">
                                    <div class="flex items-center">
                                        @if (\Carbon\Carbon::parse($lomba->tanggal_daftar_terakhir)->diffInDays(now()) < 7)
                                            <div
                                                class="flex items-center text-red-600 font-semibold text-xs bg-red-50 px-2.5 py-1 rounded-full">
                                                <i class="fas fa-exclamation-triangle mr-1.5"></i>
                                                Segera Ditutup
                                            </div>
                                        @else
                                            <div
                                                class="flex items-center text-green-600 font-semibold text-xs bg-green-50 px-2.5 py-1 rounded-full">
                                                <i class="fas fa-check-circle mr-1.5"></i>
                                                Tersedia
                                            </div>
                                        @endif
                                    </div>
                                    <div
                                        class="flex items-center text-[#6041CE] font-bold text-sm group-hover:text-[#4e35a5]">
                                        <span>Detail</span>
                                        <i
                                            class="fas fa-arrow-right ml-2 text-xs group-hover:translate-x-1 transition-transform duration-200"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full flex flex-col items-center justify-center py-16 text-gray-500">
                            <div
                                class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-trophy text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Tidak Ada Lomba Aktif</h3>
                            <p class="text-sm text-gray-500 text-center max-w-md">
                                Belum ada rekomendasi lomba yang tersedia saat ini. Silakan periksa kembali nanti.
                            </p>
                        </div>
                    @endforelse
                </div>

                <!-- Loading State -->
                <div id="loading-state" class="hidden col-span-full flex justify-center items-center py-12">
                    <div class="flex items-center space-x-3 text-[#6041CE]">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#6041CE]"></div>
                        <span class="text-sm font-medium">Memuat data...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .lomba-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .lomba-card:hover {
            transform: translateY(-8px) scale(1.02);
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Custom scrollbar for select */
        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        /* Enhanced focus states */
        input:focus,
        select:focus {
            box-shadow: 0 0 0 3px rgba(96, 65, 206, 0.1);
        }

        /* Smooth animations */
        * {
            scroll-behavior: smooth;
        }

        /* Card hover effects */
        .lomba-card:hover .group-hover\:border-\[#6041CE\]\/30 {
            border-color: rgba(96, 65, 206, 0.3);
        }

        /* Loading animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .lomba-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .lomba-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .lomba-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .lomba-card:nth-child(4) {
            animation-delay: 0.3s;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            let searchTimeout;

            function showLoading() {
                $('#lomba-container').addClass('opacity-50');
                $('#loading-state').removeClass('hidden');
            }

            function hideLoading() {
                $('#lomba-container').removeClass('opacity-50');
                $('#loading-state').addClass('hidden');
            }

            function filterCards() {
                const searchTerm = $('#search-bar').val().toLowerCase().trim();
                const bidangFilter = $('#filter-bidang').val();

                // Show loading state for better UX
                showLoading();

                setTimeout(() => {
                    let visibleCount = 0;

                    $('.lomba-card').each(function() {
                        const card = $(this);
                        const title = card.data('title').toLowerCase();
                        const bidangs = card.data('bidang').toString().split(',');

                        const matchesSearch = !searchTerm || title.includes(searchTerm);
                        const matchesBidang = !bidangFilter || bidangs.includes(bidangFilter);

                        if (matchesSearch && matchesBidang) {
                            card.fadeIn(300);
                            visibleCount++;
                        } else {
                            card.fadeOut(300);
                        }
                    });

                    // Handle no results state
                    setTimeout(() => {
                        $('#no-results').remove();

                        if (visibleCount === 0) {
                            const noResultsHtml = `
                        <div id="no-results" class="col-span-full flex flex-col items-center justify-center py-16 text-gray-500 animate-fadeIn">
                            <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-search text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Tidak Ada Hasil</h3>
                            <p class="text-sm text-gray-500 text-center max-w-md">
                                Tidak ada lomba yang sesuai dengan kriteria pencarian "${searchTerm || 'bidang yang dipilih'}".
                                Coba ubah kata kunci atau filter yang digunakan.
                            </p>
                            <button onclick="clearFilters()" class="mt-4 px-4 py-2 bg-[#6041CE] text-white rounded-lg hover:bg-[#4e35a5] transition-colors duration-200 text-sm font-medium">
                                <i class="fas fa-refresh mr-2"></i>Reset Filter
                            </button>
                        </div>
                    `;
                            $('#lomba-container').append(noResultsHtml);
                        }

                        hideLoading();
                    }, 350);
                }, 200);
            }

            // Clear filters function
            window.clearFilters = function() {
                $('#search-bar').val('');
                $('#filter-bidang').val('');
                filterCards();
            };

            // Debounced search
            $('#search-bar').on('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(filterCards, 300);
            });

            // Immediate filter on select change
            $('#filter-bidang').on('change', filterCards);

            // Add keyboard shortcuts
            $(document).on('keydown', function(e) {
                // Ctrl/Cmd + K to focus search
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    $('#search-bar').focus();
                }

                // Escape to clear search
                if (e.key === 'Escape') {
                    if ($('#search-bar').is(':focus')) {
                        $('#search-bar').blur();
                    } else {
                        clearFilters();
                    }
                }
            });

            // Add search hint
            $('#search-bar').on('focus', function() {
                $(this).attr('placeholder', 'Ketik untuk mencari... (Ctrl+K)');
            }).on('blur', function() {
                $(this).attr('placeholder', 'Cari nama lomba atau bidang...');
            });

            // Enhanced card interactions
            $('.lomba-card').hover(
                function() {
                    $(this).find('i.fa-arrow-right').addClass('text-[#4e35a5] transform translate-x-1');
                },
                function() {
                    $(this).find('i.fa-arrow-right').removeClass('text-[#4e35a5] transform translate-x-1');
                }
            );

            // Analytics tracking (optional)
            $('.lomba-card a').on('click', function() {
                const lombaTitle = $(this).closest('.lomba-card').data('title');
                console.log('Lomba clicked:', lombaTitle);
                // Add your analytics tracking here
            });
        });
    </script>
@endpush
