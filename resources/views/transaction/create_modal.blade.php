<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Transaksi
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transaction.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="col-form-label">Nama Pegawai:</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_nip" class="col-form-label">NIP:</label>
                        <input type="number" class="form-control" id="customer_nip" name="customer_nip" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_telp" class="col-form-label">No Telpon:</label>
                        <input type="number" class="form-control" id="customer_telp" name="customer_telp" required>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="vehicle_id" class="col-form-label">Kendaraan:</label>
                        <select id="vehicle_id" class="form-select" aria-label="Default select example"
                            name="vehicle_id" required>
                            {{-- <option selected>...</option> --}}
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->name }}
                                    <span class="text-muted">--{{ $vehicle->nopol }}
                                        --Angkutan {{ $vehicle->type }}</span>
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="name" class="col-form-label">Pegawai</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="date_start" class="col-form-label">Tanggal Mulai:</label>
                        <input type="date" class="form-control" id="date_start" name="date_start" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_end" class="col-form-label">Tanggal Selesai:</label>
                        <input type="date" class="form-control" id="date_end" name="date_end" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="col-form-label">Deskripsi:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="verivikator1" class="col-form-label">Verivikator 1:</label>
                        <select id="verivikator1" class="form-select" aria-label="Default select example"
                            name="userLow_id" required>
                            {{-- <option selected>...</option> --}}
                            @foreach ($employeesLow as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}
                                    <span class="text-muted">--{{ $employee->position }}</span>
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="verivikator2" class="col-form-label">Verivikator 2:</label>
                        <select id="verivikator2" class="form-select" aria-label="Default select example"
                            name="userHigh_id" required>
                            {{-- <option selected>...</option> --}}
                            @foreach ($employeesHigh as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}
                                    <span class="text-muted">--{{ $employee->position }}</span>
                                </option>
                            @endforeach
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

{{-- script verivikator --}}
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        function updateOptions() {
            const verivikator1 = document.getElementById('verivikator1');
            const verivikator2 = document.getElementById('verivikator2');

            const selected1 = verivikator1.value;
            const selected2 = verivikator2.value;

            Array.from(verivikator2.options).forEach(option => {
                if (option.value === selected1 && selected1 !== "") {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });

            Array.from(verivikator1.options).forEach(option => {
                if (option.value === selected2 && selected2 !== "") {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        }

        document.getElementById('verivikator1').addEventListener('change', updateOptions);
        document.getElementById('verivikator2').addEventListener('change', updateOptions);

        updateOptions();
    });
</script>
