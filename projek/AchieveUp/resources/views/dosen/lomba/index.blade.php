@extends('dosen.layouts.app')

@section('title', 'Lomba')

@section('content')
    <div class="mx-auto max-w-full h-full flex flex-col">
        {{-- <h1 class="text-xl font-bold mb-4">Daftar Lomba</h1> --}}

        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-2">
                <label for="show-entry" class="text-sm font-medium text-gray-700">Tampilkan</label>
                <select id="show-entry"
                    class="appearance-none bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#6041CE] focus:border-transparent transition-shadow">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="text-sm font-medium text-gray-700">data</span>
            </div>

            <div class="flex items-center gap-2">
                <input id="search-bar" type="text" placeholder="Cari..." class="input" />
                <button id="btn-add-user" onclick="window.location.href='{{ route('dosen.lomba.create') }}'"
                    class="button-primary-medium">
                    <i class="fas fa-plus mr-2"></i>
                    <span>Tambah</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded border border-gray-200">
            <table id="table_lomba" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50" style="height: 40px;">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tingkat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periode
                            Pendaftaran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bidang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="table-body-lomba">
                    <!-- Data will be injected here -->
                </tbody>
            </table>
            <div class="px-4 py-3 text-sm text-gray-600" id="lomba-info">
                <!-- Info jumlah data tampil dan total -->
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            let lombaData = [];
            let currentPage = 1;

            function actionButtonsLomba(id) {
                return `<a href="/dosen_pembimbing/lomba/${id}" class="text-blue-600 hover:underline mr-2">Detail</a>`;
            }

            function renderLombaTable() {
                const searchQuery = $('#search-bar').val().toLowerCase();
                const entriesToShow = parseInt($('#show-entry').val());
                const tbody = $('#table-body-lomba');

                // Filter berdasarkan search
                const filtered = lombaData.filter(item =>
                    Object.values(item).some(val =>
                        val && val.toString().toLowerCase().includes(searchQuery)
                    )
                );

                const totalData = filtered.length;

                // Hitung data yang akan ditampilkan sesuai pagination dan entries
                const startIndex = (currentPage - 1) * entriesToShow;
                const paginated = filtered.slice(startIndex, startIndex + entriesToShow);

                tbody.empty();
                if (paginated.length === 0) {
                    tbody.append(`<tr><td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data lomba.</td></tr>`);
                } else {
                    $.each(paginated, function(index, item) {
                        const bidangTags = item.bidang.map(b => 
                            `<span class="inline-block bg-blue-100 text-blue-800 text-xs font-medium mr-1 px-1 py-0.5 rounded">${b.nama}</span>`
                        ).join(' ');
                        const tingkatCap = item.tingkat.charAt(0).toUpperCase() + item.tingkat.slice(1);
                        const row = `
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">${item.judul}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <span class="px-1 py-1 rounded text-xs font-semibold ${item.tingkat_warna}">
                                        ${tingkatCap}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">${item.periode_pendaftaran}</td>
                                <td class="px-6 py-4 text-sm text-blue-600 hover:underline">
                                    <a href="${item.link}" target="_blank" rel="noopener noreferrer">${item.link}</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">${bidangTags}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">${actionButtonsLomba(item.id)}</td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                }

                // Update info jumlah data
                $('#lomba-info').html(`
                    Menampilkan <span id="shown-count">${paginated.length}</span> lomba dari ${totalData} data lomba.
                `);
            }

            function loadLomba() {
                $.ajax({
                    url: '/dosen_pembimbing/lomba/getall',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        lombaData = response;
                        currentPage = 1;
                        renderLombaTable();
                    },
                    error: function() {
                        alert('Gagal mengambil data lomba.');
                    }
                });
            }

            $('#search-bar, #show-entry').on('input change', function() {
                currentPage = 1;
                renderLombaTable();
            });

            // Load data awal
            loadLomba();
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
@endsection
