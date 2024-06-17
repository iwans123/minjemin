<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm rounded" data-bs-toggle="modal"
    data-bs-target="#returnModal{{ $transaction->id }}">
    Return
</button>

<!-- Modal -->
<div class="modal fade" id="returnModal{{ $transaction->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Return Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('vehicle.update', $transaction->vehicle_id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="col-form-label">Status:</label>
                        <input type="readonly" class="form-control" id="status" value="ready" name="status"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
