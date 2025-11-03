$(document).ready(function () {
    let mahasiswaData = [];
    let currentPage = 1;

    function actionButtonsMahasiswa(id) {
        return `
            <a href="/users/${id}" class="text-blue-600 hover:underline mr-2">Detail</a>
            <a href="/users/${id}/edit" class="text-yellow-600 hover:underline mr-2">Edit</a>
            <button type="button" class="text-red-600 hover:underline btn-hapus" data-id="${id}" data-type="mahasiswa">Hapus</button>
        `;
    }

    function renderMahasiswaTable() {
        let searchQuery = $('#search-bar').val().toLowerCase();
        let entriesToShow = parseInt($('#show-entry').val());
        let tbody = $('#table_mahasiswa tbody');

        let filtered = mahasiswaData.filter(item =>
            Object.values(item).some(val => val && val.toString().toLowerCase().includes(searchQuery))
        );

        let totalData = filtered.length;
        let totalPages = Math.ceil(totalData / entriesToShow);

        // Pagination slice
        let startIndex = (currentPage - 1) * entriesToShow;
        let paginated = filtered.slice(startIndex, startIndex + entriesToShow);

        tbody.empty();
        $.each(paginated, function (index, item) {
            let row = `
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.nim}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.nama_mhs}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.username_mhs}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.email_mhs}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${item.program_studi ?? '-'}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        ${actionButtonsMahasiswa(item.id_mhs)}
                    </td>
                </tr>
            `;
            tbody.append(row);
        });

        // Info total
        $("#mahasiswa_info").text(`Menampilkan ${paginated.length} dari ${totalData} data mahasiswa`);

        // Pagination
        let paginationHtml = '';
        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `<button class="px-2 py-1 rounded ${i === currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200'} page-btn-mhs" data-page="${i}">${i}</button> `;
        }
        $("#mahasiswa_pagination").html(paginationHtml);

        $(".page-btn-mhs").on("click", function () {
            currentPage = parseInt($(this).data("page"));
            renderMahasiswaTable();
        });
    }

    function loadMahasiswa() {
        $.ajax({
            url: '/admin/users/mahasiswa/getdata',      
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                mahasiswaData = response;
                currentPage = 1;
                renderMahasiswaTable();
            }
        });
    }

    $('#search-bar, #show-entry').on('input change', function () {
        currentPage = 1;
        renderMahasiswaTable();
    });

    window.loadMahasiswa = loadMahasiswa;
    loadMahasiswa();
});