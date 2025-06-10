<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                {{ $kriteria ? 'Detail Kriteria' : 'Kesalahan' }}
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if(!$kriteria->detail)
                <div class="alert alert-danger">
                    <h5><i class="bi bi-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
            @else
                <h4>{{$kriteria->kriteria_nama}}</h4>
                {{-- Penetapan --}}
                <div class="mb-3">
                    <h5>Penetapan</h5>
                    {!! $kriteria->penetapan->penetapan ?? '-' !!}
                    @if($kriteria->penetapan->dokumen)
                        <h5>Dokumen Pendukung</h5>
                        @foreach(json_decode($kriteria->penetapan->dokumen ?? '[]') as $file)
                            <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                        @endforeach
                    @endif
                </div>
                
                {{-- Pelaksanaan --}}
                <div class="mb-3">
                    <h5>Pelaksanaan</h5>
                    {!! $kriteria->pelaksanaan->pelaksanaan ?? '-' !!}
                    @if($kriteria->pelaksanaan->dokumen)
                        <h5>Dokumen Pendukung</h5>
                        @foreach(json_decode($kriteria->pelaksanaan->dokumen ?? '[]') as $file)
                            <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                        @endforeach
                    @endif
                </div>
                                                
                {{-- Evaluasi --}}
                <div class="mb-3">
                    <h5>Evaluasi</h5>
                    {!! $kriteria->evaluasi->evaluasi ?? '-' !!}
                    @if($kriteria->evaluasi->dokumen)
                        <h5>Dokumen Pendukung</h5>
                        @foreach(json_decode($kriteria->evaluasi->dokumen ?? '[]') as $file)
                            <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                        @endforeach
                    @endif
                </div>
                                
                {{-- Pengendalian --}}
                <div class="mb-3">
                    <h5>Pengendalian</h5>
                    {!! $kriteria->pengendalian->pengendalian ?? '-' !!}
                    @if($kriteria->pengendalian->dokumen)
                        <h5>Dokumen Pendukung</h5>
                        @foreach(json_decode($kriteria->pengendalian->dokumen ?? '[]') as $file)
                            <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                        @endforeach
                    @endif
                </div>
                                
                {{-- Peningkatan --}}
                <div class="mb-3">
                    <h5>Peningkatan</h5>
                    {!! $kriteria->peningkatan->peningkatan ?? '-' !!}
                    @if($kriteria->peningkatan->dokumen)
                        <h5>Dokumen Pendukung</h5>
                        @foreach(json_decode($kriteria->peningkatan->dokumen ?? '[]') as $file)
                            <img src="{{ asset($file) }}" alt="Dokumen" style="max-width:200px;">
                        @endforeach
                    @endif
                </div>
                
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Kembali</button>
        </div>
    </div>
</div>