@extends('layouts.template')
{{--Card--}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            {{-- <div class="card-header pb-0">
              <h6>{{ $page->title }}</h6>
            </div> --}}
            <div class="card-body pt-3 p-3">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ url('kriteria1/store') }}" id="form-ppepp" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label><h5>Penetapan</h5></label>
                        <textarea name="penetapan" id="penetapan" cols="30" rows="10" class="tinymce-editor" data-required="true"></textarea>
                    </div>
                    <div class="mb-3">
                        <label><h6>Dokumen Pendukung</h6></label>
                        <input type="file" class="form-control" name="doc_penetapan[]" id="doc_penetapan" multiple>
                    </div>
                    <div class="mb-3">
                        <label><h5>Pelaksanaan</h5></label>
                        <textarea name="pelaksanaan" id="pelaksanaan" cols="30" rows="10" class="tinymce-editor" data-required="true"></textarea>
                    </div>
                    <div class="mb-3">
                        <label><h6>Dokumen Pendukung</h6></label>
                        <input type="file" class="form-control" name="doc_pelaksanaan[]" id="doc_pelaksanaan" multiple>
                    </div>
                    <div class="mb-3">
                        <label><h5>Evaluasi</h5></label>
                        <textarea name="evaluasi" id="evaluasi" cols="30" rows="10" class="tinymce-editor" data-required="true"></textarea>
                    </div>
                    <div class="mb-3">
                        <label><h6>Dokumen Pendukung</h6></label>
                        <input type="file" class="form-control" name="doc_evaluasi[]" id="doc_evaluasi" multiple>
                    </div>
                    <div class="mb-3">
                        <label><h5>Pengendalian</h5></label>
                        <textarea name="pengendalian" id="pengendalian" cols="30" rows="10" class="tinymce-editor" data-required="true"></textarea>
                    </div>
                    <div class="mb-3">
                        <label><h6>Dokumen Pendukung</h6></label>
                        <input type="file" class="form-control" name="doc_pengendalian[]" id="doc_pengendalian" multiple>
                    </div>
                    <div class="mb-3">
                        <label><h5>Peningkatan</h5></label>
                        <textarea name="peningkatan" id="peningkatan" cols="30" rows="10" class="tinymce-editor" data-required="true"></textarea>
                    </div>
                    <div class="mb-3">
                        <label><h6>Dokumen Pendukung</h6></label>
                        <input type="file" class="form-control" name="doc_peningkatan[]" id="doc_peningkatan" multiple>
                    </div>
                    <div class="mb-3">
                        <a href="{{ url('kriteria1/') }}" class="btn btn-warning">Kembali</a>
                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .tinymce-editor.invalid {
        border: 1px solid red;
    }
</style>
@endpush

@push('js')
<script>
    tinymce.init({
        selector: '.tinymce-editor',
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        setup: function(editor) {
            // Handle validation
            editor.on('change', function() {
                editor.save();
            });
            
            // Untuk editor yang required
            if (editor.getElement().getAttribute('data-required') === 'true') {
                editor.on('init', function() {
                    editor.getElement().removeAttribute('required');
                });
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Handle success/error messages from server
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        @endif

        // Handle form submission
        document.getElementById('form-ppepp').addEventListener('submit', function(e) {
            console.log('Form submit triggered');
            // Update semua TinyMCE instance sebelum submit
            tinymce.triggerSave();
            
            // Validasi manual
            let isValid = true;
            document.querySelectorAll('[data-required="true"]').forEach(el => {
                if (!el.value.trim()) {
                    isValid = false;
                    // Tambahkan class error
                    tinymce.get(el.id)?.getContainer().querySelector('.tox-editor-container').classList.add('invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                Swal.fire('Error', 'Harap isi semua field yang wajib diisi', 'error');
            }
        });
    });
</script>
@endpush