<form id="form-tambah-dosen" action="{{ route('admin.datadosen.store') }}" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Tambah Data Dosen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="nama" class="form-label">Nama Dosen</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama dosen">
                <small class="text-danger error-text" id="error-nama"></small>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <label for="nip" class="form-label">NIP</label>
                <input type="number" name="nip" class="form-control" placeholder="Masukkan NIP">
                <small class="text-danger error-text" id="error-nip"></small>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#form-tambah-dosen').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function (response) {
                    if (response.status) {
                        $('#modal-dosen').modal('hide');
                        Swal.fire('Berhasil', response.message, 'success');
                        $('#table_dosen').DataTable().ajax.reload();
                    } else {
                        Swal.fire('Gagal', response.message, 'error');
                    }
                },
                error: function (xhr) {
                    $('.error-text').text(''); // Reset error
                    if (xhr.responseJSON?.errors) {
                        $.each(xhr.responseJSON.errors, function (key, val) {
                            $('#error-' + key).text(val[0]);
                        });
                    }
                    Swal.fire('Gagal', 'Validasi gagal. Periksa inputan.', 'error');
                }
            });
        });
    });
</script>
