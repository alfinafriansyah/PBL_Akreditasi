@extends('admin.AdminLayouts.template')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            {{-- CARD 1 --}}
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's User Edit</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $todaysUserEdit ?? 0 }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-refresh-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CARD 2 --}}
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Dosen Name Create</p>
                                    <h5 class="font-weight-bolder">
                                        {{-- Opsional: jika ingin data dinamis, ganti angka 2 jadi variable --}}
                                        -
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CARD 3 --}}
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $totalUser ?? 0 }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CARD 4 --}}
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Data Dosen</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $totalDatadosen ?? 0 }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="text-lg font-weight-bold">Data User yang Pernah Diupdate</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-3">
                            <table class="table table-hover align-items-center mb-0">
                                <thead class="bg-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Dosen</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($updatedUsers as $index => $user)
                                    <tr class="border-bottom">
                                        <td class="text-xs px-3 py-2">{{ $index + 1 }}</td>
                                        <td class="text-xs px-3 py-2 font-weight-bold">{{ $user->username }}</td>
                                        <td class="text-xs px-3 py-2">{{ $user->dosen->nama ?? '-' }}</td>
                                        <td class="text-xs px-3 py-2">{{ $user->role->role_nama ?? '-' }}</td>
                                        <td class="text-xs px-3 py-2 text-muted">
                                            {{ $user->updated_at ? \Carbon\Carbon::parse($user->updated_at)->diffForHumans() : '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-xs text-muted py-3">
                                            Tidak ada data yang diupdate.
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
@endsection
