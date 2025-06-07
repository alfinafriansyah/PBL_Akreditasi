@extends('layouts.template')
{{--Card--}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0">
              <h6>{{ $page->title }}</h6>
            </div>
            <div class="card-body pt-1 p-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">Filter:</label>
                            <div class="col-3">
                                <select name="status" id="status" class="form-select" required>
                                    <option value="">- Semua -</option>
                                    @foreach ($status as $status)
                                        <option value="{{ $status->status_id }}">{{ ucfirst($status->keterangan) }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Status Kriteria</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table_kriteria">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
          </div>
            <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data- backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
        </div>
    </div>
</div>

@endsection

@push('css')
@endpush

@push('js')
<script>
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}'
    });
@endif
@if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ session('error') }}'
    });
@endif

var dataKriteria;
function modalAction(url = '') {
    $('#myModal').load(url, function() {
        $('#myModal').modal('show');
    });
}
$(document).ready(function() {
    $('#status').val('1');
    dataKriteria = $('#table_kriteria').DataTable({
        serverSide: true,
        processing: true, 
        ajax: {
            url: "{{ url('validasi/list') }}",
            type: "POST",
            data: function(d) {
                d.status = $('#status').val();
                d._token = "{{ csrf_token() }}"; 
            },
            error: function(xhr) {
                console.log('Error:', xhr.responseText);
            }
        },
        columns: [
            {
                data: "DT_RowIndex",
                className: "text-center",
                orderable: false,
                searchable: false
            },
            {
                data: "kriteria_kode",
                className: "",
                orderable: true,
                searchable: true
            },
            {
                data: "kriteria_nama",
                className: "",
                orderable: true,
                searchable: true
            },
            {
                data: "status.keterangan",
                className: "",
                defaultContent: "-", // Tampilkan "-" jika null
                orderable: true,
                searchable: true
            },
            {
                data: null,
                className: "",
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    let btn = '';
                    // Jika status_id bukan 1, tombol disable
                    if (row.status_id == 1) {
                        btn += '<a href="koordinator/' + row.kriteria_id + '/form" class="btn btn-success btn-sm">Validasi & Komentar</a>';
                    } 
                    // Tambahkan tombol export PDF jika status_id = 6 (sudah divalidasi direktur)  
                    else if (row.status_id == 6) {
                        btn += '<a href="' + row.kriteria_id + '/export" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i>Export PDF</a>';
                    }else { 
                        btn += '<a href="koordinator/' + row.kriteria_id + '/form" class="btn btn-success btn-sm disabled" tabindex="-1" aria-disabled="true">Validasi & Komentar</a>';
                    }
                    return btn;
                }
            }
        ]
    });

    $('#status').on('change', function() {
        dataKriteria.ajax.reload();
    });

});
</script>
@endpush