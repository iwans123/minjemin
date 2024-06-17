<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#fuel">
    Tambah BBM
</button>

<!-- Modal -->
<div class="modal fade" id="fuel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fuelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fuelLabel">Jadwal Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('fuel.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                    <div class="mb-3">
                        <label for="date" class="col-form-label">Tanggal:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost_fuel" class="col-form-label">Harga:</label>
                        <input type="numeric" class="form-control" id="cost_fuel" name="cost_fuel" required>
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

{{-- <script>
    function toggleRentalCompanyInput() {
        const rentalType = document.getElementById("ownership");
        const rentalCompanyInput = document.getElementById("rentalCompany");
        const deadlineRentalInput = document.getElementById('deadline')

        if (rentalType.value === "sewa") {
            rentalCompanyInput.disabled = false;
            deadlineRentalInput.disabled = false;
        } else {
            rentalCompanyInput.disabled = true;
            rentalCompanyInput.value = ""; // Clear the input if disabled
            deadlineRentalInput.disabled = true;
            deadlineRentalInput.value = ""; // Clear the input if disabled
        }
    }
</script> --}}
