<form action="{{ route('admin.datadosen.import_ajax') }}" method="POST" id="form-import" enctype="multipart/form-data">
@csrf
    <div id="modal-master" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Dosen</h5>
            </div>

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label>Download Template</label><br>
                    <a href="{{ asset('template_datadosen.xlsx') }}" class="btn btn-info btn-sm" download>
                        <i class="fa fa-file-excel"></i> Download
                    </a>
                </div>

                <div class="form-group mb-3">
                    <label for="file_datadosen">Pilih File</label>
                    <input type="file" name="file_datadosen" id="file_datadosen" class="form-control" required>
                    <small id="error-file_datadosen" class="text-danger"></small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#form-import").validate({
            rules: {
                file_datadosen: {required: true, extension: "xlsx"},
            },
            submitHandler: function(form) {
                var formData = new FormData(form); // Jadikan form ke FormData untuk
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: formData, // Data yang dikirim berupa FormData
                    processData: false, // setting processData dan contentType ke false,
                    contentType: false,
                    success: function(response) {
                        if(response.status){ // jika sukses
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            tableBarang.ajax.reload(); // reload datatable
                        }else{ // jika error
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-'+prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
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
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
