@extends('admin.layouts.app')

@section('title', 'Rekomendasi')

@section('content')
    <div class="flex flex-wrap items-center justify-between mb-4 gap-2">
        <div>
            <label class="text-sm text-gray-700 mr-2">Show</label>
            <select id="show-entry" class="border rounded px-2 py-1 text-sm">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span class="text-sm text-gray-700 ml-2">entries</span>
        </div>
        <div class="flex items-center gap-2">
            <input id="search-bar" type="text" placeholder="Search..." class="border rounded px-2 py-1 text-sm" />
            <button id="btn-add-user" onclick="window.location.href='{{ url('admin/lomba/create') }}'"
                class="bg-blue-600 text-white px-4 py-1 rounded text-sm hover:bg-blue-700">
                + Add
            </button>
        </div>
    </div>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto bg-white shadow rounded-b-[12px] border-t-0 border border-gray-200">
        <!-- Tab Rekomendasi -->
        <table id="table_lomba" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tingkat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periode
                        Pendaftaran
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bidang</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            </tbody>
        </table>
        <p id="lomba_info" class="text-sm text-gray-500 mt-2"></p>
        <div id="lomba_pagination" class="mt-2 flex flex-wrap gap-2"></div>
    </div>
@endsection

@push('styles')
    <script src="//unpkg.com/alpinejs" defer></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            let lombaData = [];
            let currentPage = 1;

            function actionButtonsRekomendasi(id) {
                console.log("Rekomendasi ID:", id);
                return `
                <a href="/admin/rekomendasi/${id}" class="text-blue-600 hover:underline mr-2">Detail</a>
                <button type="button" class="text-red-600 hover:underline btn-hapus" data-id="${id}" data-type="lomba">Hapus</button>
            `;
            }

            function renderRekomendasiTable() {
                let searchQuery = $('#search-bar').val().toLowerCase();
                let entriesToShow = parseInt($('#show-entry').val());
                let tbody = $('#table_lomba tbody');

                let filtered = lombaData.filter(item =>
                    Object.values(item).some(val => val && val.toString().toLowerCase().includes(searchQuery))
                );

                let totalData = filtered.length;
                let totalPages = Math.ceil(totalData / entriesToShow);

                // Pagination slice
                let startIndex = (currentPage - 1) * entriesToShow;
                let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

                tbody.empty();
                $.each(paginated, function(index, item) {
                    let row = `
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">${item.judul}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <span class="px-1 py-1 rounded text-xs font-semibold ${item.tingkat_warna}">
                                    ${item.tingkat.charAt(0).toUpperCase() + item.tingkat.slice(1)}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">${item.periode_pendaftaran}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <a href="${item.link}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">${item.link}</a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                ${item.bidang.map(b => `<span class="inline-block bg-blue-100 text-blue-800 text-xs font-medium mr-1 px-1 py-0.5 rounded">${b.nama}</span>`).join(' ')}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                ${actionButtonsRekomendasi(item.id)}
                            </td>
                        </tr>
                        `;
                    tbody.append(row);
                });

                // Info total
                $("#lomba_info").text(`Menampilkan ${paginated.length} dari ${totalData} data lomba`);

                // Pagination
                let paginationHtml = '';
                for (let i = 1; i <= totalPages; i++) {
                    paginationHtml +=
                        `<button class="px-2 py-1 rounded ${i === currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200'} page-btn-mhs" data-page="${i}">${i}</button> `;
                }
                $("#lomba_pagination").html(paginationHtml);

                $(".page-btn-lomba").on("click", function() {
                    currentPage = parseInt($(this).data("page"));
                    renderRekomendasiTable();
                });
            }

            function loadRekomendasi() {
                $.ajax({
                    url: '/admin/rekomendasi/getAll',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        lombaData = response;
                        currentPage = 1;
                        renderRekomendasiTable();
                    }
                });
            }

            $('#search-bar, #show-entry').on('input change', function() {
                currentPage = 1;
                renderRekomendasiTable();
            });

            window.loadRekomendasi = loadRekomendasi;
            loadRekomendasi();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');
                const type = $(this).data('type'); // bisa dipakai kalau ada banyak jenis data

                Swal.fire({
                    title: 'Yakin hapus data ini?',
                    text: "Data yang dihapus tidak bisa dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/rekomendasi/delete/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('Berhasil!', response.message, 'success')
                                    .then(() => {
                                        location.reload(); // refresh tabel
                                    });
                            },
                            error: function(xhr) {
                                Swal.fire('Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#show-entry, #search-bar').on('input change', function() {
                let activeTab = window.tab;
                window.loadRekomendasi();
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
@endpush
