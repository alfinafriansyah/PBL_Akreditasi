@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Edit Data Dosen</h5>
                </div>
                <div class="card-body pt-3 p-3">
                    @if(!$dosen)
                        <div class="alert alert-danger">
                            <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                            Data yang anda cari tidak ditemukan
                        </div>
                        <a href="{{ route('dosen.index') }}" class="btn btn-warning">Kembali</a>
                    @else
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

                        <form method="POST" action="{{ route('dosen.update', $dosen->dosen_id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Dosen</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                       id="nama" name="nama" value="{{ old('nama', $dosen->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="number" class="form-control @error('nip') is-invalid @enderror" 
                                       id="nip" name="nip" value="{{ old('nip', $dosen->nip) }}" required>
                                @error('nip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('dosen.index') }}" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        
        form.addEventListener('submit', function(e) {
            const nama = document.getElementById('nama').value.trim();
            const nip = document.getElementById('nip').value.trim();
            
            if (nama.length < 3) {
                e.preventDefault();
                alert('Nama harus minimal 3 karakter');
                return false;
            }
            
            if (nip.length < 8 || nip.length > 20) {
                e.preventDefault();
                alert('NIP harus antara 8-20 digit');
                return false;
            }
        });
    });
</script>
@endpush