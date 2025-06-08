@extends('admin.AdminLayouts.template')
@section('content')
    <style>
        tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
            transition: background-color 0.4s ease;
        }

        thead.table-light th {
            background-color: #f8f9fa !important;
        }
    </style>
    <div class="container mt-3">
        <form method="GET" action="{{ url()->current() }}" class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center gap-2">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm"
                    placeholder="Cari nama dosen..." style="max-width: 180px;">
                <select name="role_id" class="form-select form-select-sm" style="max-width: 150px;">
                    <option value="">Semua Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->role_id }}" {{ request('role_id') == $role->role_id ? 'selected' : '' }}>
                            {{ $role->role_nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div style="position: absolute; right: 50px; top: 130px;">
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            </div>



        </form>

        <div class="card shadow-sm border-0">
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Dosen</th>
                            <th>NIP</th>
                            <th>Username</th>
                            <th>Role Pengguna</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            @if ($user->role_id != 10 && $user->username !== 'admin')
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->dosen->nama ?? 'Pengguna') }}&background=random&size=40"
                                            class="rounded-circle me-3" width="40" height="40" alt="avatar">
                                        <div>{{ $user->dosen->nama ?? '-' }}</div>
                                    </td>
                                    <td>{{ $user->dosen->nip ?? '-' }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role->role_nama ?? '-' }}</td>
                                    <td class="text-center">

                                        {{--                                    Bagian ini aku ubah jadi button misal mau di ganti warna ada di class=".. " sebelum </button> --}}
                                        <button onclick="modalAction('{{ route('admin.edit_ajax', $user->user_id) }}')"
                                            class="btn btn-warning btn-sm">Edit</button>
                                        <button onclick="modalAction('{{ route('admin.show_ajax', $user->user_id) }}')"
                                            class="btn btn-facebook btn-sm">Detail</button>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Tidak ada data pengguna ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($users->hasPages())
                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Menampilkan {{ $users->firstItem() }} sampai {{ $users->lastItem() }} dari total
                        {{ $users->total() }} data
                    </small>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
    {{-- Perubahan dari Axel - ini kita bikin dlu modal kosongan atau kontainernya buat isinya nantinya --}}
    <div id="modalContainer">
        {{--        kita biarkan kosong --}}
    </div>
    <script>
        function modalAction(url) {
            $.get(url, function(data) {
                $('#modalContainer').html(data);

                // Deteksi jenis modal
                if (data.includes("editModal")) {
                    const editModal = new bootstrap.Modal(document.getElementById(
                    "editModal")); // ✅ Definisikan di sini
                    editModal.show();

                    // Handle form edit
                    $("#form-edit").on("submit", function(e) {
                        e.preventDefault();

                        $.ajax({
                            url: $(this).attr("action"),
                            type: "PUT",
                            data: $(this).serialize(),
                            dataType: "json",
                            beforeSend: function() {
                                $(".error-text").text("");
                                $(this).find('button[type="submit"]').prop("disabled", true);
                            },
                            success: function(response) {
                                if (response.status) {
                                    editModal.hide(); // ✅ Sekarang variabel bisa diakses
                                    Swal.fire({
                                        icon: "success",
                                        title: "Sukses",
                                        text: response.message,
                                        showConfirmButton: false,
                                        timer: 1500,
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },
                            error: function(xhr) {
                                $(document).find('button[type="submit"]').prop("disabled",
                                    false);

                                if (xhr.status === 422) {
                                    // Validation errors
                                    $.each(xhr.responseJSON.msgField, function(field, errors) {
                                        $("#error-" + field).text(errors[0]);
                                    });
                                } else {
                                    Swal.fire("Error", "Terjadi kesalahan server", "error");
                                }
                            }
                        });
                    });

                } else if (data.includes("detailModal")) {
                    const modal = new bootstrap.Modal(document.getElementById("detailModal"));
                    modal.show();
                }
            }).fail(function() {
                Swal.fire({
                    icon: "error",
                    title: "Gagal Memuat Data",
                    text: "Terjadi kesalahan saat mengambil data",
                });
            });
        }
    </script>
    {{-- Dari code diatas menurut ku ini dia merupaakn function untuk membuka edit content / ajax  di show .. --}}
@endsection
