@extends('layouts.template')
{{--Card--}}
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Revisi</p>
                                <h5 class="font-weight-bolder">
                                    0
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Anggota</p>
                                <h5 class="font-weight-bolder">
                                    4
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Terverifikasi</p>
                                <h5 class="font-weight-bolder">
                                    2
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Komentar</p>
                                <h5 class="font-weight-bolder">
                                    12
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    table --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="text-lg font-weight-bold">Data Kriteria</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <table class="table table-hover align-items-center mb-0">
                            <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kriteria</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($kriteria as $index => $kriteria)
                                <tr class="border-bottom">
                                    <td class="text-xs px-3 py-2">{{ $index + 1 }}</td>
                                    <td class="text-xs px-3 py-2 font-weight-bold">{{ $kriteria->kriteria_kode }}</td>
                                    <td class="text-xs px-3 py-2">{{ $kriteria->kriteria_nama }}</td>
                                    <td class="text-xs px-3 py-2">
                                        @php
                                            $badgeClass = 'bg-secondary';
                                            switch ($kriteria->status_id) {
                                                case 1: $badgeClass = 'bg-warning'; break;
                                                case 2: $badgeClass = 'bg-danger'; break;
                                                case 3: $badgeClass = 'bg-secondary'; break;
                                                case 4: $badgeClass = 'bg-info'; break;
                                                case 5: $badgeClass = 'bg-primary'; break;
                                                case 6: $badgeClass = 'bg-success'; break;
                                            }
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">
                                        {{ $kriteria->status->keterangan ?? '-' }}
                                    </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-xs text-muted py-3">
                                        Tidak ada data kriteria.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
