@extends('Admin.AdminLayouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{ $page->title }}</h6>
            </div>
            <div class="card-body pt-1 p-3">
                <div class="row">
                    <div class="col">
                        <a href="javascript:void(0)" onclick="modalAction('{{ url('dosen/create') }}')" class="btn btn-primary float-end me-3">Tambah Data Dosen</a>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table_dosen" style="text-align: center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dosen</th>
                                <th>Nomor Induk Pegawai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var dataDosen;

        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        $(document).ready(function() {
            dataDosen = $('#table_dosen').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('admin.datadosen.list') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center' },
                    { data: 'nama', className: 'text-start' },
                    { data: 'nip', className: 'text-start' },
                    { data: 'aksi', orderable: false, searchable: false, className: 'text-start' }
                ]
            });
        });
        // alert dalam function mau hapus data dosen
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteDosen(id);
                }
            });
        }
        // alert dalam function mau hapus data dosen

        function deleteDosen(id) {
            $.ajax({
                url: `/datadosen/${id}/delete_ajax`,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status) {
                        Swal.fire('Berhasil', response.message, 'success');
                        dataDosen.ajax.reload();
                    } else {
                        Swal.fire('Gagal', response.message, 'error');
                    }
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Terjadi kesalahan saat menghapus data.', 'error');
                }
            });
        }

    </script>
@endpush
