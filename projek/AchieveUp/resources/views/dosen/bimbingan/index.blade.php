@extends('dosen.layouts.app')

@section('title', 'Daftar Bimbingan')

@section('content')
    <div class="mx-auto max-w-full h-full flex flex-col">
        <!-- Tab-like header -->
        <div class="flex border-b-0">
            <div
                class="inline-block px-5 py-2.5 text-sm font-medium bg-white border-t border-l border-r border-gray-200 rounded-t-lg text-[#6041CE] font-semibold">
                Mahasiswa Bimbingan
            </div>
        </div>

        <!-- Controls section -->
        <div class="bg-white border-t border-l border-r border-gray-200 px-6 py-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <label for="show-entry" class="text-sm font-medium text-gray-700">Tampilkan</label>
                    <select id="show-entry"
                        class="appearance-none bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:border-transparent transition-all">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                    </select>
                    <span class="text-sm font-medium text-gray-700">data</span>
                </div>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    <div class="relative flex-1 md:flex-none md:min-w-[240px]">
                        <input id="search-bar" type="text" placeholder="Cari mahasiswa..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:border-transparent transition-all" />
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table container -->
        <div class="overflow-hidden bg-white shadow-md border border-gray-200 rounded-b-lg">
            <div class="overflow-x-auto">
                <table id="table_mahasiswa" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Mahasiswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Username</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Program Studi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="bg-white divide-y divide-gray-200">
                        @forelse ($mahasiswaBimbingan as $index => $mahasiswa)
                            <tr class="data-row hover:bg-gray-50 transition-colors" data-index="{{ $index }}"
                                data-search="{{ strtolower($mahasiswa->nim . ' ' . $mahasiswa->nama . ' ' . $mahasiswa->username . ' ' . $mahasiswa->email . ' ' . $mahasiswa->program_studi) }}">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $mahasiswa->nim }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <div class="truncate max-w-[200px]" title="{{ $mahasiswa->nama }}">
                                        {{ $mahasiswa->nama }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <div class="truncate max-w-[150px]" title="{{ $mahasiswa->username }}">
                                        {{ $mahasiswa->username }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <div class="truncate max-w-[200px]" title="{{ $mahasiswa->email }}">
                                        {{ $mahasiswa->email }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <span
                                        class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                        {{ $mahasiswa->program_studi ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('dosen.bimbingan.detail', $mahasiswa->id) }}"
                                            class="action-btn text-blue-600 hover:text-blue-800" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr id="empty-state">
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-users text-gray-300 text-5xl mb-3"></i>
                                        <p class="text-lg font-medium mb-1">Tidak ada mahasiswa bimbingan</p>
                                        <p class="text-sm text-gray-400">Belum ada mahasiswa yang Anda bimbing saat ini</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination controls -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <p id="info-text" class="text-sm text-gray-600">
                        Menampilkan <span id="shown-count">{{ count($mahasiswaBimbingan) }}</span> dari
                        <span id="total-count">{{ count($mahasiswaBimbingan) }}</span> mahasiswa bimbingan
                    </p>
                    <div id="pagination-container" class="flex flex-wrap gap-2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .action-btn {
            @apply inline-flex items-center justify-center h-8 w-8 rounded-full transition-colors duration-200;
        }

        .data-row.hidden {
            display: none !important;
        }

        .pagination-btn {
            @apply px-3 py-1.5 rounded text-sm font-medium transition-colors duration-200;
        }

        .pagination-btn.active {
            @apply bg-[#6041CE] text-white;
        }

        .pagination-btn:not(.active) {
            @apply bg-gray-200 hover:bg-gray-300 text-gray-700;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdown = document.getElementById("show-entry");
            const searchBar = document.getElementById("search-bar");
            const rows = document.querySelectorAll(".data-row");
            const shownCount = document.getElementById("shown-count");
            const totalCount = document.getElementById("total-count");
            const paginationContainer = document.getElementById("pagination-container");
            const emptyState = document.getElementById("empty-state");

            let currentPage = 1;
            let filteredRows = Array.from(rows);

            function filterRows() {
                const searchTerm = searchBar.value.toLowerCase().trim();

                filteredRows = Array.from(rows).filter(row => {
                    const searchData = row.dataset.search;
                    return searchData.includes(searchTerm);
                });

                // Reset to first page when filtering
                currentPage = 1;
                paginateData();
            }

            function paginateData() {
                const perPage = parseInt(dropdown.value);
                const totalData = filteredRows.length;
                const totalPages = Math.ceil(totalData / perPage);

                // Hide all rows first
                rows.forEach(row => row.classList.add('hidden'));

                // Show empty state if no data
                if (totalData === 0) {
                    if (emptyState) {
                        emptyState.classList.remove('hidden');
                        emptyState.innerHTML = `
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-search text-gray-300 text-5xl mb-3"></i>
                                <p class="text-lg font-medium mb-1">Tidak ada hasil ditemukan</p>
                                <p class="text-sm text-gray-400">Coba ubah kata kunci pencarian Anda</p>
                            </div>
                        </td>
                    `;
                    }
                    shownCount.textContent = '0';
                    paginationContainer.innerHTML = '';
                    return;
                } else if (emptyState) {
                    emptyState.classList.add('hidden');
                }

                // Calculate start and end indices
                const startIndex = (currentPage - 1) * perPage;
                const endIndex = Math.min(startIndex + perPage, totalData);

                // Show rows for current page
                for (let i = startIndex; i < endIndex; i++) {
                    if (filteredRows[i]) {
                        filteredRows[i].classList.remove('hidden');
                    }
                }

                // Update info text
                shownCount.textContent = endIndex - startIndex;
                totalCount.textContent = totalData;

                // Generate pagination
                generatePagination(totalPages);
            }

            function generatePagination(totalPages) {
                paginationContainer.innerHTML = '';

                if (totalPages <= 1) return;

                for (let i = 1; i <= totalPages; i++) {
                    const button = document.createElement('button');
                    button.className = `pagination-btn ${i === currentPage ? 'active' : ''}`;
                    button.textContent = i;
                    button.addEventListener('click', () => {
                        currentPage = i;
                        paginateData();
                    });
                    paginationContainer.appendChild(button);
                }
            }

            // Event listeners
            dropdown.addEventListener("change", function() {
                currentPage = 1;
                paginateData();
            });

            searchBar.addEventListener("input", filterRows);

            // Initial load
            paginateData();
        });
    </script>
@endpush
