@empty($user) 
    <div id="modal-master" class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-
                label="Close"><span aria-hidden="true">&times;</span></button>
            </div> 
            <div class="modal-body"> 
                <div class="alert alert-danger"> 
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5> 
                    Data yang anda cari tidak ditemukan</div> 
                <a href="{{ url('/user') }}" class="btn btn-warning">Kembali</a> 
            </div> 
        </div> 
    </div> 
@else 
    <form action="{{ url('/user/' . $user->user_id.'/update_ajax') }}" method="POST" id="form-edit"> 
    @csrf  
    @method('PUT') 
    <div id="modal-master" class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-
                label="Close"><span aria-hidden="true">&times;</span></button> 
            </div> 
            <div class="modal-body"> 
                <div class="form-group"> 
                    <label>Nama Dosen</label> 
                    <select name="dosen_id" id="dosen_id" class="form-control" required> 
                        <option value="">- Pilih Dosen -</option> 
                        @foreach($dosen as $d) 
                            <option {{ ($d->dosen_id == $user->dosen_id)? 'selected' : '' }} 
                                value="{{ $d->dosen_id }}">{{ $d->nama }}</option> 
                        @endforeach 
                    </select> 
                    <small id="error-dosen_id" class="error-text form-text text-danger"></small> 
                </div> 
                 <div class="form-group"> 
                    <label>Username</label> 
                    <input value="{{ $user->username }}" type="text" name="username" 
                    id="username" class="form-control" readonly> 
                    <small id="error-username" class="error-text form-text text-danger"></small> 
                </div> 
                <div class="form-group"> 
                    <label>Password</label> 
                    <input value="" type="password" name="password" id="password" class="form-control" required> 
                    <small class="form-text text-muted">Abaikan jika tidak ingin ubah password</small> 
                    <small id="error-password" class="error-text form-text text-danger"></small> 
                </div> 
            </div> 
            <div class="modal-footer"> 
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button> 
                <button type="submit" class="btn btn-primary">Simpan</button> 
            </div> 
        </div> 
    </div> 
    </form> 
    @push('js')
    <script>
         $(document).ready(function() { 
            $("#form-edit").validate({ 
                rules: { 
                    dosen_id: {required: true, number: true}, 
                    username: {minlength: 3, maxlength: 20}, 
                    password: {required: true, minlength: 6, maxlength: 20} 
                }, 
                submitHandler: function(form) { 
                    $.ajax({ 
                        url: form.action, 
                        type: 'POST', 
                        data: $(form).serialize(), 
                        success: function(response) { 
                            if(response.status){ 
                                $('#myModal').modal('hide'); 
                                Swal.fire({ 
                                    icon: 'success', 
                                    title: 'Berhasil', 
                                    text: response.message 
                                }); 
                                tableUser.ajax.reload(); 
                            }else{ 
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
    @endpush
@endempty 
