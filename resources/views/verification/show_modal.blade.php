<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showverificationLow">
    Detail
</button>

<!-- Modal -->
<div class="modal fade" id="showverificationLow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <tr>
                        <td>Nama Pegawai</td>
                        <td>: {{ $transaction->customer_name }} </td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>: {{ $transaction->customer_nip }}</td>
                    </tr>
                    <tr>
                        <td>No Telp </td>
                        <td>: {{ $transaction->customer_telp }}</td>
                    </tr>
                    <tr>
                        <td>Kendaraan</td>
                        <td>: {{ $transaction->vehicle->name }} --Angkutan {{ $transaction->vehicle->type }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>: {{ $transaction->date_start }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>: {{ $transaction->date_end }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>: {{ $transaction->description }}</td>
                    </tr>
                    {{-- <h5>Nama Barang : {{ $item->name }}</h5>
                    <h5>Kode : {{ $item->name }}</h5> --}}
                </table>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div> --}}
        </div>
    </div>
</div>
