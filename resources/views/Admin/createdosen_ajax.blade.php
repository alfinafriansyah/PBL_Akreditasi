<!-- Modal Tambah Dosen -->
<div class="modal fade" id="modal-dosen" tabindex="-1" role="dialog" aria-labelledby="modalDosenLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <form action="{{ route('admin.datadosen.store') }}" method="POST" id="form-tambah-dosen">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalDosenLabel">Input Data Dosen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!-- Jika Bootstrap 5: ganti ke data-bs-dismiss -->
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                      <label for="nama">Nama Dosen</label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
                      <small id="error-nama" class="error-text form-text text-danger"></small>
                  </div>

                  <div class="form-group">
                      <label for="nip">Nomor Induk Pegawai</label>
                      <input type="text" name="nip" id="nip" class="form-control" required>
                      <small id="error-nip" class="error-text form-text text-danger"></small>
                  </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </div>
      </form>
  </div>
</div>

@push('js')
<script>
  $(document).ready(function () {
      $('#form-tambah-dosen').validate({
          rules: {
              nama: {
                  required: true,
                  minlength: 3,
                  maxlength: 100
              },
              nip: {
                  required: true,
                  minlength: 5
              }
          },
          submitHandler: function (form) {
              $.ajax({
                  url: form.action,
                  type: form.method,
                  data: $(form).serialize(),
                  success: function (response) {
                      if (response.status) {
                          $('#modal-dosen').modal('hide');
                          Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: response.message
                          });

                          // Reload DataTable dosen
                          $('#table_dosen').DataTable().ajax.reload();
                      } else {
                          $('.error-text').text('');
                          $.each(response.msgField, function (prefix, val) {
                              $('#error-' + prefix).text(val[0]);
                          });

                          Swal.fire({
                              icon: 'error',
                              title: 'Terjadi Kesalahan',
                              text: response.message
                          });
                      }
                  },
                  error: function () {
                      Swal.fire({
                          icon: 'error',
                          title: 'Gagal',
                          text: 'Gagal menyimpan data. Silakan coba lagi.'
                      });
                  }
              });
              return false;
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
          },
          highlight: function (element) {
              $(element).addClass('is-invalid');
          },
          unhighlight: function (element) {
              $(element).removeClass('is-invalid');
          }
      });
  });
</script>
@endpush
