@extends('admin.layouts.app')

@section('title', 'Program Studi')

@section('content')
    <div class="mx-auto max-w-full h-full flex flex-col">
        <!-- Tab-like header -->
        <div class="flex border-b-0">
            <div
                class="inline-block px-5 py-2.5 text-sm font-medium bg-white border-t border-l border-r border-gray-200 rounded-t-lg text-[#6041CE] font-semibold">
                Data Program Studi
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
                        <input id="search-bar" type="text" placeholder="Cari..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:border-transparent transition-all" />
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                    <a href="{{ url('admin/prodi/create') }}" id="btn-add-prodi"
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
                <table id="table_prodi" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Data will be loaded here -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination controls -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <p id="prodi_info" class="text-sm text-gray-600"></p>
                    <div id="prodi_pagination" class="flex flex-wrap gap-2"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                let prodiData = [];
                let currentPage = 1;
                let isLoading = false;

                function actionButtonsProdi(id) {
                    return `
                    <div class="flex items-center space-x-3">
                        <a href="/admin/prodi/${id}" class="action-btn text-blue-600 hover:text-blue-800" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/admin/prodi/edit/${id}" class="action-btn text-amber-600 hover:text-amber-800" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="action-btn text-red-600 hover:text-red-800 btn-hapus" 
                            data-id="${id}" data-type="prodi" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
                }

                function getEmptyState() {
                    return `
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-university text-gray-300 text-5xl mb-3"></i>
                                <p class="text-lg font-medium mb-1">Tidak ada program studi</p>
                                <p class="text-sm text-gray-400">Belum ada data program studi yang tersedia</p>
                            </div>
                        </td>
                    </tr>
                `;
                }

                function showLoading() {
                    isLoading = true;
                    $('#table_prodi tbody').html(`
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center">
                            <div class="flex items-center justify-center">
                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#6041CE]"></div>
                                <span class="ml-2 text-gray-600">Memuat data...</span>
                            </div>
                        </td>
                    </tr>
                `);
                }

                function renderProdiTable() {
                    let searchQuery = $('#search-bar').val().toLowerCase();
                    let entriesToShow = parseInt($('#show-entry').val()) || 5;
                    let tbody = $('#table_prodi tbody');

                    let filtered = prodiData.filter(item =>
                        Object.values(item).some(val => val && typeof val === 'string' && val.toLowerCase()
                            .includes(searchQuery))
                    );

                    let totalData = filtered.length;
                    let totalPages = Math.ceil(totalData / entriesToShow);
                    let startIndex = (currentPage - 1) * entriesToShow;
                    let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

                    tbody.empty();

                    if (paginated.length === 0) {
                        tbody.append(getEmptyState());
                    } else {
                        $.each(paginated, function(index, item) {
                            let row = `
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">${item.id}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.kode}</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="truncate max-w-[300px]" title="${item.nama}">${item.nama}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    ${actionButtonsProdi(item.id)}
                                </td>
                            </tr>
                        `;
                            tbody.append(row);
                        });
                    }

                    $("#prodi_info").text(`Menampilkan ${paginated.length} dari ${totalData} data program studi`);

                    let paginationHtml = '';
                    if (totalPages > 1) {
                        for (let i = 1; i <= totalPages; i++) {
                            paginationHtml += `
                            <button class="px-3 py-1.5 rounded text-sm font-medium transition-colors duration-200
                                ${i === currentPage ? 'bg-[#6041CE] text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700'} 
                                page-btn-prodi" data-page="${i}">${i}
                            </button>
                        `;
                        }
                    }

                    $("#prodi_pagination").html(paginationHtml);

                    $(".page-btn-prodi").off("click").on("click", function() {
                        currentPage = parseInt($(this).data("page"));
                        renderProdiTable();
                    });

                    isLoading = false;
                }

                function loadProdi() {
                    showLoading();
                    $.ajax({
                        url: '/admin/prodi/getall',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            prodiData = response;
                            currentPage = 1;
                            renderProdiTable();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error loading prodi data:', status, error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal memuat data program studi.',
                                timer: 2000
                            });
                            $('#table_prodi tbody').html(`
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-red-500">
                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                    Terjadi kesalahan saat memuat data. Silakan coba lagi.
                                </td>
                            </tr>
                        `);
                            isLoading = false;
                        }
                    });
                }

                $('#search-bar').on('input', function() {
                    if (!isLoading) {
                        currentPage = 1;
                        renderProdiTable();
                    }
                });

                $('#show-entry').on('change', function() {
                    if (!isLoading) {
                        currentPage = 1;
                        renderProdiTable();
                    }
                });

                $(document).on('click', '.btn-hapus', function() {
                    const id = $(this).data('id');
                    Swal.fire({
                        title: 'Hapus Program Studi?',
                        text: "Data yang dihapus tidak dapat dikembalikan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `/admin/prodi/delete/${id}`,
                                type: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: response.message ||
                                            'Program Studi berhasil dihapus',
                                        timer: 1500,
                                        showConfirmButton: false
                                    }).then(() => {
                                        loadProdi
                                            ();
                                    });
                                },
                                error: function(xhr) {
                                    let errorMsg = 'Terjadi kesalahan saat menghapus data.';
                                    if (xhr.responseJSON && xhr.responseJSON.message) {
                                        errorMsg = xhr.responseJSON.message;
                                    }
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

                loadProdi();
            });
        </script>
    @endpush

    <style>
        .action-btn {
            @apply inline-flex items-center justify-center h-8 w-8 rounded-full transition-colors duration-200;
        }
    </style>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
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
                    showConfirmButton: true
                });
            });
        </script>
    @endif
@endsection
