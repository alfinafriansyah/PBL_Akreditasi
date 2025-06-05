@if(!$dosen)
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Data Tidak Ditemukan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">Data dosen tidak ditemukan.</div>
            </div>
        </div>
    </div>
@else
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- Pastikan route di bawah sesuai route prefix "admin" -->
            <form action="{{ url('admin/datadosen/'.$dosen->dosen_id.'/update_ajax') }}" method="POST" id="form-edit-dosen">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dosen</label>
                        <input type="text" name="nama" id="nama" value="{{ $dosen->nama }}" class="form-control" required>
                        <small id="error-nama" class="text-danger"></small>
                    </div>

                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="number" name="nip" id="nip" value="{{ $dosen->nip }}" class="form-control" required>
                        <small id="error-nip" class="text-danger"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        $(function () {
            // Setup CSRF token untuk AJAX, pastikan ada meta tag csrf di layout utama
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form-edit-dosen').validate({
                rules: {
                    nama: { required: true, minlength: 3 },
                    nip: { required: true, minlength: 8, maxlength: 20 }
                },
                messages: {
                    nama: {
                        required: "Nama wajib diisi",
                        minlength: "Nama minimal 3 karakter"
                    },
                    nip: {
                        required: "NIP wajib diisi",
                        minlength: "NIP minimal 8 digit",
                        maxlength: "NIP maksimal 20 digit"
                    }
                },
                errorElement: 'small',
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
                    // Tampilkan error pada elemen <small> khusus per input jika ada
                    let errorTarget = $('#error-' + element.attr('name'));
                    if (errorTarget.length) {
                        errorTarget.text(error.text());
                    } else {
                        // fallback kalau elemen <small> tidak ditemukan
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: form.action,
                        type: 'PUT',
                        data: $(form).serialize(),
                        success: function (response) {
                            if (response.status) {
                                $('#modal-edit-dosen').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                $('#table_dosen').DataTable().ajax.reload();
                            } else {
                                // Bersihkan error lama
                                $('#form-edit-dosen small.text-danger').text('');
                                if (response.errors) {
                                    $.each(response.errors, function (key, val) {
                                        $('#error-' + key).text(val[0]);
                                    });
                                }
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: response.message || 'Terjadi kesalahan'
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi kesalahan server, coba lagi nanti.'
                            });
                        }
                    });
                    return false; // cegah submit form default
                }
            });
        });
    </script>
@endif
