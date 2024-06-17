<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal"
    data-bs-target="#verificationHigh{{ $transaction->id }}">
    Verifikasi
</button>

<!-- Modal -->
<div class="modal fade" id="verificationHigh{{ $transaction->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('verification.updateHigh', $transaction->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="col-form-label">Kendaraan:</label>
                        <select id="status" class="form-select" aria-label="Default select example" name="status"
                            required>
                            <option value="disetujui">Disetuju</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>

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
