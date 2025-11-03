$(document).ready(function () {
    let dosenData = [];
    let currentPage = 1;

    function actionButtonsDosen(id) {
        return `
            <a href="/users/${id}" class="text-blue-600 hover:underline mr-2">Detail</a>
            <a href="/users/${id}/edit" class="text-yellow-600 hover:underline mr-2">Edit</a>
            <button type="button" class="text-red-600 hover:underline btn-hapus" data-id="${id}" data-type="dosen">Hapus</button>
        `;
    }

    function renderDosenTable() {
        let searchQuery = $('#search-bar').val().toLowerCase();
        let entriesToShow = parseInt($('#show-entry').val());
        let tbody = $('#table_dosen tbody');
        
        let filtered = dosenData.filter(item =>
            Object.values(item).some(val => val && val.toString().toLowerCase().includes(searchQuery))
        );

        let totalData = filtered.length;
        let totalPages = Math.ceil(totalData / entriesToShow);

        // Hitung slice data berdasarkan halaman aktif
        let startIndex = (currentPage - 1) * entriesToShow;
        let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

        tbody.empty();
        $.each(paginated, function (index, item) {
            let row = `
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.nidn}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.nama_dsn}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.username}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.email}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.role}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        ${actionButtonsDosen(item.id_dsn)}
                    </td>
                </tr>
            `;
            tbody.append(row);
        });

        // Tampilkan info jumlah data
        $("#dosen_info").text(`Menampilkan ${paginated.length} dari ${totalData} data dosen`);

        // Tampilkan pagination
        let paginationHtml = '';
        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `<button class="px-2 py-1 rounded ${i === currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200'} page-btn" data-page="${i}">${i}</button> `;
        }
        $("#dosen_pagination").html(paginationHtml);

        // Event klik halaman
        $(".page-btn").on("click", function () {
            currentPage = parseInt($(this).data("page"));
            renderDosenTable();
        });
    }

    function loadDosen() {
        $.ajax({
            url: 'users/dosen/getdata',
            method: "GET",
            dataType: "json",
            success: function (response) {
                dosenData = response;
                currentPage = 1;
                renderDosenTable();
            }
        });
    }

    // Event pencarian dan jumlah data
    $('#search-bar, #show-entry').on('input change', function () {
        currentPage = 1;
        renderDosenTable();
    });

    window.loadDosen = loadDosen;
    loadDosen();
});