@extends('Admin.Adminlayouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-primary float-end me-1" href="{{ url('datadosen/create') }}" data-bs-toggle="modal" data-bs-target="#modal-dosen">
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
@endsection

@push('css')
<!-- Jika ada tambahan CSS khusus, letakkan di sini -->
@endpush

@push('js')
<script>
    $(document).ready(function() {
        // Setup ajax CSRF token agar tidak perlu kirim token manual tiap request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        // Inisialisasi DataTable
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
            // order: [[1, 'asc']] // Uncomment jika ingin sort default berdasarkan nama
        });
    });
</script>
    <script>
        // Fungsi untuk menampilkan modal tambah dosen
        function showModalDosen() {
            $('#modal-dosen').modal('show');
        }
        // Fungsi untuk menampilkan modal edit dosen
        function showEditModalDosen(dosenId) {
            $.ajax({
                url: "{{ url('datadosen') }}/" + dosenId + "/editdosen_ajax",
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        $('#modal-edit-dosen').html(response.html);
                        $('#modal-edit-dosen').modal('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.message
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat mengambil data dosen.'
                    });
                }
            });
        }
@endpush
