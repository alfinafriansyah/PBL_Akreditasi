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

                <h4>{{$kriteria->kriteria_nama}}</h4>
                {{-- Penetapan --}}
                <div class="mb-3">
                    <h5>Penetapan</h5>
                    {!! $kriteria->penetapan->penetapan ?? '-' !!}
                    <h5>Dokumen Pendukung</h5>
                    @foreach(json_decode($kriteria->penetapan->dokumen ?? '[]') as $file)
                        <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                    @endforeach
                </div>
                
                {{-- Pelaksanaan --}}
                <div class="mb-3">
                    <h5>Pelaksanaan</h5>
                    {!! $kriteria->pelaksanaan->pelaksanaan ?? '-' !!}
                    <h5>Dokumen Pendukung</h5>
                    @foreach(json_decode($kriteria->pelaksanaan->dokumen ?? '[]') as $file)
                        <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                    @endforeach
                </div>
                                                
                {{-- Evaluasi --}}
                <div class="mb-3">
                    <h5>Evaluasi</h5>
                    {!! $kriteria->evaluasi->evaluasi ?? '-' !!}
                    <h5>Dokumen Pendukung</h5>
                    @foreach(json_decode($kriteria->evaluasi->dokumen ?? '[]') as $file)
                        <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                    @endforeach
                </div>
                                
                {{-- Pengendalian --}}
                <div class="mb-3">
                    <h5>Pengendalian</h5>
                    {!! $kriteria->pengendalian->pengendalian ?? '-' !!}
                    <h5>Dokumen Pendukung</h5>
                    @foreach(json_decode($kriteria->pengendalian->dokumen ?? '[]') as $file)
                        <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                    @endforeach
                </div>
                                
                {{-- Peningkatan --}}
                <div class="mb-3">
                    <h5>Peningkatan</h5>
                    {!! $kriteria->peningkatan->peningkatan ?? '-' !!}
                    <h5>Dokumen Pendukung</h5>
                    @foreach(json_decode($kriteria->peningkatan->dokumen ?? '[]') as $file)
                        <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ url('validasi/koordinator/' . $kriteria->kriteria_id . '/validate') }}" class="btn btn-success me-2 float-end">Validasi</a>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body pt-3 p-3">
                {{-- Komentar --}}
                <form method="POST" action="{{ url('validasi/' . $kriteria->kriteria_id . '/komentar')}}" id="form-komentar" enctype="multipart/form-data">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="mb-3">
                        <label><h5>Komentar</h5></label>
                        <p><i>Isi jika diperlukan revisi</i></p>
                        <textarea name="komentar" id="komentar" cols="30" rows="10" class="tinymce-editor" data-required="true"></textarea>
                    </div>
                    <input type="hidden" name="redirect_to" value="{{ url('validasi/koordinator/') }}">
                    
                    <div class="card-footer">
                        <a href="{{ url('validasi/koordinator/') }}" class="btn btn-warning">Kembali</a>
                        <button type="submit" class="btn btn-primary float-end">Komentar</button>
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
        document.getElementById('form-komentar').addEventListener('submit', function(e) {
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