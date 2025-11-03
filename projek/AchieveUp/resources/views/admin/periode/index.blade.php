@extends('admin.layouts.app')

@section('title', 'Periode')

@section('content')
    <div class="mx-auto max-w-full h-full flex flex-col">
        <!-- Tab-like header -->
        <div class="flex border-b-0">
            <div
                class="inline-block px-5 py-2.5 text-sm font-medium bg-white border-t border-l border-r border-gray-200 rounded-t-lg text-[#6041CE] font-semibold">
                Data Periode
            </div>
        </div>

        <!-- Controls section -->
        <div class="bg-white border-t border-l border-r border-gray-200 px-6 py-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <label for="show-entry" class="text-sm font-medium text-gray-700">Tampilkan</label>
                    <select id="show-entry"
                        class="appearance-none bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:border-transparent transition-all">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                    </select>
                    <span class="text-sm font-medium text-gray-700">data</span>
                </div>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    <div class="relative flex-1 md:flex-none md:min-w-[240px]">
                        <input id="search-bar" type="text" placeholder="Cari..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:border-transparent transition-all" />
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.periode.create') }}" id="btn-add-periode"
                        class="flex items-center justify-center px-4 py-2 bg-[#6041CE] hover:bg-[#4e35a5] text-white rounded-lg transition-colors duration-200 text-sm font-medium">
                        <i class="fas fa-plus mr-2"></i>
                        <span>Tambah</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table container -->
        <div class="overflow-hidden bg-white shadow-md border border-gray-200 rounded-b-lg">
            <div class="overflow-x-auto">
                <table id="table_periode" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody id="periode-body" class="bg-white divide-y divide-gray-200">
                        <!-- Data will be loaded here -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination controls -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <p id="periode_info" class="text-sm text-gray-600"></p>
                    <div id="periode_pagination" class="flex flex-wrap gap-2"></div>
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

        .status-badge {
            @apply inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium;
        }

        .status-active {
            @apply bg-green-100 text-green-800;
        }

        .status-inactive {
            @apply bg-gray-100 text-gray-800;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            let periodeData = [];
            let currentPage = 1;

            function getStatusConfig(isActive) {
                return {
                    active: {
                        bgClass: 'bg-green-100',
                        textClass: 'text-green-800',
                        icon: 'fas fa-check-circle text-green-500',
                        text: 'Aktif'
                    },
                    inactive: {
                        bgClass: 'bg-gray-100',
                        textClass: 'text-gray-800',
                        icon: 'fas fa-times-circle text-gray-500',
                        text: 'Tidak Aktif'
                    }
                } [isActive ? 'active' : 'inactive'];
            }

            function actionButtonsPeriode(id, isActive) {
                return `
                <div class="flex items-center gap-3">
                    <a href="/admin/periode/detail/${id}" class="action-btn text-blue-600 hover:text-blue-800" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="/admin/periode/edit/${id}" class="action-btn text-amber-600 hover:text-amber-800" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    ${!isActive ? `
                            <button type="button" class="action-btn text-green-600 hover:text-green-800 btn-aktifkan" data-id="${id}" title="Aktifkan">
                                <i class="fas fa-check-circle"></i>
                            </button>
                        ` : ''}
                    <button type="button" class="action-btn text-red-600 hover:text-red-800 btn-hapus" data-id="${id}" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            }

            function renderPeriodeTable() {
                let searchQuery = $('#search-bar').val().toLowerCase();
                let entriesToShow = parseInt($('#show-entry').val()) || 10;
                let tbody = $('#periode-body');

                let filtered = periodeData.filter(item =>
                    Object.values(item).some(val =>
                        val && typeof val === 'string' && val.toLowerCase().includes(searchQuery)
                    )
                );

                // Sort active periods first
                filtered.sort((a, b) => {
                    if (a.is_active && !b.is_active) return -1;
                    if (!a.is_active && b.is_active) return 1;
                    return 0;
                });

                let totalData = filtered.length;
                let totalPages = Math.ceil(totalData / entriesToShow);
                let startIndex = (currentPage - 1) * entriesToShow;
                let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

                tbody.empty();

                if (paginated.length === 0) {
                    tbody.append(`
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-calendar-alt text-gray-300 text-5xl mb-3"></i>
                                <p class="text-lg font-medium mb-1">Tidak ada data periode</p>
                                <p class="text-sm text-gray-400">Belum ada periode yang tersedia saat ini</p>
                            </div>
                        </td>
                    </tr>
                `);
                } else {
                    $.each(paginated, function(index, item) {
                        const statusConfig = getStatusConfig(item.is_active);

                        let row = `
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.id}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div class="truncate max-w-[120px]" title="${item.kode}">${item.kode}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div class="truncate max-w-[200px]" title="${item.nama}">${item.nama}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium
                                    ${statusConfig.bgClass} ${statusConfig.textClass}">
                                    <i class="${statusConfig.icon}"></i>
                                    ${statusConfig.text}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                ${actionButtonsPeriode(item.id, item.is_active)}
                            </td>
                        </tr>
                    `;
                        tbody.append(row);
                    });
                }

                $("#periode_info").text(`Menampilkan ${paginated.length} dari ${totalData} data periode`);

                let paginationHtml = '';
                if (totalPages > 1) {
                    for (let i = 1; i <= totalPages; i++) {
                        paginationHtml += `
                        <button class="px-3 py-1.5 rounded text-sm font-medium transition-colors duration-200
                            ${i === currentPage ? 'bg-[#6041CE] text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700'} 
                            page-btn-periode" data-page="${i}">${i}
                        </button>
                    `;
                    }
                }

                $("#periode_pagination").html(paginationHtml);

                $(".page-btn-periode").off("click").on("click", function() {
                    currentPage = parseInt($(this).data("page"));
                    renderPeriodeTable();
                });
            }

            function loadPeriode() {
                $.ajax({
                    url: '/admin/periode/getall',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        periodeData = response;
                        currentPage = 1;
                        renderPeriodeTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading periode:', status, error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal memuat data periode.',
                            timer: 2000
                        });
                        periodeData = [];
                        renderPeriodeTable();
                    }
                });
            }

            // Event handlers
            $('#search-bar').on('input', function() {
                currentPage = 1;
                renderPeriodeTable();
            });

            $('#show-entry').on('change', function() {
                currentPage = 1;
                renderPeriodeTable();
            });

            // Activate periode
            $(document).on('click', '.btn-aktifkan', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Aktifkan Periode Ini?',
                    text: 'Periode yang sedang aktif akan dinonaktifkan secara otomatis.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Aktifkan',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#10b981',
                    cancelButtonColor: '#6b7280'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/periode/${id}/activate`,
                            type: 'PUT',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: response.message ||
                                        'Periode berhasil diaktifkan',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                                loadPeriode();
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: xhr.responseJSON?.message ||
                                        'Terjadi kesalahan saat mengaktifkan periode.',
                                });
                            }
                        });
                    }
                });
            });

            // Delete periode
            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Yakin hapus data ini?',
                    text: "Data yang dihapus tidak bisa dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/periode/delete/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: response.message ||
                                        'Data berhasil dihapus',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    loadPeriode();
                                });
                            },
                            error: function(xhr) {
                                let errorMsg = xhr.responseJSON?.message ||
                                    'Terjadi kesalahan saat menghapus data.';
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: errorMsg
                                });
                            }
                        });
                    }
                });
            });

            // Initialize
            window.loadPeriode = loadPeriode;
            loadPeriode();
        });
    </script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
@endpush
