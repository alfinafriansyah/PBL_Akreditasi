<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.update_ajax', $user->user_id) }}" method="POST" id="form-edit">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Dosen</label>
                        <select name="dosen_id" class="form-control" required>
                            <option value="">- Pilih Dosen -</option>
                            @foreach ($dosen as $d)
                                <option value="{{ $d->dosen_id }}"
                                    {{ $d->dosen_id == $user->dosen_id ? 'selected' : '' }}>
                                    {{ $d->nama }}
                                </option>
                            @endforeach
                        </select>
                        <small id="error-dosen_id" class="text-danger error-text"></small>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" class="form-control" disabled>
                            <option value="">- Pilih Role -</option>
                            @foreach ($role as $r)
                                <option value="{{ $r->role_id }}"
                                    {{ $r->role_id == $user->role_id ? 'selected' : '' }}>
                                    {{ $r->role_nama }}
                                </option>
                            @endforeach
                        </select>
                        <small id="error-role_id" class="text-danger error-text"></small>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="{{ $user->username }}"
                            readonly>
                        <small id="error-username" class="text-danger error-text"></small>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="*****">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin ubah password</small>
                        <small id="error-password" class="text-danger error-text"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
