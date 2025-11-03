@extends('admin.layouts.app')

@section('title', 'Pengguna')

@section('content')
    <div class="mx-auto max-w-full h-full flex flex-col" x-data="{ tab: 'mahasiswa' }" x-init="$watch('tab', value => window.tab = value)">
        <!-- Tab Navigation - Directly attached to table -->
        <div class="flex border-b-0">
            <button class="px-5 py-2.5 text-sm font-medium transition-colors duration-200 focus:outline-none"
                :class="{ 'bg-white border-t border-l border-r border-gray-200 rounded-t-lg text-[#6041CE] font-semibold': tab === 'mahasiswa', 'text-gray-600 hover:text-gray-800 bg-gray-100': tab !== 'mahasiswa' }"
                @click="tab = 'mahasiswa'">
                Mahasiswa
            </button>
            <button class="px-5 py-2.5 text-sm font-medium transition-colors duration-200 focus:outline-none"
                :class="{ 'bg-white border-t border-l border-r border-gray-200 rounded-t-lg text-[#6041CE] font-semibold': tab === 'dosen', 'text-gray-600 hover:text-gray-800 bg-gray-100': tab !== 'dosen' }"
                @click="tab = 'dosen'">
                Dosen
            </button>
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
                    <button id="btn-add-user"
                        class="flex items-center justify-center px-4 py-2 bg-[#6041CE] hover:bg-[#4e35a5] text-white rounded-lg transition-colors duration-200 text-sm font-medium">
                        <i class="fas fa-plus mr-2"></i>
                        <span>Tambah</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mahasiswa Table -->
        <div x-show="tab === 'mahasiswa'" class="overflow-hidden bg-white shadow-md border border-gray-200 rounded-b-lg">
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
                    <tbody id="table_mahasiswa_body" class="bg-white divide-y divide-gray-200">
                        <!-- Data will be loaded here -->
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <p id="mahasiswa_info" class="text-sm text-gray-600"></p>
                    <div id="mahasiswa_pagination" class="flex flex-wrap gap-2"></div>
                </div>
            </div>
        </div>

        <!-- Dosen Table -->
        <div x-show="tab === 'dosen'" class="overflow-hidden bg-white shadow-md border border-gray-200 rounded-b-lg">
            <div class="overflow-x-auto">
                <table id="table_dosen" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIDN
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Username</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table_dosen_body" class="bg-white divide-y divide-gray-200">
                        <!-- Data will be loaded here -->
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <p id="dosen_info" class="text-sm text-gray-600"></p>
                    <div id="dosen_pagination" class="flex flex-wrap gap-2"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                let mahasiswaData = [];
                let dosenData = [];
                let mahasiswaCurrentPage = 1;
                let dosenCurrentPage = 1;

                // ===== Common Functions =====
                function getEmptyState(type) {
                    return `
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-users text-gray-300 text-3xl mb-2"></i>
                                <p>Tidak ada data ${type} ditemukan</p>
                            </div>
                        </td>
                    </tr>
                `;
                }

                // ===== Mahasiswa Functions =====
                function actionButtonsMahasiswa(id) {
                    return `
                    <div class="flex items-center gap-3">
                        <a href="/admin/users/mahasiswa/${id}" class="action-btn text-blue-600 hover:text-blue-800" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/admin/users/mahasiswa/${id}/update" class="action-btn text-amber-600 hover:text-amber-800" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="action-btn text-red-600 hover:text-red-800 btn-hapus" 
                            data-id="${id}" data-type="mahasiswa" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
                }

                function renderMahasiswaTable() {
                    let searchQuery = $('#search-bar').val().toLowerCase();
                    let entriesToShow = parseInt($('#show-entry').val()) || 5;
                    let tbody = $('#table_mahasiswa_body');

                    let filtered = mahasiswaData.filter(item =>
                        Object.values(item).some(val => val && typeof val === 'string' && val.toLowerCase()
                            .includes(searchQuery))
                    );

                    let totalData = filtered.length;
                    let totalPages = Math.ceil(totalData / entriesToShow);
                    let startIndex = (mahasiswaCurrentPage - 1) * entriesToShow;
                    let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

                    tbody.empty();

                    if (paginated.length === 0) {
                        tbody.append(getEmptyState('mahasiswa'));
                    } else {
                        $.each(paginated, function(index, item) {
                            let row = `
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.nim || '-'}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.nama}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.username}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.email}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.program_studi || '-'}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    ${actionButtonsMahasiswa(item.id)}
                                </td>
                            </tr>
                        `;
                            tbody.append(row);
                        });
                    }

                    $("#mahasiswa_info").text(`Menampilkan ${paginated.length} dari ${totalData} data mahasiswa`);

                    let paginationHtml = '';
                    if (totalPages > 1) {
                        for (let i = 1; i <= totalPages; i++) {
                            paginationHtml += `
                            <button class="px-3 py-1.5 rounded text-sm font-medium transition-colors duration-200
                                ${i === mahasiswaCurrentPage ? 'bg-[#6041CE] text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700'} 
                                page-btn-mhs" data-page="${i}">${i}
                            </button>
                        `;
                        }
                    }

                    $("#mahasiswa_pagination").html(paginationHtml);

                    $(".page-btn-mhs").off("click").on("click", function() {
                        mahasiswaCurrentPage = parseInt($(this).data("page"));
                        renderMahasiswaTable();
                    });
                }

                function loadMahasiswa() {
                    $.ajax({
                        url: '/admin/users/mahasiswa/getdata',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            mahasiswaData = response;
                            mahasiswaCurrentPage = 1;
                            renderMahasiswaTable();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error loading mahasiswa data:', status, error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal memuat data mahasiswa.',
                                timer: 2000
                            });
                            mahasiswaData = [];
                            renderMahasiswaTable();
                        }
                    });
                }

                // ===== Dosen Functions =====
                function actionButtonsDosen(id) {
                    return `
                    <div class="flex items-center gap-3">
                        <a href="/admin/users/dosen/${id}" class="action-btn text-blue-600 hover:text-blue-800" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/admin/users/dosen/${id}/update" class="action-btn text-amber-600 hover:text-amber-800" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="action-btn text-red-600 hover:text-red-800 btn-hapus" 
                            data-id="${id}" data-type="dosen" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
                }

                function renderDosenTable() {
                    let searchQuery = $('#search-bar').val().toLowerCase();
                    let entriesToShow = parseInt($('#show-entry').val()) || 5;
                    let tbody = $('#table_dosen_body');

                    let filtered = dosenData.filter(item =>
                        Object.values(item).some(val => val && typeof val === 'string' && val.toLowerCase()
                            .includes(searchQuery))
                    );

                    let totalData = filtered.length;
                    let totalPages = Math.ceil(totalData / entriesToShow);
                    let startIndex = (dosenCurrentPage - 1) * entriesToShow;
                    let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

                    tbody.empty();

                    if (paginated.length === 0) {
                        tbody.append(getEmptyState('dosen'));
                    } else {
                        $.each(paginated, function(index, item) {
                            let row = `
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.nidn || '-'}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.nama}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.username}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.email}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                        ${item.role || 'Dosen'}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    ${actionButtonsDosen(item.id)}
                                </td>
                            </tr>
                        `;
                            tbody.append(row);
                        });
                    }

                    $("#dosen_info").text(`Menampilkan ${paginated.length} dari ${totalData} data dosen`);

                    let paginationHtml = '';
                    if (totalPages > 1) {
                        for (let i = 1; i <= totalPages; i++) {
                            paginationHtml += `
                            <button class="px-3 py-1.5 rounded text-sm font-medium transition-colors duration-200
                                ${i === dosenCurrentPage ? 'bg-[#6041CE] text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700'} 
                                page-btn-dosen" data-page="${i}">${i}
                            </button>
                        `;
                        }
                    }

                    $("#dosen_pagination").html(paginationHtml);

                    $(".page-btn-dosen").off("click").on("click", function() {
                        dosenCurrentPage = parseInt($(this).data("page"));
                        renderDosenTable();
                    });
                }

                function loadDosen() {
                    $.ajax({
                        url: '/admin/users/dosen/getdata',
                        method: "GET",
                        dataType: "json",
                        success: function(response) {
                            dosenData = response;
                            dosenCurrentPage = 1;
                            renderDosenTable();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error loading dosen data:', status, error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal memuat data dosen.',
                                timer: 2000
                            });
                            dosenData = [];
                            renderDosenTable();
                        }
                    });
                }

                // ===== Event Handlers =====
                $('#search-bar').on('input', function() {
                    const activeTab = window.tab;
                    if (activeTab === 'mahasiswa') {
                        mahasiswaCurrentPage = 1;
                        renderMahasiswaTable();
                    } else if (activeTab === 'dosen') {
                        dosenCurrentPage = 1;
                        renderDosenTable();
                    }
                });

                $('#show-entry').on('change', function() {
                    const activeTab = window.tab;
                    if (activeTab === 'mahasiswa') {
                        mahasiswaCurrentPage = 1;
                        renderMahasiswaTable();
                    } else if (activeTab === 'dosen') {
                        dosenCurrentPage = 1;
                        renderDosenTable();
                    }
                });

                // Watch for Alpine.js tab changes
                document.addEventListener('alpine:initialized', () => {
                    const alpineComponent = Alpine.getComponent(document.querySelector('[x-data]'));
                    if (alpineComponent) {
                        Alpine.effect(() => {
                            const currentTab = alpineComponent.tab;
                            if (currentTab === 'mahasiswa') {
                                renderMahasiswaTable();
                            } else if (currentTab === 'dosen') {
                                renderDosenTable();
                            }
                        });
                    }
                });

                // Add user button handler
                $('#btn-add-user').on('click', function() {
                    Swal.fire({
                        title: 'Tambah Data',
                        text: "Pilih tipe data yang ingin ditambahkan",
                        icon: 'question',
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Mahasiswa',
                        cancelButtonText: 'Dosen',
                        confirmButtonColor: '#4e35a5',
                        cancelButtonColor: '#3085d6',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ url('admin/users/create?type=mahasiswa') }}";
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            window.location.href = "{{ url('admin/users/create?type=dosen') }}";
                        }
                    });
                });

                // Delete button handler
                $(document).on('click', '.btn-hapus', function() {
                    let id = $(this).data('id');
                    let type = $(this).data('type');
                    let url = `/admin/users/${type}/${id}`;
                    let typeLabel = type === 'mahasiswa' ? 'Mahasiswa' : 'Dosen';

                    Swal.fire({
                        title: `Hapus ${typeLabel}?`,
                        text: "Data ini akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6e7881',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Terhapus!',
                                        text: response.success ||
                                            'Data berhasil dihapus.',
                                        timer: 1500,
                                        showConfirmButton: false
                                    }).then(() => {
                                        if (type === 'mahasiswa') {
                                            loadMahasiswa();
                                        } else if (type === 'dosen') {
                                            loadDosen();
                                        }
                                    });
                                },
                                error: function(xhr) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: xhr.responseJSON?.error ||
                                            'Tidak dapat menghapus data.',
                                    });
                                }
                            });
                        }
                    });
                });

                // Initialize data
                window.loadMahasiswa = loadMahasiswa;
                window.loadDosen = loadDosen;
                loadMahasiswa();
                loadDosen();
            });
        </script>
    @endpush


    <style>
        .action-btn {
            @apply inline-flex items-center justify-center h-8 w-8 rounded-full transition-colors duration-200;
        }

        /* Make sure the active tab has the highest z-index to properly overlap the table */
        [x-show="tab === 'mahasiswa'"],
        [x-show="tab === 'dosen'"] {
            z-index: 10;
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
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif
@endsection
