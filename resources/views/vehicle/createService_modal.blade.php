<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Buat Jadwal Service
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Jadwal Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                    <div class="mb-3">
                        <label for="date" class="col-form-label">Jadwal Service:</label>
                        <input type="date" class="form-control" id="date" name="date">
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
