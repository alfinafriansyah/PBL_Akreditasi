@empty($user)
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('/user') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">Detail Data user</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    {{-- <tr>
                        <th class="text-right col-3">No HP:</th>
                        <td class="col-9">{{ $user->no_hp }}</td>
                    </tr> --}}
                    {{-- <tr>
                    <th class="text-right col-3">Nama:</th>
                    <td class="col-9">{{ $user->nama }}</td>
                </tr> --}}
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
            </div>
        </div>
    </div>
@endempty
