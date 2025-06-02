<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    @empty($user)
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Kesalahan</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                        Data yang Anda cari tidak ditemukan.
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/admin/akunpengguna') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    @else
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Detail Pengguna</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <th class="text-right col-3">NIP:</th>
                            <td class="col-9">{{ $user->dosen->nip }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-3">Nama Dosen:</th>
                            <td class="col-9">{{ $user->dosen->nama }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-3">Role:</th>
                            <td class="col-9">{{ $user->role->role_nama }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    @endempty
</div>
