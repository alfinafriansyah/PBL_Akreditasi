@extends('layouts.template')
{{-- Card --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6>{{ $page->title }}</h6>
                    </div>
                    <div class="card-body pt-1 p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table_kriteria2">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">No</th>
                                        <th style="width: 90%;">Evaluasi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data- backdrop="static"
                    data-keyboard="false" data-width="75%" aria-hidden="true"></div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        @endif
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}'
            });
        @endif

        var dataKriteria2;

        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
        $(document).ready(function() {
            dataKriteria2 = $('#table_kriteria2').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ url('kriteria2/evaluasi') }}",
                    type: "POST",
                    data: function(d) {
                        d.status = $('#status').val();
                        d._token = "{{ csrf_token() }}";
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "komentar",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                ],
                language: {
                    emptyTable: "Tidak ada data yang perlu dievaluasi"
                }
            });

            $('#status').on('change', function() {
                dataKriteria2.ajax.reload();
            });

        });
    </script>
@endpush
