@if(!$dosen)
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-danger text-white">
      <h5 class="modal-title">Data Tidak Ditemukan</h5>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="alert alert-danger">Data dosen tidak ditemukan.</div>
    </div>
  </div>
</div>
@else
<form action="{{ url('datadosen/'.$dosen->dosen_id.'/update_ajax') }}" method="POST" id="form-edit-dosen">
  @csrf
  @method('PUT')
  <div id="modal-edit-dosen" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Dosen</label>
          <input type="text" name="nama" id="nama" value="{{ $dosen->nama }}" class="form-control" required>
          <small id="error-nama" class="error-text form-text text-danger"></small>
        </div>
        <div class="form-group">
          <label>NIP</label>
          <input type="number" name="nip" id="nip" value="{{ $dosen->nip }}" class="form-control" required>
          <small id="error-nip" class="error-text form-text text-danger"></small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</form>

<script>
$(document).ready(function () {
  $("#form-edit-dosen").validate({
    rules: {
      nama: { required: true, minlength: 3 },
      nip: { required: true, minlength: 8, maxlength: 20 }
    },
    submitHandler: function (form) {
      $.ajax({
        url: form.action,
        type: $(form).find('input[name="_method"]').val() || form.method,
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
            $('.error-text').text('');
            $.each(response.errors || {}, function (prefix, val) {
              $('#error-' + prefix).text(val[0]);
            });
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: response.message
            });
          }
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
@endif
