@extends('dosen.layouts.app')

@section('title', 'Notifikasi')

@section('content')
    <div class="container mx-auto max-w-2xl p-4">
        <h2 class="text-xl font-bold mb-4">Notifikasi Rekomendasi Lomba</h2>
        <div class="flex justify-end mb-4 gap-2">
            <button id="mark-all" class="px-3 py-1 bg-green-600 text-white rounded text-sm hover:bg-green-700">
                Tandai Semua Sudah Dibaca
            </button>
            <button id="delete-read" class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                Hapus Pesan yang Sudah Dibaca
            </button>
        </div>

        <div id="notif-list">
            <div class="text-gray-500 text-center py-8" id="notif-loading">Memuat notifikasi...</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function loadNotifikasi() {
                fetch('{{ url('dosen_pembimbing/notifikasi/getAllRekomendasi') }}')
                    .then(res => res.json())
                    .then(res => {
                        let html = '';
                        if (res.data && res.data.length > 0) {
                            html += '<ul class="space-y-4">';
                            res.data.forEach(item => {
                                html += `
                                    <li class="notif-item bg-white rounded shadow p-4 flex flex-col md:flex-row md:items-center md:justify-between ${item.is_accepted ? '' : 'border-l-4 border-blue-500'} relative"
                                        data-id="${item.id}" data-read="${item.is_accepted}" style="cursor:pointer;">
                                        <div>
                                            <div class="font-semibold">${item.judul}</div>
                                            <div class="text-sm text-gray-600 mb-1">${item.periode_pendaftaran}</div>
                                            <div class="text-xs text-gray-500 mb-1">${item.tingkat} - ${item.bidang.map(b => b.nama).join(', ')}</div>
                                            <div class="text-xs ${item.is_accepted ? 'text-green-600' : 'text-blue-600'}">
                                                ${item.pesan ? item.pesan : ''}
                                            </div>
                                        </div>
                                        ${!item.is_accepted ? `<span class="absolute top-2 right-2 block w-4 h-4 rounded-full bg-red-600 border-2 border-white"></span>` : ''}
                                    </li>`;
                            });
                            html += '</ul>';
                        } else {
                            html = '<div class="text-gray-500 text-center py-8">Tidak ada notifikasi.</div>';
                        }
                        document.getElementById('notif-list').innerHTML = html;
                    });
            }

            loadNotifikasi();

            // Tombol mark all
            document.getElementById('mark-all').addEventListener('click', function() {
                fetch('{{ url('dosen_pembimbing/notifikasi/markAllAsRead') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            loadNotifikasi();
                        }
                    });
            });

            // Tombol hapus pesan yang sudah dibaca
            document.getElementById('delete-read').addEventListener('click', function() {
                Swal.fire({
                    title: 'Yakin ingin menghapus semua pesan yang sudah dibaca?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('{{ url('dosen_pembimbing/notifikasi/destroyIsAcceptedMessage') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(res => res.json())
                            .then(res => {
                                if (res.success) {
                                    loadNotifikasi();
                                    Swal.fire('Berhasil!',
                                        'Semua pesan yang sudah dibaca telah dihapus.',
                                        'success');
                                }
                            });
                    }
                });
            });

            // Event delegation untuk klik list notifikasi
            document.getElementById('notif-list').addEventListener('click', function(e) {
                const notifItem = e.target.closest('.notif-item');
                if (notifItem) {
                    const id = notifItem.getAttribute('data-id');
                    const isRead = notifItem.getAttribute('data-read') === 'true' || notifItem.getAttribute('data-read') === '1';

                    if (!isRead) {
                        fetch('{{ url('dosen_pembimbing/notifikasi/markAsRead') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ id })
                            })
                            .then(res => res.json())
                            .then(res => {
                                // Redirect setelah mark as read
                                window.location.href = '/dosen_pembimbing/notifikasi/' + id;
                            });
                    } else {
                        window.location.href = '/dosen_pembimbing/notifikasi/' + id;
                    }
                }
            });
        });
    </script>
@endsection
