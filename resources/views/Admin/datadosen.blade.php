@extends('Admin.Adminlayouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div style="position: relative; right: 77px;">
                <a href="javascript:void(0);" class="btn btn-success btn-sm float-end me-2 py-2 px-3"
                   onclick="modalImport()">
                    Import Data
                </a>

                <a href="javascript:void(0);" class="btn btn-facebook btn-sm float-end me-2 py-2 px-3"
                   onclick="modalCreate()">
                    Tambah Data Dosen
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_dosen">
                <thead>
                    <tr>
                        <th>ID Dosen</th>
                        <th>Nama</th>
                        <th style="text-align: left">NIP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
{{--    jadi tempat nya nanti modal edit  nantinya jadi ini kita biarkan kosong--}}
    <div class="modal fade" id="modal-edit-dosen" tabindex="-1" aria-hidden="true"></div>
    {{--    jadi tempat nya nanti modal create  nantinya jadi ini kita biarkan kosong--}}
    <div class="modal fade" id="modal-dosen" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- isi form -->
            </div>
        </div>
    </div>
@endsection

@push('css')
<!-- Jika ada tambahan CSS khusus, letakkan di sini -->
@endpush

@push('js')
    <script>
{{--Kode ini memastikan semua request AJAX kamu otomatis bawa token CSRF,
 sehingga Laravel terima dan proses request-nya dengan aman.--}}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            // Setup ajax CSRF token agar tidak perlu kirim token manual tiap request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            var dataDosen = $('#table_dosen').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.datadosen.list') }}",
                    type: "POST",
                    dataType: "json"
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "nip",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
        // tambahkan function ini untuk memunculkan modal
        function modalAction(url) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(html) {
                    // langsung inject HTML ke modal container dan show modal
                    $('#modal-edit-dosen').html(html);
                    $('#modal-edit-dosen').modal('show');
                },
                error: function() {
                    Swal.fire('Error', 'Gagal mengambil data dosen.', 'error');
                }
            });
        }
        function confirmDelete(id) {
            if (confirm('Yakin ingin hapus data dosen ini?')) {
                $.ajax({
                    url: '/datadosen/' + id + '/delete_ajax',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status) {
                            alert(response.message);
                            $('#table_dosen').DataTable().ajax.reload();
                        } else {
                            alert('Gagal menghapus data');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus data.');
                    }
                });
            }
        }
        function modalCreate() {
            $.ajax({
                url: "{{ route('admin.datadosen.create') }}", // route form create
                type: 'GET',
                success: function(html) {
                    $('#modal-dosen .modal-content').html(html); // inject isi form
                    $('#modal-dosen').removeAttr('aria-hidden'); // hapus aria-hidden
                    $('#modal-dosen').modal('show');             // tampilkan modal
                },
                error: function() {
                    Swal.fire('Error', 'Gagal membuka form tambah dosen.', 'error');
                }
            });
        }
        // Pastikan ini dijalankan sekali di awal script kamu, supaya CSRF token otomatis dikirim di setiap AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin hapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/datadosen/' + id + '/delete_ajax',  // <-- perbaikan URL disini
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status) {
                                Swal.fire('Berhasil', response.message, 'success');
                                $('#table_dosen').DataTable().ajax.reload();
                            } else {
                                Swal.fire('Gagal', response.message, 'error');
                            }
                        },
                        error: function(xhr) {
                            let msg = 'Terjadi kesalahan saat menghapus data.';
                            if(xhr.responseJSON && xhr.responseJSON.message){
                                msg = xhr.responseJSON.message;
                            }
                            Swal.fire('Error', msg, 'error');
                        }
                    });
                }
            });
        }
function modalImport() {
    $.ajax({
        url: "{{ route('admin.datadosen.import') }}", // route untuk GET form import
        type: 'GET',
        success: function (html) {
            // Inject konten HTML hasil render dari blade ke dalam modal
            $('#modal-dosen .modal-content').html(html);

            // Pastikan modal terlihat
            $('#modal-dosen').modal('show');
        },
        error: function (xhr) {
            // Tampilkan error jika gagal memuat modal
            Swal.fire('Error', 'Gagal membuka form import.', 'error');
        }
    });
}

    </script>
@endpush

