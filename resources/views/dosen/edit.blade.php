@if(!$dosen)
    <div class="alert alert-danger">
        <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
        Data yang anda cari tidak ditemukan.
    </div>
@else
    <form id="form-edit-dosen" data-id="{{ $dosen->dosen_id }}">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosen->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="number" class="form-control" id="nip" name="nip" value="{{ $dosen->nip }}" required>
        </div>
        <div class="mb-3 text-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

    <script>
        document.getElementById('form-edit-dosen').addEventListener('submit', function(e) {
            e.preventDefault();

            const id = this.getAttribute('data-id');
            const formData = {
                nama: this.nama.value.trim(),
                nip: this.nip.value.trim()
            };

            fetch(`/datadosen/${id}/update_ajax`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(formData)
            })
                .then(response => {
                    if (!response.ok) throw response;
                    return response.json();
                })
                .then(data => {
                    if (data.status) {
                        $('#modalGlobal').modal('hide');
                        $('#datatable').DataTable().ajax.reload(null, false);
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                })
                .catch(async err => {
                    if (err.status === 422) {
                        const res = await err.json();
                        Object.values(res.errors).forEach(msgs => {
                            toastr.error(msgs[0]);
                        });
                    } else {
                        const res = await err.json();
                        toastr.error(res.message || 'Gagal mengupdate data.');
                    }
                });
        });
    </script>
@endif
