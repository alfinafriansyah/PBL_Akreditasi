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
    <div class="container mt-4">
        <form method="GET" action="{{ url()->current() }}" class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control form-control-sm"
                    placeholder="Cari nama dosen..."
                    style="max-width: 180px;"
                >
                <select
                    name="role_id"
                    class="form-select form-select-sm"
                    style="max-width: 150px;"
                >
                    <option value="">Semua Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->role_id }}" {{ request('role_id') == $role->role_id ? 'selected' : '' }}>
                            {{ $role->role_nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
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
                                    <img
                                        src="https://ui-avatars.com/api/?name={{ urlencode($user->dosen->nama ?? 'Pengguna') }}&background=random&size=40"
                                        class="rounded-circle me-3" width="40" height="40" alt="avatar"
                                    >
                                    <div>{{ $user->dosen->nama ?? '-' }}</div>
                                </td>
                                <td>{{ $user->dosen->nip ?? '-' }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role->role_nama ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.edit_ajax', $user->user_id)}}" class="btn btn-sm btn-outline-primary me-1" title="Edit" data-id="{{$user->user_id}}">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

{{--                                    Tempat show detail --}}
                                    <a href="{{ route('admin.show_ajax', $user->user_id) }}"
                                       class="btn btn-sm btn-outline-info btn-detail"
                                       data-id="{{ $user->user_id }}">
                                        <i class="bi bi-info-circle"></i> Detail
                                    </a>
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
                        Menampilkan {{ $users->firstItem() }} sampai {{ $users->lastItem() }} dari total {{ $users->total() }} data
                    </small>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailContent">
                    <div class="text-center text-muted py-4">Memuat...</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-detail').click(function (e) {
                e.preventDefault();
                const url = $(this).attr('href');

                $('#detailContent').html('<div class="text-center text-muted py-4">Memuat...</div>');
                $('#detailModal').modal('show');

                $.get(url, function (data) {
                    $('#detailContent').html(data);
                }).fail(function () {
                    $('#detailContent').html('<div class="text-danger text-center py-4">Gagal memuat data.</div>');
                });
            });
        });
    </script>
@endpush
