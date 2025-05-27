<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                {{ $kriteria ? 'Detail Kriteria' : 'Kesalahan' }}
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if(!$kriteria)
                <div class="alert alert-danger">
                    <h5><i class="bi bi-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/kriteria1') }}" class="btn btn-warning">Kembali</a>
            @else
                {!! $kriteria->pelaksanaan->pelaksanaan ?? '-' !!}
            @endif
        </div>
    </div>
</div>