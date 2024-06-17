<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $employee->id }}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="editModal{{ $employee->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="name" value="{{ $employee->name }}"
                            name="name">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="col-form-label">NIP:</label>
                        <input type="number" class="form-control" id="nip" value="{{ $employee->nip }}"
                            name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="position" class="col-form-label">Jabatan:</label>
                        <input type="text" class="form-control" id="position" value="{{ $employee->position }}"
                            name="position">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="nopol" class="col-form-label">Tipe Kendaraan</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" name="type" id="type1" checked>
                        <label class="form-check-label" for="type1">
                            Angkutan Orang
                        </label>
                        <input class="form-check-input" type="radio" name="type" id="type2">
                        <label class="form-check-label" for="type2">
                            Angkutan Barang
                        </label>
                    </div> --}}
                    {{-- <div class="mb-3">
                        <label for="nopol" class="col-form-label">Nomor Polisi</label>
                        <input type="text" class="form-control" id="nopol">
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div> --}}
        </div>
    </div>
</div>
